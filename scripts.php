<?php
//INCLUDE DATABASE FILE
include 'database.php';
//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//ROUTING
if (isset($_POST['save'])) {
    saveTask();
}

if (isset($_POST['update'])) {
    updateTask();
}

if (isset($_POST['delete'])) {
    deleteTask();
}

// getTasks Function collects the tasks data from the database tables
function getTasks()
{
   
}

// saveTask Function adds a new task to the database table
function saveTask()
{
    
    $_SESSION['message'] = "Task has been added successfully !";
    header('location: index.php');
}

// updateTask Function updates a task inside the database table
function updateTask()
{
    
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}

// deleteTask function deletes a task from the database table
function deleteTask()
{

    $_SESSION['message'] = "Task has been deleted successfully !";
    header('location: index.php');
}
