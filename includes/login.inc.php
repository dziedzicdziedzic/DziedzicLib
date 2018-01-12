<?php

session_start();
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $uid = mysqli_real_escape_string($conn, $_POST['name']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM us WHERE user_username='$uid'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if (!password_verify($pwd, $row['user_password'])) {
                header("Location: ../index.php?login=passerror");
                exit();
            } else {
                //Set SESSION variables and log user in
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['user_username'] = $row['user_username'];
                header("Location: ../index.php");
                exit;
                }
            }else{
            header("Location: ../index.php?nosuchlogin");
        }
        }
    }
} else {
        header("Location: ../index.php?login=buttonerror");
        exit();
}