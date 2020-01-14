<?php
require "connection.php";

function query($query)
{
    // connect to db
    global $con;

    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
