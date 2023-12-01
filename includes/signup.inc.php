<?php
//  Filename - includes/login.inc.php

// Makes sure that the user got to this page by clicking the submit button
if (isset($_POST['submit'])) {

    //Get the username, email and password from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = null;

    //Connect to the database
    require_once 'dbConfig.inc.php';
    require_once 'functions.inc.php';

    //Error handlers
    //Check for empty fields
    if (emptyInputSignup($username, $email, $password) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    //Check for invalid username
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    //Check for invalid email
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    //Check if the user already exists in the database
    if (userExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    //Create a new user in the database
    createUser($conn, $username, $email, $password);
}
