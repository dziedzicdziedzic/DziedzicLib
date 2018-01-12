<?php
include_once 'header.php';
?>
    <header id="banner">
        <div class="banner-title">
    <?php
    if($_SESSION['id'] == 1){
        echo'<form action="upload.sql.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file1" id="file1" class="inputfile" />
            <input type="file" name="file2" id="file2" class="inputfile" />
            <input type="file" name="file3" id="file3" class="inputfile" />
            <input type="file" name="file4" id="file4" class="inputfile" />
             <!--<label for="file">Choose a file</label>-->
            <input type="text" name="book_title" placeholder="title">
            <input type="text" name="book_author" placeholder="author">
            <input type="text" name="book_publisher" placeholder="publisher">
            <input type="text" name="book_year" placeholder="year">
            <input type="text" name="book_genre" placeholder="genre">
            <div class="single-btn">
            <button type="submit" name="submit">Add </button>
            </div>
           
        </form>
    ';
    }else{
        echo'<h1 class="banner-text">Jesteś zalogowany</h1>
                    <div class="banner-underline"></div>';
    }?>
        </div>
    </header>
