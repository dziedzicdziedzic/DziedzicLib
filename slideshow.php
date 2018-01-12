<?php
/**
 * Created by PhpStorm.
 * User: Dziedzic
 * Date: 29.12.2017
 * Time: 15:35
 */
include_once 'includes/dbh.inc.php';

if(isset($_GET['min'])) {
    if (isset($_GET['max'])) {

        $min_delimeter = intval($_GET['min']);
        $max_delimeter = intval($_GET['max']);

        display($conn, $min_delimeter, $max_delimeter);
    }
}


function display($conn, $min_delimeter, $max_delimeter)
{
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <?php
            $id = $row['book_id'];
            if ($id >= $min_delimeter && $id <= $max_delimeter) {
                echo "<li><h1>Title: " . $row["book_title"] . "<br>" . " Author: " . $row["book_author"] . "<br>" . "<br></h1></li>";


                if ($row['filepath_pdf'] != null) {
                    ?>
                    <button type="button"><a href="download_inc.php?id=<?php echo urlencode($id); ?>&ext=pdf">Download
                            pdf</a></button>
                    <?php
                }
                if ($row['filepath_epub'] != null) {
                    ?>
                    <button type="button"><a href="download_inc.php?id=<?php echo urlencode($id); ?>&ext=epub">Download
                            epub</a></button>
                    <?php
                }
                if ($row['filepath_mobi'] != null) {
                    ?>
                    <button type="button"><a href="download_inc.php?id=<?php echo urlencode($id); ?>&ext=mobi">Download
                            mobi</a></button>
                    <?php
                }
                if ($row['filepath_zip'] != null) {
                    ?>
                    <button type="button"><a href="download_inc.php?id=<?php echo urlencode($id); ?>&ext=zip">Download
                            zip</a></button>
                    <?php
                }
            }
        }
    }
}
