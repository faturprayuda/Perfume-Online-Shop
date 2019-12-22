<?php
session_start();
$_SESSION = []; // untuk lebih yakin apakah session sudah kosong apa belom
session_unset(); // ini juga sama
session_destroy();

header("Location: login.php");
exit;
