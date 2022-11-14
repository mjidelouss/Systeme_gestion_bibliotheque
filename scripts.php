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

if (isset($_GET['deleteid'])) {
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
    livre.Date_de_publication FROM  livre  INNER JOIN Category  ON category.id = livre.category_id";
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
    if (!empty($titre) || !empty($auteur) || !empty($category) || !empty($quantite) || !empty($isbn) || !empty($datePub))
    {
        $sql = "INSERT INTO livre (Titre, Auteur, Quantite, category_id, ISBN, Date_de_publication) values ('$titre', '$auteur', '$quantite', '$category', '$isbn', '$datePub')";
    } else {
        echo "ALL Fields Are Required";
        die();
    }
    $con->query($sql);
    header('location: dashboard.php');
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
    if ($category == "Action"){$categoryId = 1;}
    if ($category == "Adventure"){$categoryId = 2;}
    if ($category == "Science Fiction"){$categoryId = 3;}
    if ($category == "Biography"){$categoryId = 4;}
    if ($category == "Sport"){$categoryId = 5;}
    if ($category == "Programing"){$categoryId = 6;}
    if ($category == "Mathematique"){$categoryId = 7;}
    if ($category == "Philosophy"){$categoryId = 8;}
    $sql = "UPDATE livre SET id = $id, Titre = '$titre', Auteur = '$auteur', Quantite = '$quantite', category_id = '$categoryId', ISBN = '$isbn', Date_de_publication = '$datePub' WHERE id = $id";
    $con->query($sql);
    header('location: dashboard.php');
}

// deleteBook function deletes a book from the database table
function deleteBook()
{
    global $con;
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM livre WHERE id = $id";
    $con->query($sql);
    header('location: dashboard.php');
}

//
function regUser() {
    global $con;
    // Declaring user Variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pasword'];
    if (!empty($username) || !empty($email) || !empty($password))
    {
        $sql = "INSERT INTO adminusers (username, email, password) values ('$username', '$email', '$password')";
    } else {
        echo "ALL Fields Are Required";
        die();
    }
    $con->query($sql);
    header('location: sign_in.php');
}

// 
function check_login() {
    global $con;
    $logName = $_POST['log_username'];
    $logPass = $_POST['log_pass'];

    if (!empty($logName) || !empty($logPass))
    {
        $sql = "SELECT id FROM adminusers WHERE username = '$logName' and password = '$logPass'";
    } else {
        echo "ALL Fields Are Required";
        die();
    }
    $res = $con->query($sql);
    $count = mysqli_num_rows($res);
    if($count == 1) {
        header("location: dashboard.php");
     }else {
        echo "Wrong Credentials !!";
     }
}

function updateProfile() {
    global $con;
    $id = $_POST['profileId'];
    $userName = $_POST['userName'];
    $newPass = $_POST['newPass'];
    $fullName = $_POST['fullName'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $sql = "UPDATE adminusers SET id = $id, username = '$userName', email = '$email', password = '$newPass', full_name = '$fullName', Date_de_naissance = '$birthDate' WHERE id = $id";
    $con->query($sql);
    header('location: dashboard.php');
}