<?php
include_once 'header.php';
?>

<script src="js/swapstyle.js"</script>


<header id="banner">
        <div class="banner-title">
<?php

    if ($_SESSION['id'] == 1) {
        echo '
                    <h1 class="banner-text">Jestem adminem</h1>
                    
              ';
    } else {
        echo '<h1 class="banner-text">Witaj zwykly uzytkowniku</h1>';
    }


?>

        </div>
</header>

<?php
include_once 'footer.php';
?>