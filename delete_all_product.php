<?php
require 'connection.php';
session_start();
$item_id = $_GET['id'];
$user_id = $_SESSION['id'];
$delete_query = "delete from chart where user_id='$user_id'";
$delete_query_result = mysqli_query($con, $delete_query) or die(mysqli_error($con));
header('location: products.php');
