<?php
include "koneksi.php";


$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id"];

$query = "UPDATE mahasiswa SET nama = '$nama', tanggal_lahir = '$tanggal_lahir', telp = '$telp', email = '$email', id = '$id' WHERE nim = '$nim'";

mysqli_query($conn, $query);

header("Location: index.php");
?>
