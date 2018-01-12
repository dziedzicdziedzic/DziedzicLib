<?php
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 10.12.2017
 * Time: 20:51
 */

if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileAExt = strtolower(end($fileExt));

    $allowedExtensions = array('epub', 'mobi', 'pdf', 'zip');
    if(in_array($fileAExt, $allowedExtensions)){
        if($fileError===0){
            if($fileSize<100000){
                $fileNewFilename = uniqid('',true).$fileName.".".$fileAExt;
                $fileDest = 'uploads/'.$fileNewFilename;
                move_uploaded_file($fileTmpName, $fileDest);
                header("Location: index.php?zwyciestwo");
            }else{
                echo'za duzy, porazka';
            }
        }else{
            echo'error, porazka';
        }
    }else{
        echo 'porazka';
    }
}