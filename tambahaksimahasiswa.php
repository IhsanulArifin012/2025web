<?php
include "koneksi.php";

$nim = $_POST["nim"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id"];

$namaFile = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];

$ekstensiFoto = explode('.', $namaFile);
$ekstensiFoto = strtolower(end($ekstensiFoto));

$namaFileBaru = $nim . '.' . $ekstensiFoto;

move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);


$hashpass = password_hash($password, PASSWORD_DEFAULT);


$query = "INSERT INTO mahasiswa (nim, nama, tanggal_lahir, telp, email, id, password, foto) 
          VALUES ('$nim', '$nama', '$tanggal_lahir', '$telp', '$email', '$id', '$hashpass', '$namaFileBaru')";

mysqli_query($conn, $query);

header("Location: index.php");
