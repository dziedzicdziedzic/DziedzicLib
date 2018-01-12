<?php
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 28.10.2017
 * Time: 20:11

 */
include_once "header.php";
?>
    <header id="banner">
        <div class="banner-title">
        <h1 class="banner-text">LOGOWANIE</h1>

        <form action="includes/login.inc.php" method="POST">

            <input  type="text" name="name" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <div class="single-btn">
            <button type="submit" name="submit">submit</button>
            </div>
        </form>
        </div>
    </header>
<?php
include_once "footer.php";


