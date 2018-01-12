<?php

session_start();

if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['name']);
    $pwd1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['password2']);

    //Error handlers
    //Check for empty fields
    if (empty($email) || empty($uid) || empty($pwd1) || empty($pwd2)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?signup=email");
            exit();
        } else {
            $sql = "SELECT * FROM us WHERE user_username='$uid'";
            $result = mysqli_query($conn, $sql);

            //Check if prepared statement fails
            if (mysqli_num_rows($result) > 0) {
                header("Location: ../index.php?signup=error");
                exit();
            } else {
                if($pwd1!=$pwd2){
                    header("Location: ../index.php?signup=diffpass");
                    exit();
                }else {
                    $hashedpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO us (user_email, user_username, user_password) VALUES ('$email', '$uid', '$hashedpwd');";
                    $q= mysqli_query($conn, $sql);
                    header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?notsubmitted");
    exit();
}
