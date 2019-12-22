<?php
session_start();
require "../connection.php";

$username = $_SESSION['email'];
$password = $_SESSION['pass'];

$login = mysqli_query($con, "SELECT * FROM tb_perfume");
$row = mysqli_num_rows($login);

var_dump($row);die;
?>