<?php
include 'scripts.php';
if (isset($_SESSION['connected'])) {
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
<body style ="background-image: url(./assets/img/book3.jpg);">
<section class="">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center">
      <div class="col col-xl-6 col-lg-8 col-md-10">
        <div class="card" style="border-radius: 4rem; height: 490px;">
            <div class="col-md-12 col-lg-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form action="scripts.php" method="POST">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #a2d2ff;"></i>
                    <span class="h1 fw-bold mb-0">YouCode</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                  <div class="form-outline mb-4">
                  <input type="text" id="userId" name="userId" style="display: none">
                  <?php
if (isset($_SESSION['message'])) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$_SESSION['message'].'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    unset($_SESSION['message']);
}?>
                  <label class="form-label">Username</label>
                    <input type="text" id="log_username" name="log_username" class="form-control form-control-lg" required/>
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label">Password</label>
                    <input type="password" id="log_pass" name="log_pass" class="form-control form-control-lg" required/>
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name ="login" type="submit">Login</button>
                  </div>
                  <a class="small text-muted" href="#">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #636c78;">Don't have an account? <a href="./sign_up.php"
                      style="color: #393f81;">Register here</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
    <!-- ================== END core-js ================== -->
</html>