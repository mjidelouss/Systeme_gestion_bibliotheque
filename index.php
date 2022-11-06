<?php
include 'scripts.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>YouCode | Library</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
      name="viewport"
    />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- ================== BEGIN core-css ================== -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/default/app.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
  </head>
  <body>
    <!-- BEGIN #app -->
    <header>
    <nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="./assets/img/youcode.png" alt="Logo" width="120" height="35" class="d-inline-block align-text-top">
    </a>
  </div>
</nav>
    </header>
      <!-- BEGIN #content -->
      <div class="d-flex justify-content-center mt-3 text-white">
        <h1 class="" style="font-size: 4vw;">Welcome to Youcode Lirary System</h1>
</div>
<div class="d-flex justify-content-center" style="position fixed">
  <img src="./assets/img/youcode1.png" alt="" class="img-responsive h-8 w-25">
</div>
      <div class="row d-flex justify-content-evenly" id="boxx">
      <button class="rounded-pill col-lg-2 col-md-4 col-sm-8 mb-4 btns">
    <p class="mt-2 fw-bold fs-2">Sign In</p>
    </button>
    <button class="rounded-pill col-lg-2 col-md-4 col-sm-8 mb-4 btns">
    <p class="mt-2 fw-bold fs-2">Sign Up</p>
    </button>
</div>
            <!-- BEGIN page-header -->
            
            <!-- END page-header -->
          
      <!-- END #content -->

    <!-- END #app -->

    <!-- TASK MODAL -->

    <!-- ================== BEGIN core-js ================== -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="scripts.js"></script>
    <!-- ================== END core-js ================== -->
  </body>
</html>