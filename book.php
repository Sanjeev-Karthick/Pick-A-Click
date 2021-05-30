<?php
session_start();
$id = $_SESSION["stud_id"];
include 'db_connect.php';
?>
<!doctype html>
<html lang="en">

<head>
<style>
p{
    font-size: 1.2em;
}
h5{
    font-size: 1.2em;
}
body{
    text-transform: uppercase;
}
i{
    padding: 5px;
}
</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Studio bookings</title>
</head>
<script src="https://use.fontawesome.com/60db52c5b9.js"></script>
<body style="background:  #1F2D50;">

    <div class="container shadow-sm   rounded mt-4" style="max-width: 1000px ;padding: 3%;background-color: #f0f0f0;">
    <h1 style="text-align: center;padding:5px">Your bookings</h1><br>
    <div class="list-group">
    <?php
    $sql = 'select * from booking where stud_id = '.$id.'';
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $cust_id = $row["cust_id"];
        $venue = $row["venue"];
        $category = $row["categ_name"];
        $s = $row["dateandtime"];
        $s = strtotime($s);
        $date = date('d/m/Y', $s);
        $time = date('H:i A', $s);
        $std = 'select * from customer where cust_id = '.$cust_id.'';
        $res = mysqli_query($conn,$std);
        while($r = mysqli_fetch_assoc($res))
        {
            $cust_phone = $r["cust_phone"];
            $cust_address =$r["cust_address"];
            $cust_name = $r["cust_name"];
    ?>


            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start shadow p-2 mb-4  rounded">
                <div class=" justify-content-between">
                    <h5 class="mb-1 shadow-sm" style="text-transform: uppercase;"><b><i class="fa fa-user" aria-hidden="true"></i> <?php echo $cust_name;?></b>  <i class="fa fa-phone" aria-hidden="true" style="margin-left:50%"></i> : <?php echo $cust_phone;?> </h5> <hr>
                </div>
                <p class="mb-1">
                <i class="fa fa-bookmark fa-lg" aria-hidden="true"></i>  <?php echo $category?><br>
                <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> <?php echo $venue?> <br>
                <i class="fa fa-calendar fa-lg" aria-hidden="true"></i> <?php echo $date?> <br>
                <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> <?php echo $time?>
                </p>
                <small></small>
            </a>
            <?php      } }?>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>