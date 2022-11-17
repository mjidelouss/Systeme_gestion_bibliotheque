<?php
include 'scripts.php';
if(isset($_SESSION['connected'])){
  header("location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign in</title>
    <!-- ================== BEGIN core-css ================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="assets/css/default/app.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
  </head>
<body>
<section class="" style="background-image: url(./assets/img/book3.jpg);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-xl-6 col-lg-8 col-md-10">
        <div class="card" style="border-radius: 1rem; height: 490px;">
            <div class="col-md-12 col-lg-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <form class="mx-1 mx-md-4" action="scripts.php" method="POST">
              <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #a2d2ff;"></i>
                    <span class="h1 fw-bold mb-0">YouCode</span>
                  </div>
<div class="d-flex flex-row align-items-center mb-4">
  <div class="form-outline flex-fill mb-0">
  <?php 
  if (isset($_SESSION['message'])){
  echo '<div class="alert alert-danger" role="alert">';
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  echo '</div>';
  }?>
  <label class="form-label">Username</label>
    <input type="text" id="username" name="username" class="form-control" required/>
  </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
  <div class="form-outline flex-fill mb-0">
  <label class="form-label">Email</label>
    <input type="email" id="email" name="email" class="form-control" required/>
  </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
  <div class="form-outline flex-fill mb-0">
  <label class="form-label">Password</label>
    <input type="password" id="pasword" name="pasword" class="form-control" required/>
  </div>
</div>
<div class="form-check d-flex justify-content-center mb-5">
  <input class="form-check-input me-2" type="checkbox" value="" id="checkTerms"/>
  <label class="form-check-label">
    I agree all statements in <a href="#">Terms of service</a>
  </label>
</div>
<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
  <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
</div>
<p class="text-center" style="color: #636c78;">Already have an account? <a href="./sign_in.php" style="color: #393f81;">Login here</a></p>
</form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
    <!-- ================== BEGIN core-js ================== -->
    <script src="scripts.js"></script>
    <!-- ================== END core-js ================== -->
</html>