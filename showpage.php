<?php include 'db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$sqlQuery = "SELECT * FROM photostudio WHERE studio_val = '0'";
?>

<?php

if (!(isset($_SESSION['loggedin'])) && $_SESSION['loggedin'] != true || !(isset($_SESSION['customer_email']))) {
    header("Location: /pickaclick/login.php");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["stud_city"])) {
        $cityFilterData = $_POST["stud_city"];
        $sqlQuery .= "
			AND stud_city = '" . $cityFilterData . "'";
    }
    if (isset($_POST["rating"])) {
        $ratingFilterData = $_POST["rating"];
        $sqlQuery .= "
			AND stud_rating >= " . $ratingFilterData . "";
    }
    if (isset($_POST["stud_category"])) {
        $categ = $_POST["stud_category"];
        $sql = "select distinct stud_id from category where categ_name='$categ'";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arr, $row["stud_id"]);
        }
        $categoryFilterData = implode("','", $arr);
        $sqlQuery .= "
			AND stud_id IN('" . $categoryFilterData . "')";
    }
    $sqlQuery .= " ORDER By stud_id";
}
?>
<!DOCTYPE html>
<html style="background-color: #e0e0e0;">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="resources/css/photocard.css" />
    <link rel="stylesheet" href="resources/css/showpage.css" />

    <script src="https://use.fontawesome.com/60db52c5b9.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<style>
    .modal-backdrop,
    .modal-backdrop.fade.in {
        opacity: 0.1;
    }
</style>
<script>
    $('.modal-backdrop').remove();
</script>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color:black;">
        <a class="navbar-brand" href="#"><img src="resources/img/loggg.png" width="90px" height="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" style="margin-left: 70%">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Your account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Hello ,
                            <b> <?php echo $_SESSION['cust_name'] ?> </b> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="booking_display.php">Your bookings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal" data-backdrop="false">
                                Update your detais
                            </button>

                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>



            </ul>
        </div>
    </nav>


    <!-- Modal -->
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



    <!--  HTML SIDE BAR FOR MOBILE      -->

    <div class="filter">
        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="false" aria-controls="mobile-filter">
            Filters<span class="fa fa-filter pl-1"></span>
        </button>
    </div>
    <div id="mobile-filter">
        <div>
            <form class="ml-md-2 " method="post" action="showpage.php">
                <h6 class="p-1 border-bottom " style="color: black;">City</h6>
                <ul>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stud_city" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Chennai
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stud_city" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Bengaluru
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stud_city" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cochin
                            </label>
                        </div>
                    </li>


        </div>

        <div>
            <h6 class="p-1 border-bottom " style="color: black; margin-top:30px">Categories</h6>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Wedding
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Baby photoshoot
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Commercial
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Corporate events
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Special occasion
                        </label>
                    </div>
                </li>

            </ul>


        </div>
        <!-- Section: Average -->


        <div>
            <h6 class="p-1 border-bottom">Rating</h6>
            <ul>
                <ul>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                5 stars
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                4 stars & above
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                3 stars & above
                            </label>
                        </div>
                    </li>

                </ul>

            </ul>
            <div style="border: 2px solid black;">
                <?php
                if (isset($cityFilterData) || isset($ratingFilterData) || isset($categ)) {
                    echo '<span style="margin :3px; display:block;padding:5px;" class-"shadow-sm mb-5 bg-white rounded">Selected categories </span>';
                }
                if (isset($cityFilterData)) {
                    echo '<span style="margin :3px; border:2px solid black;font-weight: 600; padding:3px; " class-"shadow-sm mb-5 bg-white rounded"> ' . $cityFilterData . ' </span>';
                }
                if (isset($categ)) {
                    echo '<span style="margin :3px; border:2px solid black; font-weight: 600; padding:3px;"  class-"shadow-sm">' . $categ . ' </span>';
                }
                if (isset($ratingFilterData)) {
                    echo '<span style="margin :3px;  border:2px solid black;font-weight: 600;  padding:3px;"  class-"shadow-sm"> Rating >= ' . $ratingFilterData . ' </span>';
                }
                ?>
            </div>
            <center> <button type="submit" class="btn btn-primary btn-lg ">Apply Filter</button></center>

        </div>

    </div>

    </form>

    <!--  HTML SIDE BAR FOR PC AND LAPTOPS      -->

    <section id="sidebar">
        <div>
            <hr>
            <hr>

            <form class="ml-md-2" method="post" action="showpage.php">
                <b>
                    <h6 class="p-1 border-bottom " style="color: black;"><b>CITIES <b></h6>
                    <ul>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stud_city" id="flexRadioDefault1" value="chennai">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    CHENNAI
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stud_city" id="flexRadioDefault1" value="bengaluru">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    BENGALURU

                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stud_city" id="flexRadioDefault1" value="cochin">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    COCHIN
                                </label>
                            </div>
                        </li>
                    </ul>
        </div>

        <div>
            <h6 class="p-1"><b>CATEGORIES</b></h6>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1" value="wedding">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Wedding
                        </label>
                    </div>
                </li>

                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1" value="birthday">
                        <label class="form-check-label" for="flexRadioDefault1">
                            BIRTHDAY
                        </label>
                    </div>
                </li>

                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1" value="baby shower">
                        <label class="form-check-label" for="flexRadioDefault1">
                            BABY SHOWER
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1" value="spiritual function">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SPIRITUAL FUNCTION
                        </label>
                    </div>
                </li>

                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" id="flexRadioDefault1" value="ear piercing">
                        <label class="form-check-label" for="flexRadioDefault1">
                            EAR PIERCING
                        </label>
                    </div>
                </li>

                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stud_category" value="commercial">
                        <label class="form-check-label" for="flexRadioDefault1">
                            COMMERCIAL
                        </label>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Section: Average -->


        <div>
            <h6 class="p-1 border-bottom"><b>RATING <b></h6>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" value="5" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            5 stars
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" value="4" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            4 stars & above
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" value="3" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            3 stars & above
                        </label>
                    </div>
                </li>

            </ul>


            <?php
            if (isset($cityFilterData) || isset($ratingFilterData) || isset($categ)) {
                echo '<span style="margin :3px; display:block;padding:5px;" class-"shadow-sm mb-5 bg-white rounded">APPLIED FILTERS </span>';
            }
            if (isset($cityFilterData)) {
                echo '<span style="margin :3px; border:2px solid black;font-weight: 600; padding:3px; " class-"shadow-sm mb-5 bg-white rounded"> ' . $cityFilterData . ' </span>';
            }
            if (isset($categ)) {
                echo '<span style="margin :3px; border:2px solid black; font-weight: 600; padding:3px;"  class-"shadow-sm">' . $categ . ' </span>';
            }
            if (isset($ratingFilterData)) {
                echo '<span style="margin :3px;  border:2px solid black;font-weight: 600;  padding:3px;"  class-"shadow-sm"> Rating >= ' . $ratingFilterData . ' </span>';
            }
            ?>

            <br>
            <br>
            <b><button type="submit" class="btn btn-primary btn-lg border-5" style="width:50%;margin-left:10%">Apply
                    Filter</button></b>


            </ul>

        </div>
        </form>
        </b>
    </section>

    <section id="products">
        <div class="container">


            <div class="dropdown show direction">
                <a class="btn btn-secondary dropdown-toggle bg-white text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort by
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Popularity</a>
                    <a class="dropdown-item" href="#">Average rating</a>
                    <a class="dropdown-item" href="#">Price Low to High</a>
                    <a class="dropdown-item" href="#">Price High to Low</a>
                </div>
            </div>

            <!-- PHOTOSTUDIO DISPLAY CARDS --->

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Welcome <?php echo $_SESSION["cust_name"] ?> 👋!</h4>
                <p> Choose the best photographer for your occasion ! </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php

            $result = mysqli_query($conn, $sqlQuery);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $studio_id = $row["stud_id"];
                    $studio_name = $row["stud_name"];
                    $studio_phone = $row["stud_phone"];
                    $studio_city = $row["stud_city"];
                    $studio_id = $row["stud_id"];
                    $rating = $row["stud_rating"];
                    $pic =$row["stud_profile_pic"];


            ?>



                    <div class="row single shadow p-4 mb-5 bg-white rounded capitalize">

                        <div class="col-2">
                            <?php
                            if (isset($pic) && $pic != "") {
                                echo ' <img class="img " src="profile_pic/'.$pic.'" alt=" Studio image">';
                            } else {
                                echo '<img class="img " src="https://d3btuubl2bvm9d.cloudfront.net/images/62d14f76696011e3b47f0e2f866a9102/1553090158615-mid.jpg" alt=" Studio image">';
                            }


                            ?>
                            
                        </div>
                        <div class="col-7 pad">
                            <h2 style="text-transform: uppercase;"><a style="color: black; text-decoration:none" href="studio_disp.php?num=<?php echo $studio_id; ?>"><?php echo "$studio_name" ?></a></h2>
                            <p class="capitalize"><strong> <i class="fa fa-phone fa-lg"> </i> </strong>
                                <?php echo "$studio_phone" ?></p>
                            <p class="capitalize"><strong> <i class="fa fa-map-marker  fa-lg" aria-hidden="true"></i> </strong>
                                <?php echo "$studio_city" ?> , INDIA
                            </p>
                            <p>
                                <?php
                                $category_sql = "select * from category where stud_id = '$studio_id'";
                                $res = mysqli_query($conn, $category_sql);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($r = mysqli_fetch_assoc($res)) {
                                        $category = $r["categ_name"];
                                        echo ' <span style="margin :5px; margin-top:10px;"class="tags">' . $category . ' </span>';
                                    }
                                }
                                ?>

                            </p>
                        </div>
                        <div class="col-3 ">


                            <figcaption class="ratings" style="padding: 10px;">
                                <p style="padding: 0px;margin:0px">
                                <div class="fa fa-star fa-2x" style="visibility: hidden;padding: 0px;margin:0px"></div>Ratings
                                </p>
                                <?php
                                for ($i = 0; $i < $rating; $i++) {
                                    echo '<div class="fa fa-star fa-2x" style="color:gold"></div>';
                                }
                               
                                ?>

                            </figcaption>

                        </div>


                        <div class="row">
                            <?php
                            $sql = "select * from photo where stud_id = '$studio_id'";
                            $res = mysqli_query($conn, $sql);
                            $c = 1;
                            if (mysqli_num_rows($res) > 0) {
                                while ($r = mysqli_fetch_assoc($res)) {
                                    if ($c > 4) {
                                        break;
                                    }
                                    $img_name = $r["img_name"];
                                    echo ' <img class=" align col-3"
                  src="studio_photos/' . $img_name . '"
                  alt="">';
                                    $c = $c + 1;
                                }
                            } else {

                                echo '
            <img class=" align col-3"
                src="https://d3btuubl2bvm9d.cloudfront.net/images/27e889ce3d8a11e484950e2f866a9102/1528810387519-mid.jpg"
                alt="">
            <img class="col-3 align"
                src="https://d3btuubl2bvm9d.cloudfront.net/images/27e889ce3d8a11e484950e2f866a9102/1528532910837-mid.jpg"
                alt="">
            <img class="col-3 align"
                src="https://d3btuubl2bvm9d.cloudfront.net/images/27e889ce3d8a11e484950e2f866a9102/1545646675047-mid.jpg"
                alt="">
            <img class="col-3 align"
                src="https://d3btuubl2bvm9d.cloudfront.net/images/27e889ce3d8a11e484950e2f866a9102/1545646046234-mid.jpg"
                alt="">';
                            }


                            ?>


                        </div>


                    </div>
            <?php
                }
            } else {
                echo '<div class="jumbotron jumbotron-fluid shadow p-4 mb-5 bg-white rounded">
                <div class="container">
                  <h1 class="display-4">No Results</h1>
                  <p class="lead">There are no studios available for your applied filter.</p>
                </div>
              </div>';
            }

            ?>

            <div class="dropdown show direction1">

                <nav aria-label="Page navigation example">
                    <center>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </center>
                </nav>

            </div>

    </section>



    <script type="text/javascript"></script>
</body>

</html>cv