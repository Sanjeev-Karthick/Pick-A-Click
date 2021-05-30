<?php include("file-upload.php"); ?>

<?php

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <title>Upload Studio photos</title>
  <style>
    .contain {
      max-width: 450px;
    }

    .imgGallery img {
      padding: 8px;
      max-width: 100px;
    }
  </style>
</head>
<script>
  function resetFile() {
    const file =
      document.querySelector('.file');
    file.value = '';
  }
</script>

<body style="background: #3598dc;">

  <section id="register-form" class="container shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 60%; margin-top: 40px;">






    <form action="" method="post" enctype="multipart/form-data" class="mb-3">


      <!-- Default form register -->

      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Studio Signup</h1>
          <p class="lead"> Please register your studio.</p>
          <p>If you already have an account.</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="studio_login.php" role="button"> Goto Login page</a>
          </p>
        </div>
      </div>
      <input type="text" class="form-control mb-4" placeholder="Studio name" name="stud_name">

      <!-- E-mail -->
      <input type="email" class="form-control mb-4" placeholder="Studio email" name="stud_email">
      <br>

      <div class="form-group">
        <label for="exampleFormControlFile1" class="h6">Studio Profile pic</label>
        <input type="file" class="form-control-file btn btn-secondary"  name= "profile_pic" id="exampleFormControlFile1">
      </div>
      <br>



      <div class="form-row mb-4">
        <div class="col">
          <!-- First name -->
          <input type="password" class="form-control" placeholder="Password" name="stud_password">
        </div>
        <div class="col">
          <!-- Last name -->
          <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
        </div>


      </div>
      <br>

      <!-- Phone number -->
      <input type="text" id="defaultRegisterPhonePassword" name="stud_phone" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">


      <br>
      <br>


      <textarea class="form-control" rows="2" placeholder="Address" name="stud_address"></textarea>
      <br>

      <div class="form-group">
        <label for="inputState">City</label>
        <select id="inputState" class="form-control" name="stud_city">
          <option selected>Choose..</option>
          <option value="chennai">Chennai</option>
          <option value="bengaluru">Bengaluru</option>
          <option value="cochin">Cochin</option>
        </select>
      </div>
      <br>
      <br>
      <br>


      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"><b>Give a description about your studio</b></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="stud_description"></textarea>
      </div>



      <!-- Default form register -->

      <div class="">
        <div class="">
          <la class="h6 mb-1">
            <p>Categories</p>
            <ul class="list-group">
              <li class="list-group-item rounded-0">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="customCheck1" type="checkbox" name="studio_category[]" value="wedding">
                  <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck1">Wedding</label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="customCheck2" type="checkbox" name="studio_category[]" value="birthday">
                  <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck2">Birthday</label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="customCheck3" type="checkbox" name="studio_category[]" value="baby shower">
                  <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck3">Baby shower</label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="customCheck4" type="checkbox" name="studio_category[]" value="spiritual function">
                  <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck4">Spiritual function</label>
                </div>
              </li>
              <li class="list-group-item rounded-0">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="customCheck5" type="checkbox" name="studio_category[]" value="ear piercing">
                  <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck5">Ear piercing</label>
                </div>
              </li>

              </li>
            </ul>
        </div>
      </div>

      <br>
      <h3 class="text-center mb-5">Upload Photos of your studio</h3>

      <div class="user-image mb-3 text-center">
        <div class="imgGallery">
          <!-- Image preview -->
        </div>
      </div>

      <div class="custom-file">
        <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
        <label class="custom-file-label" for="chooseFile">Select file</label>

      </div>
      <center>
        <br>
        <button onclick="resetFile()" class="btn btn-secondary">
          Reset photos
        </button>
      </center>


      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
        <b>Upload Photos and Sign up</b>
      </button>
    </form>
  </section>

  <!-- Display response messages -->
  <?php if (!empty($response)) { ?>
    <div class="alert <?php echo $response["status"]; ?>">
      <?php echo $response["message"]; ?>
    </div>
  <?php } ?>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <script>
    $(function() {
      // Multiple images preview with JavaScript
      var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
          var filesAmount = input.files.length;

          for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            }

            reader.readAsDataURL(input.files[i]);
          }
        }

      };

      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });
  </script>


</body>

</html>