<?php
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 10.12.2017
 * Time: 22:18
 */

//include_once 'header.php';
include_once 'includes/dbh.inc.php';


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(isset($_POST['submit'])) {
    $file1 = $_FILES['file1'];
    $file2 = $_FILES['file2'];
    $file3 = $_FILES['file3'];
    $file4 = $_FILES['file4'];





    $fileName1 = $_FILES['file1']['name'];
    $fileTmpName1 = $_FILES['file1']['tmp_name'];
    $fileName2 = $_FILES['file2']['name'];
    $fileTmpName2 = $_FILES['file2']['tmp_name'];
    $fileName3 = $_FILES['file3']['name'];
    $fileTmpName3 = $_FILES['file3']['tmp_name'];
    $fileName4 = $_FILES['file4']['name'];
    $fileTmpName4 = $_FILES['file4']['tmp_name'];
    $fileSize1 = $_FILES['file1']['size'];
    $fileSize2 = $_FILES['file2']['size'];
    $fileSize3 = $_FILES['file3']['size'];
    $fileSize4 = $_FILES['file4']['size'];


    $fileArray1 = array($fileName1, $fileTmpName1, $fileSize1);
    $fileArray2 = array($fileName2, $fileTmpName2, $fileSize2);
    $fileArray3 = array($fileName3, $fileTmpName3, $fileSize3);
    $fileArray4 = array($fileName4, $fileTmpName4, $fileSize4);

    $foreachArray= array($fileArray1, $fileArray2, $fileArray3, $fileArray4);

    $book_title = mysqli_real_escape_string($conn, $_POST['book_title']);
    $book_author = mysqli_real_escape_string($conn, $_POST['book_author']);
    $book_publisher = mysqli_real_escape_string($conn, $_POST['book_publisher']);
    $book_year = mysqli_real_escape_string($conn, $_POST['book_year']);
    $book_genre = mysqli_real_escape_string($conn, $_POST['book_genre']);

    foreach ($foreachArray as $item) {

        $fileExt = explode('.', $item[0]);
        $fileAExt = strtolower(end($fileExt));
        $allowedExtensions = array('epub', 'mobi', 'pdf', 'zip');

        if (empty($book_title) || empty($book_author) || empty($book_publisher) || empty($book_year) || empty($book_genre)) {
            header("Location: ../upload.php?empty");
            exit();
        } else {
            if (in_array($fileAExt, $allowedExtensions)) {
                    if ($item[3] < 100000) {
                        $fileNewFilename = uniqid('', true) . $item[0];
                        $fileDest = 'uploads/' . $fileNewFilename;
                        $noFilepath = null;
                        $searchsql = "SELECT * FROM books WHERE book_title='$book_title'";
                        $result = mysqli_query($conn, $searchsql);
                        if (mysqli_num_rows($result) > 0) {
                            $found = mysqli_fetch_array($result);
                            switch ($fileAExt) {
                                case 'pdf':
                                    $sql = "UPDATE books SET filepath_pdf='$fileDest' WHERE book_title='$book_title'";
                                    break;
                                case 'epub':
                                    $sql = "UPDATE books SET filepath_epub='$fileDest' WHERE book_title='$book_title'";
                                    break;
                                case 'mobi':
                                    $sql = "UPDATE books SET filepath_mobi='$fileDest' WHERE book_title='$book_title'";
                                    break;
                                case 'zip':
                                    $sql = "UPDATE books SET filepath_zip='$fileDest' WHERE book_title='$book_title'";
                                    break;
                            }
                        } else {
                            switch ($fileAExt) {
                                case 'pdf':
                                    $sql = "INSERT INTO books (book_title, book_author, book_publisher, book_year, book_genre, filepath_pdf, filepath_epub, filepath_mobi, filepath_zip) 
                            VALUES ('$book_title', '$book_author', '$book_publisher', '$book_year', '$book_genre', '$fileDest', '$noFilepath', '$noFilepath', '$noFilepath' );";
                                    break;
                                case 'epub':
                                    $sql = "INSERT INTO books (book_title, book_author, book_publisher, book_year, book_genre, filepath_pdf, filepath_epub, filepath_mobi, filepath_zip) 
                            VALUES ('$book_title', '$book_author', '$book_publisher', '$book_year', '$book_genre', '$noFilepath', '$fileDest', '$noFilepath', '$noFilepath' );";
                                    break;
                                case 'mobi':
                                    $sql = "INSERT INTO books (book_title, book_author, book_publisher, book_year, book_genre, filepath_pdf, filepath_epub, filepath_mobi, filepath_zip) 
                            VALUES ('$book_title', '$book_author', '$book_publisher', '$book_year', '$book_genre', '$noFilepath', '$noFilepath', '$fileDest', '$noFilepath' );";
                                    break;
                                case 'zip':
                                    $sql = "INSERT INTO books (book_title, book_author, book_publisher, book_year, book_genre, filepath_pdf, filepath_epub, filepath_mobi, filepath_zip) 
                            VALUES ('$book_title', '$book_author', '$book_publisher', '$book_year', '$book_genre', '$noFilepath', '$noFilepath', '$noFilepath' , '$fileDest' );";
                                    break;
                            }
                        }
                        var_dump($sql);
                        $query = mysqli_query($conn, $sql);
                        //jezeli ktokokolwiek to kiedykolwiek przeczyta to chciałbym tylko powiedzieć, że kocham PHP i SQL, postawie po pomniku kazdemu z tworcow
                        //tych jezykow jak juz bede piekny i bogaty.
                        move_uploaded_file($item[1], $fileDest);
                        header("Location: index.php");
                    } else {
                        echo 'fail, too large';
                    }
                } else {
                    echo 'fail, error';
                }
        }
    }
}