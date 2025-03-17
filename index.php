<?php
include "koneksi.php";
$servername = "localhost";
$database = "poliban";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database); 

$query = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($conn, $query);

$data= [];
while ($baris = mysqli_fetch_assoc($hasil)) {
    $data[] = $baris;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU POLIBAN</title>
</head>
<body>
    <h1>DATA MAHASISWA</h1>
    <br>
    <table border="1" cellspacing="0" cellpadding= "5">
        <thead>
            <tr>
                <td>No</td>
                <td>NIM</td>
                <td>Nama</td>
                <td>Tanggal Lahir</td>
                <td>No Telepon</td>
                <td>Email</td>
                
            </tr>
        </thead>
        <tbody>

         <?php 
         $i=1;
         foreach($data as $d) : ?>
           
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $d["nim"] ?> </td>
                <td><?php echo $d["nama"] ?> </td>
                <td><?php echo $d["tanggal_lahir"] ?> </td>
                <td><?php echo $d["telp"] ?> </td>
                <td><?php echo $d["email"] ?> </td>
                
                
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>
</html>
