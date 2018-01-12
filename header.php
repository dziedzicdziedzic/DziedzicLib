<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 28.10.2017
 * Time: 19:55
 */?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FreeLib</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" id="stylesheet-id" href="main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <script src="https://use.fontawesome.com/a41b8f814f.js"></script>
    <script src="styleswitch.js"></script>
</head>
<body>
<nav>
    <ul>
    <li><a href="#" class="logo">FreeLib<i class="fa fa-arrow-down"></i> </a></li>

        <a  href="#" onclick="event.preventDefault(); setTheme('main')"><i class="fa fa-star" aria-hidden="true"></i></a>
        <a  href="#" onclick="event.preventDefault(); setTheme('second')"><i class="fa fa-star-o" aria-hidden="true"></i></a>
<?php
if (isset($_SESSION['id'])) {
    ?>
    <li><a href="index.php">Home</a></li>
    <li><a href="ajaxchat.php">Chat</a></li>
    <li><a href="upload.php">Add</a></li>
    <li><a href="download.php">Download</a></li>
    <li><a href="includes/logout.inc.php">Log out</a></li>
    <?php
}?>
    </ul>
    </nav>