<?php
//INCLUDE DATABASE FILE
include 'database.php';
//INITIALIZING SESSSION
session_start();

//ROUTING
if (isset($_POST['save'])) {
    saveBook();
}

if (isset($_POST['update'])) {
    updateBook();
}

if (isset($_POST['delid'])) {
    deleteBook();
}

if (isset($_POST['register'])) {
    regUser();
}

if (isset($_POST['login'])) {
    check_login();
}

if (isset($_POST['updateProfile'])) {
    updateProfile();
}

// getBooks Function collects the books data from the database table
function getBooks()
{
    global $con;
    global $res;
    $query = "SELECT livre.id, livre.Titre, livre.Auteur, livre.Quantite, category.Category AS Categoryy , livre.ISBN,
    livre.Date_de_publication FROM  livre, Category WHERE category.id = livre.category_id";
    $res = $con->query($query);
}

// saveBook Function adds a new book to the database table
function saveBook()
{
    global $con;
    // Declaring Book Variables
    $titre = $_POST['title'];
    $auteur = $_POST['author'];
    $category = $_POST['category'];
    $quantite = $_POST['quantite'];
    $isbn = $_POST['isbn'];
    $datePub = $_POST['pubDate'];

    $checkDoubleName = "SELECT Titre FROM livre";
    $checkDoubleIsbn = "SELECT ISBN FROM livre";
    $result = $con->query($checkDoubleName);
    $resultTwo = $con->query($checkDoubleIsbn);
    while ($row = $result->fetch_assoc()) {
        if ($titre == $row["Titre"]) {
            $_SESSION['message'] = "Failed to add Book: Book Name Already Exists!!";
            header('location: dashboard.php');
            exit();
        }
    }
    while ($rowTwo = $resultTwo->fetch_assoc()) {
        if ($isbn == $rowTwo["ISBN"]) {
            $_SESSION['message'] = "Failed to add Book: Book ISBN Already Exists!!";
            header('location: dashboard.php');
            exit();
        }
    }
    $sql = "INSERT INTO livre (Titre, Auteur, Quantite, category_id, ISBN, Date_de_publication) values ('$titre', '$auteur', '$quantite', '$category', '$isbn', '$datePub')";
    $con->query($sql);
    header('location: dashboard.php');
    $_SESSION['crud'] = "Book Added Successfully!!";
}

// updateBook Function updates a books data inside the database table
function updateBook()
{
    global $con;
    $id = $_POST['bookId'];
    $titre = $_POST['newTitle'];
    $auteur = $_POST['newAuthor'];
    $category = $_POST['newCategory'];
    $quantite = $_POST['newQuantite'];
    $isbn = $_POST['newIsbn'];
    $datePub = $_POST['newPubDate'];
    $categoryId = '';
    
    if ($category == "Action") {$categoryId = 1;}
    if ($category == "Adventure") {$categoryId = 2;}
    if ($category == "Science Fiction") {$categoryId = 3;}
    if ($category == "Biography") {$categoryId = 4;}
    if ($category == "Sport") {$categoryId = 5;}
    if ($category == "Programing") {$categoryId = 6;}
    if ($category == "Mathematique") {$categoryId = 7;}
    if ($category == "Philosophy") {$categoryId = 8;}
    $sql = "UPDATE livre SET id = $id, Titre = '$titre', Auteur = '$auteur', Quantite = '$quantite', category_id = '$categoryId', ISBN = '$isbn', Date_de_publication = '$datePub' WHERE id = $id";
    $con->query($sql);
    header('location: dashboard.php');
    $_SESSION['crud'] = "Book Updated Successfully!!";
}

// deleteBook function deletes a book from the database table
function deleteBook()
{
    global $con;
    $id = $_POST['delid'];
    $sqli = "DELETE FROM livre WHERE id = '$id'";
    $con->query($sqli);
    header('location: dashboard.php');
    $_SESSION['crud'] = "Book Deleted Successfully!!";
}

// regUser function registers the user into the database
function regUser()
{
    global $con;

    $username = $_POST['username'];
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
        //regular expression for email validation
        $email = $_POST['email'];
    } else {
        $_SESSION['message'] = "Email Address is invalid!!";
        header('location: sign_up.php');
        exit();
    }
    if (preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $_POST['pasword'])) {
        //regular expression for password validation
        $password = $_POST['pasword'];
    } else {
        $_SESSION['message'] = "Password must be at least 8 characters long contains 1 uppercase, 1 lowercase, 1 number and 1 special character!!";
        header('location: sign_up.php');
        exit();
    }
    $checkDoubleUser = "SELECT username FROM adminusers";
    $checkDoubleMail = "SELECT email FROM adminusers";
    $res = $con->query($checkDoubleUser);
    $resTwo = $con->query($checkDoubleMail);
    while ($row = $res->fetch_assoc()) {
        if ($username == $row["username"]) {
            $_SESSION['message'] = "Username Already Exists!!";
            header('location: sign_up.php');
            exit();
        }
    }
    while ($rowTwo = $resTwo->fetch_assoc()) {
        if ($email == $rowTwo["email"]) {
            $_SESSION['message'] = "Email Already Exists!!";
            header('location: sign_up.php');
            exit();
        }
    }
    $sql = "INSERT INTO adminusers (username, email, password) values ('$username', '$email', '$password')";
    $con->query($sql);
    header('location: sign_in.php');
}

// check_login function checks if the user can login or not
function check_login()
{
    global $con;
    $logName = $_POST['log_username'];
    $logPass = $_POST['log_pass'];

    $sql = "SELECT id FROM adminusers WHERE username = '$logName' and password = '$logPass'";
    $res = $con->query($sql);
    $connect = mysqli_fetch_assoc($res);
    $_SESSION['connected'] = $connect['id'];
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        header("location: dashboard.php");
    } else {
        $_SESSION['message'] = "Wrong Credentials!!";
        header('location: sign_in.php');
    }
}

// updateProfile function updates the users informations
function updateProfile()
{
    global $con;
    $id = $_POST['profileId'];
    $userName = $_POST['userName'];
    $oldPass = $_POST['oldPass'];
    $fullName = $_POST['fullName'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $newPass = $_POST['newPass'];
    $checkpass = "SELECT password FROM adminusers WHERE id=$id";
    $res = $con->query($checkpass);
    $row = $res->fetch_assoc();
    if ($row["password"] != $oldPass) {
        $_SESSION['message'] = "Failed to update Profile due to Incorrect Password!!";
        header('location: dashboard.php');
        exit();
    }
    if (!empty($newPass)) {
        $oldPass = $newPass;
    }
    $sql = "UPDATE adminusers SET id = $id, username = '$userName', email = '$email', password = '$oldPass', full_name = '$fullName', Date_de_naissance = '$birthDate' WHERE id = $id";
    $con->query($sql);
    header('location: dashboard.php');
    $_SESSION['crud'] = "Profile Updated Successfully!!";
}
