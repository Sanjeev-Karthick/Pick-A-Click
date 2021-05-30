<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $adress = $_POST['adress'];
    $phone =  $_POST['phone'];
    $existSQL = "select * from customer where cust_email ='$email'";
    $result = mysqli_query($conn, $existSQL);
    $numRows = mysqli_num_rows(($result));
    if ($numRows > 0) {
        $showError = "Email already in use";
        $signupStatus = false;
    } else {
        if ($password == $confirm_password) {
            $hash = $password;
            $sql = "INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`,`cust_password`,`cust_address`) VALUES ('', '$username', '$phone','$email','$hash','$adress' )";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $signupStatus = true;

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
                    Hello '.$username.' !<br>
                    Thank you for signing up in Pick-a-click. 
                    Explore many studios from your home with the help of our website.<br>
                    The information regarding all the studios can be found at our website .<br>
                    You are kindly requested to visit the website often to follow up with our updates.<br> 
                    <b> Thank you again for signing up !!! </b>';
                    $mail->AltBody = ' Thank you for signing up in Pick-a-click. 
                    Explore many studios from your home with the help of our website.
                    The information regarding all the studios can be found at our website .
                    You are kindly requested to visit the website often to follow up with our updates.Thank you again for signing up!!';
                    $mail->send();
                   
                } catch (Exception $e) {
                   
                }
            } else {
                $signupStatus = false;
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>User sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #3598dc;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: none;
        }

        .form-control:focus {
            background: #e2e2e2;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 40%;
            margin: 30px auto;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }

        .signup-form hr {
            margin: 0 -30px 20px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #3598dc;
            border: none;
            min-width: 140px;
        }

        .signup-form .btn:hover,
        .signup-form .btn:focus {
            background: #2389cd !important;
            outline: none;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #3598dc;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }

        .signup-form .hint-text {
            padding-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($signupStatus) && $signupStatus == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can now log in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else if (isset($signupStatus) && $signupStatus == false) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Some error occured during sign up ( Either Email already exists or passwords does not match)
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    ?>
    <div class="signup-form">
        <form action="signup.php" method="post">
            <h2>User Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text " class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address</label>
                <textarea row=3 class="form-control" id="inputAddress2" name="adress" placeholder="Your Address" required> </textarea>
            </div>

            <div class="form-group">
                <label for="inputPhone">Phone number</label>
                <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="Your Phone number" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        <div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
    </div>
</body>

</html>


</body>

</html>