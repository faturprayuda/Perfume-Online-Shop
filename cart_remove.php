<?php
require 'connection.php';
session_start();
$item_id = $_GET['id'];
$user_id = $_SESSION['id'];
$delete_query = "delete from chart where user_id='$user_id' and item_id='$item_id'";
$delete_query2 = "delete from users_items where user_id='$user_id' and item_id='$item_id'";
$delete_query_result = mysqli_query($con, $delete_query) or die(mysqli_error($con));
$delete_query_result2 = mysqli_query($con, $delete_query2) or die(mysqli_error($con));
header('location: cart.php');
