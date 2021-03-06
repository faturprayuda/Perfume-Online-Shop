<?php
session_start();
require 'function.php';

if (isset($_SESSION["login"])) {
    header("Location: cek_login.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["email"];
    $password = $_POST["pass"];

    $result = mysqli_query($con, "SELECT * FROM admin WHERE email_admin = '$username' ");

    //cek username exist
    if (mysqli_num_rows($result) === 1) {
        // cek password if same with username
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["pass_admin"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["email"] = $username;
            $_SESSION["password"] = $password;

            // cek remember me
            // if (isset($_POST["remember"])) {
            //     // buat cookie
            //     setcookie('id', $row['id'], time() + 60);
            //     setcookie('key', hash('sha256', $row['username']), time() + 60);
            // }

            header("Location: cek_login.php");
            exit;
        }
    }

    $error = true;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <!-- //*My Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- //*My CSS -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <!-- //*form login admin -->
    <form action="" method="POST">
        <div class="container">
            <h3 class="login">Admin Login</h3>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="form-akun">
                <small class="create-account">
                    <a href="regist.php">Don't have account? create here</a></small>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </div>
    </form>
    <!-- //*end form login admin -->


</body>

</html>