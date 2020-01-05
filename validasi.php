<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];


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
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <p>For complete the transacton, please input the recipt image</p>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <input type="file" name="validate">
                                <small>(maks 2MB)</small>
                                <br><br>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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