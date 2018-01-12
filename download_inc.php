<?php
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 13.12.2017
 * Time: 11:47
 */
include_once 'includes/dbh.inc.php';
if(isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    if (isset($_GET['ext'])) {
        $ext = $_GET['ext'];
        var_dump($ext);
        $sql = "SELECT * FROM books WHERE book_id='$id'";
        $query = mysqli_query($conn, $sql);
        $downloadPath = 'filepath_' . $ext;
        $ros = mysqli_fetch_array($query);
        $path = $ros[$downloadPath];

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=\"" . basename($path) . "\";");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
        readfile($path);
    }else{
        echo'nie ma ext';
    }
}