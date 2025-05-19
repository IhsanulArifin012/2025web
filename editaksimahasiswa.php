<?php
include "koneksi.php";

$nim = $_POST["nim"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id"];


$querylama = "SELECT foto FROM mahasiswa WHERE nim = '$nim'";
$datalama = mysqli_fetch_assoc(mysqli_query($conn, $querylama));
$fotoLama = $datalama['foto'];


$namaFile = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$namaFileBaru = $fotoLama;

if (!empty($namaFile)) {

    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    $namaFileBaru = $nim . '.' . $ekstensiFoto;


    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
}


if (!empty($password)) {
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE mahasiswa SET nama='$nama', tanggal_lahir='$tanggal_lahir', telp='$telp', email='$email', id='$id', password='$hashpass', foto='$namaFileBaru' WHERE nim='$nim'";
} else {
    $query = "UPDATE mahasiswa SET nama='$nama', tanggal_lahir='$tanggal_lahir', telp='$telp', email='$email', id='$id', foto='$namaFileBaru' WHERE nim='$nim'";
}

mysqli_query($conn, $query);


header("Location: index.php");
exit;
