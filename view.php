<?php
session_start();
require 'check_if_added.php';
require "connection.php";
require 'function.php';


$users = query("SELECT * FROM items");

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$item = query("SELECT * FROM items WHERE id = $id")[0];

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
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1><?= $item["name"] ?></h1>
                    <p><?= $item["deskripsi"] ?></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="thumbnail-view">
                            <img src="img/<?= $item["image"]; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="chart">
                            <p>Price: Rp <?= $item["price"]; ?></p>
                            <?php if (!isset($_SESSION['email'])) {  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                if (check_if_added_to_cart(0)) {
                                    echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                } else {
                                ?>
                                    <a href="cart_add.php?id=<?= $item["id"] ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
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