<?php
session_start();
include 'db_connect.php';
$id = $_GET['num'];
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coment = $_POST['coment'];
    $cus_id = $_SESSION['cust_id'];
    $std_id = $_POST['stud_id'];
    echo $coment;
    echo $cus_id;
    echo $std_id;
    $sql = "INSERT INTO `coment` (`cust_id`, `stud_id`, `cust_comments`) VALUES( '$cus_id', '$std_id', '$coment')";
    $result = mysqli_query($conn, $sql);
}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rate = $_POST['rating'];
    $ssql = "INSERT INTO `rating` (`cust_id`, `stud_id`, `cust_rating`) VALUES( '$cus_id', '$std_id', '$rate')";
    $res = mysqli_query($conn, $ssql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->

    <style>
    * {
        box-sizing: border-box;
        font-family: "Poppins";
    }

    .checked {
        color: orange;
    }

    #demo {
        height: 100%;
        position: relative;
        overflow: hidden;
    }


    .green {
        background-color: #6fb936;
    }

    .thumb {
        margin-bottom: 30px;
    }

    .page-top {
        margin-top: 85px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        padding: 10px;
        width: 950px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 6px;

    }


    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #FFD700;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
    }

    .rating-loading {
        width: 25px;
        height: 25px;
        font-size: 0;
        color: #fff;
        background: url(../img/loading.gif) top left no-repeat;
        border: none
    }

    .rating-container .rating-stars {
        position: relative;
        cursor: pointer;
        vertical-align: middle;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap
    }

    .rating-container .rating-input {
        position: absolute;
        cursor: pointer;
        width: 100%;
        height: 1px;
        bottom: 0;
        left: 0;
        font-size: 1px;
        border: none;
        background: 0 0;
        padding: 0;
        margin: 0
    }

    .rating-disabled .rating-input,
    .rating-disabled .rating-stars {
        cursor: not-allowed
    }

    .rating-container .star {
        display: inline-block;
        margin: 0 3px;
        text-align: center
    }

    .rating-container .empty-stars {
        color: #aaa
    }

    .rating-container .filled-stars {
        position: absolute;
        left: 0;
        top: 0;
        margin: auto;
        color: #fde16d;
        white-space: nowrap;
        overflow: hidden;
        -webkit-text-stroke: 1px #777;
        text-shadow: 1px 1px #999
    }

    .rating-rtl {
        float: right
    }

    .rating-animate .filled-stars {
        transition: width .25s ease;
        -o-transition: width .25s ease;
        -moz-transition: width .25s ease;
        -webkit-transition: width .25s ease
    }

    .rating-rtl .filled-stars {
        left: auto;
        right: 0;
        -moz-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
        -webkit-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
        -o-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
        transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0)
    }

    .rating-rtl.is-star .filled-stars {
        right: .06em
    }

    .rating-rtl.is-heart .empty-stars {
        margin-right: .07em
    }

    .rating-lg {
        font-size: 3.91em
    }

    .rating-md {
        font-size: 3.13em
    }

    .rating-sm {
        font-size: 2.5em
    }

    .rating-xs {
        font-size: 2em
    }

    .rating-xl {
        font-size: 4.89em
    }

    .rating-container .clear-rating {
        color: #aaa;
        cursor: not-allowed;
        display: inline-block;
        vertical-align: middle;
        font-size: 60%;
        padding-right: 5px
    }

    .clear-rating-active {
        cursor: pointer !important
    }

    .clear-rating-active:hover {
        color: #843534
    }

    .rating-container .caption {
        color: #999;
        display: inline-block;
        vertical-align: middle;
        font-size: 60%;
        margin-top: -.6em;
        margin-left: 5px;
        margin-right: 0
    }

    .rating-rtl .caption {
        margin-right: 5px;
        margin-left: 0
    }

    @media print {
        .rating-container .clear-rating {
            display: none
        }
    }

    .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }

    .modal-header {

        border-bottom: none;
    }

    .modal-title {
        color: #000;
    }

    .modal-footer {
        display: none;
    }

    .bg-cover {
        background-image: linear-gradient(rgba(0, 0, 0, 0.8),
                rgba(0, 0, 0, 0.8)),
            url("https://images.unsplash.com/photo-1609151162377-794faf68b02f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8d2VkZGluZ3xlbnwwfDB8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60");
        background-size: cover !important;
        height: 55vh;
    }

    .txt {
        font-weight: bold;
    }

    .space {
        box-sizing: border-box;
    }

    .border {
        border: 3px solid black;
    }

    .tab {
        display: inline-block;
        margin-left: 500px;
    }

    h1 {
        font-size: 2.7rem;
        letter-spacing: 1.5px;
    }

    code {
        margin: 3px;
        margin-top: 10px;
        background-color: #efefef;
        font-size: 1.1;
    }

    .clr {
        background-color: #f9f9f9;
    }

    .contain {
        position: relative;
        width: 100%;
        /* The size you want */
    }

    .contain:after {
        content: "";
        display: block;
        padding-bottom: 100%;
        /* The padding depends on the width, not on the height, so with a padding-bottom of 100% you will get a square */
    }

    .contain img {
        position: absolute;
        /* Take your picture out of the flow */
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        /* Make the picture taking the size of it's parent */
        width: 100%;
        /* This if for the object-fit */
        height: 100%;
        /* This if for the object-fit */
        object-fit: cover;
        /* Equivalent of the background-size: cover; of a background-image */
        object-position: center;
    }

    .img-thumbnail {
        background: none repeat scroll 0 0 #eaebed;
        border-color: black;
        border-radius: 0;
        padding: 5px;
    }
    
/* Dropdown */

.dropdown {
  display: inline-block;
  position: relative;
}

.dd-button {
  display: inline-block;
  border: 1px solid gray;
  border-radius: 4px;
  padding: 10px 30px 10px 20px;
  background-color: #ffffff;
  cursor: pointer;
  white-space: nowrap;
}

.dd-button:after {
  content: '';
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid black;
}

.dd-button:hover {
  background-color: #eeeeee;
}


.dd-input {
  display: none;
}

.dd-menu {
  position: absolute;
  top: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 0;
  margin: 2px 0 0 0;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
  background-color: #ffffff;
  list-style-type: none;
}

.dd-input + .dd-menu {
  display: none;
} 

.dd-input:checked + .dd-menu {
  display: block;
} 

.dd-menu li {
  padding: 10px 20px;
  cursor: pointer;
  white-space: nowrap;
}

.dd-menu li:hover {
  background-color: #f6f6f6;
}

.dd-menu li a {
  display: block;
  margin: -10px -20px;
  padding: 10px 20px;
}

.dd-menu li.divider{
  padding: 0;
  border-bottom: 1px solid #cccccc;
}
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>STUDIO</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet" />
</head>
<script src="https://use.fontawesome.com/60db52c5b9.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });

    $(".zoom").hover(function() {

        $(this).addClass('transition');
    }, function() {

        $(this).removeClass('transition');
    });
});
</script>

</script>

<body class="clr">
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color: black;">
        <div class="container px-4">
            <a class="navbar-brand" href="#page-top"><img src="resources/img/loggg.png" width="90px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto" style="margin-left: 80%;">
                    <li class="nav-item">
                        <label class="dropdown">

                            <div class="nav-link">
                                Your account
                            </div>

                            <input type="checkbox" class="dd-input" id="test">
                
                            <ul class="dd-menu">
                
                               
                                <li class="divider"></li>
                                <li><button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal" data-backdrop="false">
                                Update your detais
                            </button></li>
                                
                            </ul>

                        </label>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="modal bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update details </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_user.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="cust_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone number</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone number" name="cust_phone">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" type="submit">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
     <!-----------------------------------------STUDIO DETAILS ------------------------------------------------------->

     <?php
            $sql = "SELECT * FROM photostudio where stud_id = '$id'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $studio_name = $row["stud_name"];
                    $studio_phone = $row["stud_phone"];
                    $studio_city = $row["stud_city"];
                    $studio_id = $row["stud_id"];
                    $studio_description = $row["stud_description"];
                    $studio_address = $row["stud_address"];
                    $pic =$row["stud_profile_pic"];
                }
            }
            ?>



    <div class="bg-cover text-white">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                <div class="contain">
                <?php 
                if (isset($pic) && $pic!=""){
                    echo ' <img src="profile_pic/'.$pic.'" alt="..." class="as img-fluid img-thumbnail" style="margin-top: 10vh; margin-left: 2vh; border-radius: 2%" />';
                }
                else{
                    echo '<img src="https://images.unsplash.com/photo-1546032996-6dfacbacbf3f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8d2VkZGluZ3xlbnwwfDF8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="..." class="as img-fluid img-thumbnail" style="margin-top: 10vh; margin-left: 2vh; border-radius: 2%" />';
                }
                
                
                ?>

                </div>
            </div>


           
            <div class="col-8" style="margin-top: 10vh">
                <div class="container">
                    <div class="header-content">
                        <div class="line"></div>
                        <div>
                            <h1 style="text-transform: uppercase"><?php echo $studio_name ?></h1>
                            <h6><i class="fa fa-phone fa-lg"></i> <?php echo $studio_phone ?></h6>
                            <h6 style="text-transform: uppercase">
                                <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                                <?php echo $studio_city ?> , INDIA
                            </h6>
                            <h6 style="margin-bottom: 20px ; ">

                                <?php
                                $category_sql = "select * from category where stud_id = '$studio_id'";
                                $res = mysqli_query($conn, $category_sql);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($r = mysqli_fetch_assoc($res)) {
                                        $category = $r["categ_name"];
                                        echo '<code class=" px-2 py-1   " style="font-family:Poppins; background-color:#1abc9c;  color :white; border-radius:10%; ">' . $category . '</code>';;
                                    }
                                }
                                ?>


                            </h6>
                            <h6>
                                RATING
                                <?php
                                $sql = "SELECT * FROM photostudio where stud_id='$id'";
                                $result = mysqli_query($conn, $sql);
                                while ($rate = mysqli_fetch_assoc($result)) {
                                    $rating = $rate["stud_rating"];
                                }
                                for ($i = 0; $i < $rating; $i++) {
                                    echo '<span class="fa fa-star" style="color:gold"></span>';
                                }
                                ?>
                            </h6>
                            <br />
                            <a href="book.php" class="btn btn-primary btn-lg shadow"
                                style="padding: 12px">
                                <b>Check your bookings</b>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section style="box-sizing: border-box; height: 100%" class="clr">
        <div class="container">
            <ul class="nav nav-tabs p-2 mb-4 clr text-white-50 border" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="txt nav-link active shadow-sm" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="txt nav-link shadow-sm" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">PHOTOS</a>
                </li>
                <li class="nav-item">
                    <a class="txt nav-link shadow-sm" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">REVIEWS</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    OVERVIEW
                    <p class="text-secondary text-truncate-wrap mdc-typography--body2" mdcbody2="">
                        <?php echo $studio_description ?>

                    </p>
                    ADDRESS
                    <p class="text-secondary text-truncate-wrap mdc-typography--body2" mdcbody2="">
                        <?php echo $studio_address ?></p>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2 style="text-align: center; padding: 10px;">STUDIO PHOTOS</h2>

                    <div class="row">
                        <?php
                        $sql = "select * from photo where stud_id = '$id'";
                        $res = mysqli_query($conn, $sql);
                        $c = 0;
                        if (mysqli_num_rows($res) > 0) {
                            while ($r = mysqli_fetch_assoc($res)) {
                                $img_name = $r["img_name"];
                                echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="studio_photos/' . $img_name . '" class="fancybox" rel="ligthbox">
                    <img src="studio_photos/' . $img_name . '" class="zoom img-fluid " alt="">
    
                  </a>
                </div>';
                                $c = $c + 1;
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <?php

                    $comm = "SELECT * FROM coment where stud_id='$id'";


                    $resu = mysqli_query($conn, $comm);


                    if (mysqli_num_rows($resu) > 0) {
                        while ($row = mysqli_fetch_assoc($resu)) {
                            $coment = $row["cust_comments"];
                            $ctime = $row["comenttime"];
                            $ctime = date("d-m-Y", strtotime($ctime));
                            $c_id = $row["cust_id"];
                            $sqll = "SELECT * FROM customer where cust_id='$c_id'";
                            $res = mysqli_query($conn, $sqll);
                            while ($cust = mysqli_fetch_assoc($res)) {
                                $cust_name = $cust["cust_name"];
                            }

                    ?>
                    <div class="card">
                        <div class="row">
                            <div class="col-10">
                                <div class="comment-box ml-2">
                                    <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                            src="https://cdn5.vectorstock.com/i/1000x1000/29/19/simple-human-icon-business-design-isolated-on-vector-23042919.jpg"
                                            width="40">
                                        <div class="d-flex flex-column justify-content-start ml-2"><span
                                                class="d-block font-weight-bold name"><?php echo $cust_name ?><span
                                                    class="tab"></span> <?php echo $ctime ?></span><span
                                                class="date text-black-50">Shared publicly </span></div>

                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text"> <?php echo $coment ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>