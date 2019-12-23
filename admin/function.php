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
    mysqli_query($con, "INSERT INTO admin VALUES('', '$email', '$pass', '$name', '$tlp', '$address', 'admin')");

    return mysqli_affected_rows($con);
}

// hapus user
function hapus($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM users WHERE id = $id");
    return mysqli_affected_rows($con);
}

// ubah data user
function ubah($data)
{
    global $con;

    //ambil data
    $id = $data["id"];
    $name = htmlspecialchars($data["nama"]); //untuk menghindari penggunaan tag html pada form
    $email = htmlspecialchars($data["email"]);
    $contact = htmlspecialchars($data["telp"]);
    $city = htmlspecialchars($data["city"]);
    $address = htmlspecialchars($data["alamat"]);

    // query insert data
    $query = "UPDATE users SET 
                name     = '$name', 
                email    = '$email', 
                contact   = '$contact', 
                city = '$city',
                address = '$address'
            WHERE id = $id
                ";

    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

// hapus produk
function hapus_produk($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM items WHERE id = $id");
    return mysqli_affected_rows($con);
}

// ubah produk
function ubah_produk($data)
{
    global $con;

    //ambil data
    $id = $data["id"];
    $name = htmlspecialchars($data["nama"]); //untuk menghindari penggunaan tag html pada form
    $price = htmlspecialchars($data["price"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek user mengubah gambar atau tidak
    if ($_FILES['image']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE items SET 
                name     = '$name', 
                price    = '$price',
                image    = '$gambar'
            WHERE id = $id
                ";

    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

// Tambah produk
function tambah_produk($data)
{
    global $con;

    //ambil data
    $nama = htmlspecialchars($data["nama"]); //untuk menghindari penggunaan tag htl pada form
    $price = htmlspecialchars($data["price"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO items VALUES ('','$nama','$price','$gambar')";

    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}


function upload()
{
    $namaFile = $_FILES['image']['name'];
    $sizeFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpname = $_FILES['image']['tmp_name'];

    // cek gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
        return false;
    }

    //cek jenis file yg diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('file yg anda upload bukan gambar');
                </script>";
        return false;
    }

    // cek ukuran file gambar
    if ($sizeFile > 2000000) {
        echo "<script>
                alert('ukuran tidak boleh lebih 1MB');
                </script>";
        return false;
    }

    // jika lolos pengecekkan akan di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpname, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}
