<?php
require "../connection.php";

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

function registrasi($data)
{
    // connect to db
    global $con;

    $name = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $pass = mysqli_real_escape_string($con, $data["password"]);
    $pass2 = mysqli_real_escape_string($con, $data["password2"]);
    $tlp = strtolower(stripslashes($data["telp"]));
    $address = strtolower(stripslashes($data["alamat"]));

    //check email if available
    $result = mysqli_query($con, "SELECT email_admin FROM admin WHERE email_admin = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar');
            </script>";
        return false;
    }

    // Check password if same
    if ($pass !== $pass2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // insert userbaru ke db
    mysqli_query($con, "INSERT INTO admin VALUES('', '$email', '$pass', '$name', '$tlp', '$address')");

    return mysqli_affected_rows($con);
}
