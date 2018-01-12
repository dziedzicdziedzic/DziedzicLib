<?php
include_once "header.php";
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 28.10.2017
 * Time: 23:08
 */
?>


    <header id="banner">
        <div class="banner-title">
            <h1 class="banner-text">REJESTRACJA</h1>
    <form  action="includes/signup.inc.php" method="POST">
        <div class="filter"></div>
        <input type="text" name="name" placeholder="username">
        <input class="" type="email" name="email" placeholder="example@gmail.com">
        <input type="password" name="password1" placeholder="password">
        <input type="password" name="password2" placeholder="password">
        <div class="single-btn">
            <button type="submit" name="submit">submit</button>
        </div>
    </form>
        </div>
    </header>

<?php
include_once "footer.php";
?>
