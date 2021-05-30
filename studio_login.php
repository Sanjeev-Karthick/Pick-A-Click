<?php
include 'db_connect.php';
?>









<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
  
    />
    <meta name="generator" content="Hugo 0.83.1" />
    <title>Log in</title>

   

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet" />
  </head>
  <body class="text-center" style="background: #3598dc;">

    <main class="form-signin shadow p-3 bg-white rounded" >
    <?php
  if(isset($_GET["err"])){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sorry !</strong> Incorrect email  / Password.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

  } 
    ?>
 
    <form method="POST" action=
            "handlestudiologin.php">
            <img class="mb-4" src="resources/img/logx.png" height="100" width="100" style="border: 1px solid black; border-radius:50%">
       
        <h1 class="h3 mb-3 fw-normal">Studio log in</h1>

        <div class="form-floating">
          <input
          name="email"
            type="email"
            class="form-control"
            id="floatingInput"
            placeholder="name@example.com"
          />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input
          name="password"
            type="password"
            class="form-control"
            id="floatingPassword"
            placeholder="Password"
          />
          <label for="floatingPassword">Password</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" name="log" value="log" type="submit">LOGIN</button>
        <br>
        <br>
        <p>New photo studio to pick-a-click? <br><a href="photos_upload.php"> Goto Studio sign up page</a></p>
      </form>
    </main>
    <br>
    <br>
   
    
  </body>
</html>
