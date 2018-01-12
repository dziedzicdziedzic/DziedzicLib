<?php
include_once "header.php";
?>

<!--header.php ends here-->


<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <script type="text/javascript">
        function setTheme(theme) {

            localStorage.setItem('style', theme)
            document.querySelector('#stylesheet-link').href = ${theme}.css
        }

        setTheme(localStorage.getItem('style') || 'styles')


        function diffImage(img)
        {
            if(img.src.match(images/${img.id}.jpg)) img.src = images/${img.id}2.jpg;
        else img.src = images/${img.id}.jpg;
        }

    </script>
    <header id="banner">
        <div class="banner-title">
            <?php
            if (isset($_SESSION['id'])) {
                //header("Location: ../dashboard.php");
                echo '
                    <h1 class="banner-text">Jesteś zalogowany</h1>
                    <div class="banner-underline"></div>
                     ';
            } else {
                echo '
                    <h1 class="banner-text">Welcome</h1>
                    <div class="banner-underline"></div>
                    <div class="banner-btn">
                    <button type="button"><a href="login.php">Log in</a></button>
                    <button type="button"><a href="signup.php">Register</a></button>
                    </div>';
            } ?>
        </div>
    </header>
    <section id="about">
        <h1 class="banner-text">Used technologies</h1>
        <div class="fa-cont"><i class="fa fa-gears"></i></div>
        <div class="about-container">

            <article class="about-item about-item-smoky-black">
                <div class="about-front">
                    <i class="fa fa-server"></i>
                <h1>PHP</h1></div>
            </article>

            <article class="about-item about-item-deep-koamaru">
                <div class="about-front">
                    <i class="fa fa-html5"></i>

                    <h1>HTML5</h1>
                </div>
            </article>

            <article class="about-item about-item-gold-fusion">
                <div class="about-front">
                    <i class="fa fa-css3"></i>
                <h1>CSS</h1>
                    </div>
            </article>

            <article class="about-item about-item-gold-fusion">
                <div class="about-front">
                    <i class="fa fa-coffee"></i>
                <h1>JavaScript</h1></div>
            </article>

            <article class="about-item about-item-smoky-black">
                <div class="about-front">
                    <i class="fa fa-table"></i>
               <h1>SQL</h1></div>
            </article>

            <article class="about-item about-item-deep-koamaru">
                <div class="about-front">
                    <i class="fa fa-font-awesome"></i>
                <h1>Font Awesome</h1></div>
            </article>

    </div>
</section>

<!-- Add your site or application content here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>


<!-- footer.php starts here-->
<?php
include_once "footer.php";
?>