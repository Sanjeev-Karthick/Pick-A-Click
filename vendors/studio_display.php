<?php include 'db_connect.php';
$id = $_GET["num"];
?>

		$sqlQuery .= " ORDER By price";
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <title>STUDIO</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
      font-family: "Poppins";
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


    img.zoom {
      width: 100%;
      height: 200px;
      border-radius: 5px;
      object-fit: cover;
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
  </style>
</head>
<script src="https://use.fontawesome.com/60db52c5b9.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color:#191919;">
        <a class="navbar-brand" href="#"><img src="resources/img/loggg.png" width="90px" height="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" style="margin-left: 70%">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Your account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Hello ,
                                <?php echo $_SESSION['cust_name']?> </a>
                                
                        <a class="dropdown-item" href="#">Your bookings</a>
                        
                        <a class="dropdown-item" href="#">Something else here</a>
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

  <div class="bg-cover text-white">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-2">
        <div class="contain">
          <img src="https://images.unsplash.com/photo-1546032996-6dfacbacbf3f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8d2VkZGluZ3xlbnwwfDF8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="..." class="as img-fluid img-thumbnail" style="margin-top: 10vh; margin-left: 2vh; border-radius: 2%" />
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
            }}
      ?>
      <div class="col-8" style="margin-top: 10vh">
        <div class="container">
          <div class="header-content">
            <div class="line"></div>
            <div>
              <h1 style="text-transform: uppercase"><?php echo $studio_name ?></h1>
              <h6><i class="fa fa-phone fa-lg"></i> <?php echo $studio_phone ?></h6>
              <h6 style="text-transform: uppercase">
                <i class="fa fa-map-marker fa-lg" aria-hidden="true" ></i>
                <?php echo $studio_city ?> , INDIA
              </h6>
              <h6 style="margin-bottom: 20px ; ">

                <?php
                $category_sql = "select * from category where stud_id = '$studio_id'";
                $res = mysqli_query($conn, $category_sql);
                if (mysqli_num_rows($res) > 0) {
                  while ($r = mysqli_fetch_assoc($res)) {
                    $category = $r["categ_name"];
                    echo '<code class=" px-2 py-1   " style="font-family:Poppins; background-color:#1abc9c;  color :white; border-radius:10%; ">'.$category.'</code>';;
                  }
                }
                ?>




                

              </h6>
              <h6>
                RATING
                <a href="#"> <span class="fa fa-star fa-1x"></span></a>
                <a href="#"> <span class="fa fa-star"></span></a>
                <a href="#"> <span class="fa fa-star"></span></a>
                <a href="#"> <span class="fa fa-star"></span></a>
                <a href="#"> <span class="fa fa-star"></span></a>
              </h6>
              <br />
              <button type="button" class="btn btn-success btn-lg shadow" style="padding: 12px">
                <b>BOOK NOW </b>
              </button>
              <pre style="display: inline"></pre>
              <button type="button" class="btn btn-secondary btn-lg" style="padding: 12px">
                ENQUIRE
              </button>
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
          <a class="txt nav-link active shadow-sm" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="txt nav-link shadow-sm" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PHOTOS</a>
        </li>
        <li class="nav-item">
          <a class="txt nav-link shadow-sm" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">REVIEWS</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          OVERVIEW
          <p class="text-secondary text-truncate-wrap mdc-typography--body2" mdcbody2="">
            We are a professional photography services company based in
            Chennai . We have been running a professional photography business
            for 7 years, specializing in Reception, Theme Wedding, Kashmiri
            Wedding, Brahmin Wedding, Jain Wedding, Punjabi Wedding,
            Rajasthani Wedding, Bengali Wedding, Muslim Wedding, Indian
            Wedding, Christian Wedding, North Indian Wedding, Pre-wedding
            Shoots, Bridal Portraits, Candid Wedding, South Indian Wedding,
            Concept Wedding, Couple Portraits, Engagement, Tamil Wedding,
            Hindu Wedding, Gujarati Wedding, Destination Wedding, Contemporary
            Wedding , Marwadi Wedding, Wedding, Birthday, New Born,
            Kindergarten, Kids Portraits, Graduation Ceremony, School Events,
            Babies &amp; Kids, Show &amp; Pageant, Model Portfolio, Celebrity
            &amp; Glamour, Portraits, Fashion &amp; Portfolio, Convocation,
            Housewarming, Maternity, Anniversary, Special Occasion, Concerts,
            Expo/Exhibitions, Campaigns, Team Building Event, Conferences and
            Corporate Events photography. We undertake customized photography
            requirements. Some of our products and services include HD Videos,
            Montage, T-Shirt, Shortfilms, Enlargement, Cinematography, Promo
            Videos, Calendar, Documentary, Frames, CD / DVD, Poster, Brochure,
            Lamination, Photobook, Live Streaming, Blueray Disc, Coffee Table
            Book, Coffee Mug and HD Highlights. We provide services in Tamil
            Nadu, All Over India and All Over World. We are proficient in
            Tamil, Telugu, English, Hindi and Malayalam.
          </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h2 style="text-align: center; padding: 10px;">STUDIO PHOTOS</h2>

          <div class="row">
            <?php
            $sql = "select * from photo where stud_id = '$id'" ;
           $res = mysqli_query($conn, $sql);
           $c = 0;
           if (mysqli_num_rows($res) > 0) {
               while ($r = mysqli_fetch_assoc($res)) {
                   $img_name = $r["img_name"]; 
                  echo'<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="studio_photos/'.$img_name.'" class="fancybox" rel="ligthbox">
                    <img src="studio_photos/'.$img_name.'" class="zoom img-fluid " alt="">
    
                  </a>
                </div>' ;
                  $c = $c + 1;

               }
           }
           ?>
          


          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
          COMMENTS Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Eveniet unde quae dolorum consequatur repudiandae dolore voluptas
          deleniti architecto labore non pariatur maiores tempore, quas velit
          iusto itaque, nostrum commodi rem! Lorem ipsum dolor sit amet
          consectetur adipisicing elit. Dicta cum suscipit, eius, ipsa
          laudantium debitis fugit praesentium blanditiis recusandae itaque
          modi ipsum commodi laborum placeat culpa et dignissimos delectus.
          Animi repellendus rerum dolorem consectetur quae dolorum quaerat
          accusamus laudantium ipsam sunt consequatur id obcaecati impedit,
          nostrum, neque placeat necessitatibus odit, doloribus reiciendis
          omnis fuga? Molestiae consequuntur ab libero. Mollitia, voluptas
          facere porro harum fuga reprehenderit temporibus dolorum reiciendis
          totam enim aperiam esse fugiat incidunt accusamus distinctio quam
          itaque, recusandae, facilis nobis. Facilis repellat voluptate fugit
          ad minus porro, officia ipsam tempore iste dolor laborum temporibus
          atque totam accusantium veritatis aliquid?
        </div>
      </div>
    </div>
  </section>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>