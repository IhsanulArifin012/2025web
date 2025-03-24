<?php
include "koneksi.php";


$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id"];

$query = "INSERT INTO mahasiswa (nim, nama, tanggal_lahir, telp, email, id) VALUES ('$nim', 
 '$nama', '$tanggal_lahir', '$telp', '$email', '$id')";

mysqli_query($conn, $query);

header("Location: index.php");
?>
