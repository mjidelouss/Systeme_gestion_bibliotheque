<?php
include 'scripts.php';
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
    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/default/app.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
  </head>
<body>
<section class="vh-100" style="background-color: #f8f1fa;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./assets/img/signup.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0rem 0 1rem; height: 100%;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form class="mx-1 mx-md-4" action="scripts.php" method="POST">
              <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #a2d2ff;"></i>
                    <span class="h1 fw-bold mb-0">YouCode</span>
                  </div>
<div class="d-flex flex-row align-items-center mb-4">
  <div class="form-outline flex-fill mb-0">
  <label class="form-label">Username</label>
    <input type="text" id="username" name="username" class="form-control" />
  </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
  <div class="form-outline flex-fill mb-0">
  <label class="form-label">Email</label>
    <input type="email" id="email" name="email" class="form-control" />
  </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
  <div class="form-outline flex-fill mb-0">
  <label class="form-label">Password</label>
    <input type="password" id="pasword" name="pasword" class="form-control" />
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
</form>
              </div>
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