<?php

if (isset($_POST['submit'])) {

        //Get the username, email and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = null;

        //Connect to the database
        require_once 'dbConfig.inc.php';
        require_once 'functions.inc.php';

        //Error handlers
        //Check for empty fields
        if (emptyInputLogin($username, $password) !== false) {
            header("location: ../views/login.php?error=emptyinput");
            exit();
        }

        $sql = "SELECT * FROM users WHERE username = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../views/login.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($results)) {
            $pwdHashed = $row['password'];
            $checkPwd = password_verify($password, $pwdHashed);
            if ($checkPwd === true) {
                session_start();
                $_SESSION['userid'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                header("location: ../views/home.php");
            } else {
                header("location: ../views/login.php?error=nouser");
            }
        } else {
            header("location: ../views/login.php?error=somethingwentwrong");
        }
    exit();
}
