<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
// Database
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['stud_email'];
    $name = $_POST['stud_name'];
    $password = $_POST['stud_password'];
    $confirm_password = $_POST['confirm_password'];
    $address = $_POST['stud_address'];
    $phone =  $_POST['stud_phone'];
    $city = $_POST["stud_city"];
    $category = $_POST["studio_category"];
    $description = $_POST["stud_description"];
    $existSQL = "select * from customer where cust_email ='$email'";
    $result = mysqli_query($conn, $existSQL);
    $numRows = mysqli_num_rows(($result));
    if ($numRows > 0) {
        $response = array(
            "status" => "alert-danger",
            "message" => "Email already in use."
        );
    } else {
        if ($password == $confirm_password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $filename = $_FILES["profile_pic"]["name"];
            $tempname = $_FILES["profile_pic"]["tmp_name"];
            $folder = "profile_pic/" . $filename;
            move_uploaded_file($tempname, $folder);
            $sql = "INSERT INTO `photostudio` (`stud_id`, `stud_name`, `stud_phone`, `stud_email`,`stud_password`,`stud_address`,`stud_description`,`stud_city`,`stud_profile_pic`) VALUES ('', '$name', '$phone','$email','$password','$address','$description','$city','$filename' )";

            $result = mysqli_query($conn, $sql);
            if ($result) {

                $categ_sql = "select stud_id from photostudio where stud_email = '$email'";
                $res = mysqli_query($conn, $categ_sql);
                while ($r = mysqli_fetch_assoc($res)) {
                    $id = $r["stud_id"];
                }
    
                foreach ($category as $chkval) {
                    $ins = "INSERT INTO category (`categ_name`,`stud_id`) VALUES ('$chkval','$id')";
                    mysqli_query($conn, $ins);
    
                }


                $signupStatus = true;

                $uploadsDir = "studio_photos/";
                $allowedFileType = array('jpg', 'png', 'jpeg');

                // Velidate if files exist
                if (!empty(array_filter($_FILES['fileUpload']['name']))) {

                    // Loop through file items
                    foreach ($_FILES['fileUpload']['name'] as $id => $val) {
                        // Get files upload path
                        $fileName        = $_FILES['fileUpload']['name'][$id];
                        $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                        $targetFilePath  = $uploadsDir . $fileName;
                        $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                        $uploadOk = 1;

                        if (in_array($fileType, $allowedFileType)) {
                            if (move_uploaded_file($tempLocation, $targetFilePath)) {
                                $sqlVal = "('" . $fileName . "')";
                            } else {
                                $response = array(
                                    "status" => "alert-danger",
                                    "message" => "File coud not be uploaded."
                                );
                            }
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "Only .jpg, .jpeg and .png file formats allowed."
                            );
                        }
                        // Add into MySQL database
                        if (!empty($sqlVal)) {
                            $sql = "select stud_id from photostudio where stud_email= '$email'";
                            $val = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($val);
                            $val = $row["stud_id"];
                            $insertSQL = "INSERT INTO `photo` (`stud_id`,`img_name`,`email`) VALUES ('$val','$fileName','$email')";
                            $insert = mysqli_query($conn, $insertSQL);
                            if ($insert) {
                                $response = array(
                                    "status" => "alert-success",
                                    "message" => "You have signed up successfully"
                                );

                                $mail = new PHPMailer(true);

                                try {
                                    //Server settings
                                    //Enable verbose debug output
                                    $mail->isSMTP();                                            //Send using SMTP
                                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                    $mail->Username   = 'pickaclickconfirm@gmail.com';                     //SMTP username
                                    $mail->Password   = 'PicKaClicK2021;';                               //SMTP password
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                                    $mail->AddEmbeddedImage('resources/img/logx.png', 'logo');
                                    //Recipients
                                    $mail->setFrom('pickaclickconfirm@gmail.com');
                                    $mail->addAddress($email);               //Name is optional
                                    /*
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
*/
                                    //Content
                                    $mail->isHTML(true);                                  //Set email format to HTML
                                    $mail->Subject = 'Successfully registered to pick-a-click';
                                    $mail->Body    = '<img src="cid:logo" height="100" width="100" style="border:1px solid black; border-radius:50%;" > <br>
                    Hello ' . $name .  ' people !<br>
                    Thank you for signing up your studio in Pick-a-click. 
                    Now you can get customers at an instant and keep track of your bookings easily.<br>
                    You are kindly requested to visit the website often to follow up with our updates.<br> 
                    <b> Thank you again for signing up  your studio!!! </b>';
                                    $mail->AltBody = ' Thank you for signing up in Pick-a-click. 
                    Explore many studios from your home with the help of our website.
                    The information regarding all the studios can be found at our website .
                    You are kindly requested to visit the website often to follow up with our updates.Thank you again for signing up!!';
                                    $mail->send();
                                } catch (Exception $e) {
                                }
                            } else {
                                $response = array(
                                    "status" => "alert-danger",
                                    "message" => "Files coudn't be uploaded due to database error. Please try again"
                                );
                            }
                        }
                    }
                } else {
                    // Error
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Please select a file to upload."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Sorry some error occured"
                );
            }
        }
    }
}
