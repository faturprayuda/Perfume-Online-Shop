<?php
session_start();
require "../connection.php";

// connect db
global $con;

// check session admin and user
$email = $_SESSION["email"];
$id = $_SESSION["id"];

$pilih = mysqli_query($con, "SELECT * FROM admin WHERE email_admin='$email' LIMIT 1");
$row   = mysqli_num_rows($pilih);
$sel   = mysqli_fetch_assoc($pilih);
$pilih2 = mysqli_query($con, "SELECT * FROM users WHERE id='$id' LIMIT 1");
$rows  = mysqli_num_rows($pilih2);
$sels  = mysqli_fetch_assoc($pilih2);

if ($row === 1) {
    $_SESSION['akses'] = $sel['hak_akses'];
    if ($sel['hak_akses']  == 'admin') {
        $_SESSION['admin'] = TRUE;
    }
    header('Location: index.php');
    exit;
} elseif ($rows === 1) {
    header('Location: ../index.php');
    exit;
} else {
    echo "Tidak Ada Akun Terdaftar";
    die(mysqli_error($con));
}


// if (isset($_SESSION["login"])) {
//     $user_admin = $_SESSION['email'];
//     $pass_admin = $_SESSION['password'];

//     $cek = [$user_admin, $pass_admin];
//     header('Location: index.php');
//     exit;
// } else {
//     $username = $_SESSION['email_user'];
//     $pass_user = $_SESSION['pass_user'];

//     $cek = [$username, $pass_user];
//     header("Location : ../index.php");
//     exit;
// }

// $admin = mysqli_query($con, "SELECT * FROM admin");
// $row = mysqli_num_rows($login);

// var_dump($row);
// die;
