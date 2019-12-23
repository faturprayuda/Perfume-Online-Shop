<?php
session_start();
require 'check_if_added.php';
require "connection.php";
require 'function.php';


$users = query("SELECT * FROM items");
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Projectworlds Store</title>
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
</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome to our Projectworlds Store!</h1>
                <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($users as $user) : ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="../img/<?= $user["image"]; ?>">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3><?= $user["name"]; ?></h3>
                                    <p>Price: Rp <?= $user["price"]; ?></p>
                                    <?php if (!isset($_SESSION['email'])) {  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                    } else {
                                        if (check_if_added_to_cart(1)) {
                                            echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                        } else {
                                        ?>
                                            <a href="cart_add.php?id=1" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </center>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <br><br><br><br><br><br><br><br>
            <footer class="footer">
                <div class="container">
                    <center>
                        <p>Copyright &copy <a href="https://projectworlds.in">Projectworlds</a> Store. All Rights Reserved.</p>
                        <p>This website is developed by Yugesh Verma</p>
                    </center>
                </div>
            </footer>
        </div>
</body>

</html>