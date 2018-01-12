<?php
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 29.10.2017
 * Time: 04:12
 */
session_start();
include_once "dbh.inc.php";

if (isset($_POST['login'])){
    $query = mysql_query("SELECT * FROM users 
          WHERE user_username = '".mysql_real_escape_string($_POST['name'])."' 
          AND user_password = '".mysql_real_escape_string($_POST['password'])."'");

    /* wrong login information? redirect to error message */
    if (mysql_num_rows($query) == 0){
        header("Location: error.php");
        exit;
    }

    /* set session with unique index */
    $_SESSION['id'] = mysql_result($query, 0, 'id');
    //mysql_query("UPDATE users SET last_login = NOW(), _last_ip = '".$_SERVER['REMOTE_ADDR']."' WHERE id = '{$_SESSION['id']}'");
    header("Location: welcome.php");
    exit;
}

/* if logout, destroy session */
if (isset($_GET['logout'])){
    mysql_query("UPDATE users SET online = '0' WHERE id = '{$_SESSION['id']}'");
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}