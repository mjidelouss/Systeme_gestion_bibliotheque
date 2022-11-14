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
        <title>Admin | Dashboard</title>
    <!-- ================== BEGIN core-css ================== -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/default/app.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link href="./dash_style.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
  </head>
  <body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading ms-3 py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class=""></i>YouCode</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" onclick="resetBookForm()" data-bs-toggle="modal" data-bs-target="#modal-book"><i
                        class="fas fa-add me-2"></i>Add Book</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold me-2" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-profile">Profile</a></li>
                                <li><a class="dropdown-item" href="./index.html">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
<!-- Welcome user Message -->
<?php
$sql = "SELECT * FROM adminusers";
$res = $con->query($sql);
$row = $res->fetch_assoc();
echo '<h1 class="display-1 mb-3 ms-4">Welcom Back '.$row["username"].'</h1>';
?>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php
                global $con;
                $sql = "SELECT COUNT(*) FROM livre";
                $res = $con->query($sql);
                $row = $res->fetch_assoc();
                $bookCount = $row['COUNT(*)'];
                echo '<h3 class="fs-2">'.$bookCount.'</h3>';
                ?>
                                <p class="fs-5">Total Books</p>
                            </div>
                            <i class="fas fa-book fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php
                global $con;
                $sql = "SELECT COUNT(*) FROM adminusers";
                $res = $con->query($sql);
                $row = $res->fetch_assoc();
                $userCount = $row['COUNT(*)'];
                echo '<h3 class="fs-2">'.$userCount.'</h3>';
                ?>
                                <p class="fs-5">Total Users</p>
                            </div>
                            <i
                                class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Available Books</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Auteur</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Quantite</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Date de Publication</th>
                                </tr>
                            </thead>
                            <tbody id="book-table">
                              <?php
                              getBooks();
                              while ($row = $res->fetch_assoc()) {
                                echo '
                                <tr>
                                    <th scope="row">'.$row["id"].'</th>
                                    <td>'.$row["Titre"].'</td>
                                    <td>'.$row["Auteur"].'</td>
                                    <td>'.$row["Categoryy"].'</td>
                                    <td>'.$row["Quantite"].'</td>
                                    <td>'.$row["ISBN"].'</td>
                                    <td>'.$row["Date_de_publication"].'</td>
                                    <td><button data-info="'.$row["Titre"].','.$row["Auteur"].','.$row["Categoryy"].','.$row["Quantite"].','.$row["ISBN"].','.$row["Date_de_publication"].'" class="rounded" 
                                    data-bs-toggle="modal" data-bs-target="#modal-updelBook" id="'.$row["id"].'" onclick="initializeBook('.$row["id"].')"><i class="bi bi-pencil-square" style="color: green;"></i></button></td>
                                    <form action="scripts.php" method="get">
                                    <td><button type="submit" class="rounded"><a href="scripts.php?deleteid='.$row["id"].'"><i class="bi bi-trash-fill" style="color: red;"></i></a></button></td>
                                    </form>
                                    </tr>
                                ';
                            }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- PROFIL MODAL -->
<?php
$sql = "SELECT * FROM adminusers";
$res = $con->query($sql);
$row = $res->fetch_assoc();
?>
    <div class="modal fade" id="modal-profile">
      <div class="modal-dialog">
        <div class="modal-content">
        <form action="scripts.php" method="POST">
          <div
            class="modal-header"
            style="
              background-image: linear-gradient(#429acd, #8dd6f8);
              border: none;
            "
          >
            <h5 class="modal-title text-black fs-2">Profile</h5>
          </div>
          <div class="modal-body" style="background-color: #8dd6f8">
          <div class="" id="">
          <input type="text" id="profileId" name="profileId" value="<?= $row['id']; ?>" style="display: none">
              <label class="col-form-label text-black">Username</label>
              <input
                type="text"
                class="form-control"
                id="userName"
                name="userName"
                value="<?= $row['username']; ?>"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="<?= $row['email']; ?>"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">Full Name</label>
              <input
                type="text"
                class="form-control"
                id="fullName"
                name="fullName"
                value="<?= $row['full_name']; ?>"
              />
            </div>
            <div class="">
              <label class="col-form-label text-black">Birth Day</label>
              <input
                type="date"
                class="form-control"
                id="birthDate"
                name="birthDate"
                value="<?= $row['Date_de_naissance']; ?>"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">New Password</label>
              <input
              type="password"
                class="form-control"
                id="newPass"
                name="newPass"
              />
            </div>
          </div>
          <div
            class="modal-footer"
            style="background-color: #8dd6f8; border: none"
          >
            <button
              type="button"
              class="btn btn-primary border rounded-pill"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="submit"
              id="updateProfile"
              class="btn btn-success rounded-pill text-white"
              name="updateProfile"
            >
            Update
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>

<!-- BOOK MODAL -->
<div class="modal fade" id="modal-book">
      <div class="modal-dialog">
        <div class="modal-content">
        <form action="scripts.php" method="POST" id="form-book">
          <div
            class="modal-header"
            style="
              background-image: linear-gradient(#429acd, #8dd6f8);
              border: none;
            "
          >
            <h5 class="modal-title text-black">ADD BOOK</h5>
          </div>
          <div class="modal-body" style="background-color: #8dd6f8">
          <div class="" id="">
              <label class="col-form-label text-black">Titre</label>
              <input
                type="text"
                class="form-control"
                id="title"
                name="title"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">Auteur</label>
              <input
                type="text"
                class="form-control"
                id="author"
                name="author"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">Quantite</label>
              <input
                type="text"
                class="form-control"
                id="quantite"
                name="quantite"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">ISBN</label>
              <input
                type="text"
                class="form-control"
                id="isbn"
                name="isbn"
              />
            </div>
            <div class="">
              <label class="col-form-label text-black">Category</label>
              <select
                class="form-select"
                id="category"
                name="category"
              >
                <option disabled selected>Please select</option>
                <option value="1">Action</option>
                <option value="2">Adventure</option>
                <option value="3">Science Fiction</option>
                <option value="4">Biography</option>
                <option value="5">Sport</option>
                <option value="6">Programing</option>
                <option value="7">Mathematique</option>
                <option value="8">Philosophy</option>
              </select>
            </div>
            <div class="">
              <label class="col-form-label text-black">Date de Publication</label>
              <input
                type="date"
                class="form-control"
                id="pubDate"
                name="pubDate"
              />
            </div>
          </div>
          <div
            class="modal-footer"
            style="background-color: #8dd6f8; border: none"
          >
            <button
              type="button"
              class="btn btn-primary border rounded-pill"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="submit"
              id="update"
              class="btn btn-danger rounded-pill text-white"
              name="save"
              id="save"
            >
            Save
            </button>
          </form>
          </div>
        </div>
      </div>
</div>

<!-- UPDATE & DELETE BOOK MODAL -->
<div class="modal fade" id="modal-updelBook">
      <div class="modal-dialog">
        <div class="modal-content">
        <form action="scripts.php" method="POST" id="">
          <div
            class="modal-header"
            style="
              background-image: linear-gradient(#429acd, #8dd6f8);
              border: none;
            "
          >
            <h5 class="modal-title text-black">Update Book</h5>
          </div>
          <div class="modal-body" style="background-color: #8dd6f8">
          <div class="" id="">
          <input type="text" id="bookId" name="bookId" style="display: none">
              <label class="col-form-label text-black">Titre</label>
              <input
                type="text"
                class="form-control"
                id="newTitle"
                name="newTitle"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">Auteur</label>
              <input
                type="text"
                class="form-control"
                id="newAuthor"
                name="newAuthor"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">Quantite</label>
              <input
                type="text"
                class="form-control"
                id="newQuantite"
                name="newQuantite"
              />
            </div>
            <div class="" id="">
              <label class="col-form-label text-black">ISBN</label>
              <input
                type="text"
                class="form-control"
                id="newIsbn"
                name="newIsbn"
              />
            </div>
            <div class="">
              <label class="col-form-label text-black">Category</label>
              <select
                class="form-select"
                id="newCategory"
                name="newCategory"
              >
                <option disabled selected>Please select</option>
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="Science Fiction">Science Fiction</option>
                <option value="Biography">Biography</option>
                <option value="Sport">Sport</option>
                <option value="Programing">Programing</option>
                <option value="Mathematique">Mathematique</option>
                <option value="Philosophy">Philosophy</option>
              </select>
            </div>
            <div class="">
              <label class="col-form-label text-black">Date de Publication</label>
              <input
                type="date"
                class="form-control"
                id="newPubDate"
                name="newPubDate"
              />
            </div>
          </div>
          <div
            class="modal-footer"
            style="background-color: #8dd6f8; border: none"
          >
          <button
              type="button"
              class="btn btn-primary border rounded-pill"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="submit"
              id="update"
              name="update"
              class="btn btn-success rounded-pill text-white"
            >
            Update
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>
</body>
    <!-- ================== BEGIN core-js ================== -->
    <script src="scripts.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ================== END core-js ================== -->
</html>