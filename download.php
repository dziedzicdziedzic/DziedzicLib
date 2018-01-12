<?php

include_once 'header.php';
include_once 'includes/dbh.inc.php';
$min_delimeter=1;
$max_delimeter=4;
?>
<header id="banner">
    <div class="banner-title">
    <div class="arrow-left">
    <i id="left-arrow" class="fa fa-chevron-circle-left"></i></div>
    <div class="arrow-right">
    <i id="right-arrow" class="fa fa-chevron-circle-right"></i>
    </div>
    <div class="book-display">
        <script src="js/slideshow.js"></script>
    <ul id="list">
<?php

display($conn, $min_delimeter, $max_delimeter);


?>
    </ul>
    </div>
        </div>
        </div>
    </header>
<?php
function display($conn, $min_delimeter, $max_delimeter){
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