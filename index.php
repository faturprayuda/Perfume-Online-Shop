<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Fragrance one thousand flowers Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- myfont -->
    <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <div id="bannerImage">
            <div class="container">
                <center>
                    <div id="bannerContent">
                        <h1>We sell .</h1>
                        <p>Flat 40% OFF on all premium brands.</p>
                        <a href="products.php" class="btn btn-danger">Shop Now</a>
                    </div>
                </center>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div id="sloganImage">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="slogan">
                        <h3>Choose among the best Perfume in the world.</h3>
                        <a href="products.php" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <br><br> <br><br><br><br>
            <footer class="footer">
                <div class="container">
                    <center>
                        <p>Copyright &copy <a href="#">Perfume Elegant</a> Store. All Rights Reserved.</p>
                        <p>This website is developed by Egie, Aldi, & Fatur</p>
                    </center>
                </div>
            </footer>
        </div>
</body>

</html>