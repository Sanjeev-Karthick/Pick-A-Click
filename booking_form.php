<?php
session_start();
$username = $_SESSION["cust_name"];
$email = $_SESSION["customer_email"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include 'db_connect.php';
$studio_id = $_GET["num"];
$customer_id = $_SESSION["cust_id"];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      background-color: #25274d;
    }

    .contact {
      padding: 4%;
      height: 400px;
    }

    .col-md-3 {
      background: #ff9b00;
      padding: 4%;
      border-top-left-radius: 0.5rem;
      border-bottom-left-radius: 0.5rem;
    }

    .contact-info {
      margin-top: 10%;
    }

    .contact-info img {
      margin-bottom: 15%;
    }

    .contact-info h2 {
      margin-bottom: 10%;
    }

    .col-md-9 {
      background: #fff;
      padding: 3%;
      border-top-right-radius: 0.5rem;
      border-bottom-right-radius: 0.5rem;
    }

    .contact-form label {
      font-weight: 600;
    }

    .contact-form button {
      background: #25274d;
      color: #fff;
      font-weight: 600;
      width: 25%;
    }

    .contact-form button:focus {
      box-shadow: none;
    }
  </style>

</head>
<?php

if (isset($_POST["submit"])) {

  $booking_date_and_time = $_POST["booking"];
  $category = $_POST["category"];
  $venue = $_POST["venue"];
  $s = $booking_date_and_time;
  $s = strtotime($s);
  $date = date('d/m/Y', $s);
  $time = date('H:i A', $s);
  $sql = "insert into booking (`stud_id`,`cust_id`,`categ_name`,`dateandtime`,`venue`) values ('$studio_id','$customer_id','$category','$booking_date_and_time','$venue')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $success = true;
    $sql = "select * from photostudio where stud_id = '$studio_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $studio_name = $row["stud_name"];
      $studio_phone = $row["stud_phone"];
      $studio_address = $row["stud_address"];
    }
    $mail1 = new PHPMailer(true);
    try {
      //Server settings
      //Enable verbose debug output
      $mail1->isSMTP();                                            //Send using SMTP
      $mail1->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail1->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail1->Username   = 'pickaclickconfirm@gmail.com';                     //SMTP username
      $mail1->Password   = 'PicKaClicK2021;';                               //SMTP password
      $mail1->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail1->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      $mail1->AddEmbeddedImage('resources/img/logx.png', 'logo');
      //Recipients
      $mail1->setFrom('pickaclickconfirm@gmail.com');
      $mail1->addAddress($email);               //Name is optional
      /*
//Attachments
$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
*/
      //Content
      $mail1->isHTML(true);                                  //Set email format to HTML
      $mail1->Subject = 'Booking confirmation ';
      $mail1->Body    = '<img src="cid:logo" height="100" width="100" style="border:1px solid black; border-radius:50%;" > <br>
        Hello ' . $username . ' !<br>
        This is a booking confirmation mail. You have booked ' . $studio_name . ' for ' . $category . '  at ' . $date . '<br>
        Booking details : <br>
        Date :' . $date . '<br>
        Time : ' . $time . '<br>
        Studio phone number : ' . $studio_phone . ' <br>
        Studio address : ' . $studio_address . ' <br>
        Venue : '.$venue.' <br>
        Wait for confirmation call from your booked studio <br>
        For further enquiries contact the respective studio. <br>
        <b> Thank you !!! </b>';

      $mail1->AltBody = '  Hello ' . $username . ' !<br>
      This is a booking confirmation mail. You have booked ' . $studio_name . ' for ' . $category . '  at ' . $date . '
      Booking details:
      Date :' . $date . '
      Time : ' . $time . '
      Studio phone number : ' . $studio_phone . '
      Studio address : ' . $studio_address . '
      Venue : '.$venue.'
      Wait for confirmation call from your booked studio
      For further enquiries contact the respective studio for additional information.
      Thank you!!!';
      $mail1->send();
    } catch (Exception $e) {
    }


    




  } else {
    $success = false;
  }
}

?>

<body>

  <?php
  if (isset($success) && $success == true) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> You have booked the studio for your occasion , Kindly check your mail for more details.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  } else if (isset($success) && $success == false) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sorry ! There was some error in booking </strong> Try again.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

  <form action="booking_form.php?num=<?php echo $studio_id ?>" method="POST">

    <div class="container contact">
      <div class="row">
        <div class="col-md-3">
          <div class="contact-info">
            <img src="resources/img/logx.png" alt="image" / style="width: 100%; height: auto;">
            <br>
            <br>
            <br>
            <br>
            <?php
            $sql = "select * from photostudio where stud_id = '$studio_id'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $studio_name = $row["stud_name"];
            }
            ?>
            <h2 style="text-transform:uppercase;"><b><?php echo $studio_name; ?> </b></h2>
            <h4>"Pick your date, category and venue!"</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="contact-form">
            <div class="form-group ">
              <div class="form-group ">
                <la class="h6 ">
                  <p>Category</p>
                  <ul class="list-group">

                    <?php
                    $sql = "select * from category  where stud_id = '$studio_id'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $category = $row["categ_name"];
                      echo ' 
                    <li class="list-group-item col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="exampleRadios1" value="' . $category . '">
                        <label class="form-check-label" for="exampleRadios1">' . $category . '
                        </label>
                      </div>
                    </li>';
                    } ?>


                  </ul>
                </la>
              </div>
            </div>


            <div class="form-group">
              <label for="birthdaytime">Your date and time:</label>
              <div class="col-sm-10">
                <input type="datetime-local" id="booking" name="booking" class="form-control">
              </div>

            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Venue</label>
              <div class="col-sm-10">
                <input class="form-control" placeholder="Enter venue" name="venue">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>


  <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Argon JS -->
  <script src="/assets/js/argon.min.js"></script>
</body>

</html>