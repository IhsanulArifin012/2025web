<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "koneksi.php";
$servername = "localhost";
$database = "poliban";
$username = "root";
$password = "";

$query = "SELECT m.*, p.nama namaProdi FROM mahasiswa m JOIN prodi p ON m.id = p.id";
$data  = ambildata($query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU POLIBAN</title>
    <style>
        body {
            background-color: #1e1e2f;
            /* Abu gelap */
            color: #e0e0e0;
            /* Putih lembut */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            font-size: 2em;
            margin-bottom: 20px;
        }

        a {
            color: #4fc3f7;
            /* Biru soft */
            text-decoration: none;
        }

        a:hover {
            color: #81d4fa;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #2b2b3c;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        th,
        td {
            border: 1px solid #3c3c55;
            padding: 12px;
            text-align: center;
        }

        thead {
            background-color: #343454;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #2c2c40;
        }

        tr:hover {
            background-color: #3d3d5c;
        }

        .tambah-link {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 16px;
            background-color: #4fc3f7;
            color: #000;
            font-weight: bold;
            border-radius: 4px;
        }

        .tambah-link:hover {
            background-color: #29b6f6;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>DATA MAHASISWA</h1>
    <br>
    <a href="tambahmahasiswa.php">Tambah</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <td>No</td>
                <td>NIM</td>
                <td>Nama</td>
                <td>Tanggal Lahir</td>
                <td>No Telepon</td>
                <td>Email</td>
                <td>Prodi</td>
                <td>Aksi</td>

            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;
            foreach ($data as $d) : ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $d["nim"] ?> </td>
                    <td><?php echo $d["nama"] ?> </td>
                    <td><?php echo $d["tanggal_lahir"] ?> </td>
                    <td><?php echo $d["telp"] ?> </td>
                    <td><?php echo $d["email"] ?> </td>
                    <td><?php echo $d["namaProdi"] ?> </td>
                    <td><a href="deletemahasiswa.php?nim=<?= $d['nim']; ?>"
                            onclick="return confirm('YAKIN JA LAH MEHAPUS NII ?! (HALA MADRID)')">Delete</a> |
                        <a href="editmahasiswa.php?nim=<?= $d['nim']; ?>">Edit</a>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <a href="logout.php">Keluar</a>
</body>

</html>

-----------------------------------------------------
salinan 2
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "koneksi.php";
$servername = "localhost";
$database = "poliban";
$username = "root";
$password = "";

$query = "SELECT * FROM prodi";
$data  = ambildata($query);
include "template/header.php";
include "template/sidebar.php";

?>
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">

            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <a href="tambahmahasiswa.php" class="btn btn-primary">Tambah</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Prodi</td>
                                            <td>Kaprodi</td>
                                            <td>Jurusan</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($data as $d) : ?>

                                            <tr>
                                                <td><?php echo $d["id"] ?> </td>
                                                <td><?php echo $d["nama"] ?> </td>
                                                <td><?php echo $d["kaprodi"] ?> </td>
                                                <td><?php echo $d["jurusan"] ?> </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->

                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
</main>
<!--end::App Main-->




</table>
<a href="logout.php">Keluar</a>


<?php
include "template/footer.php";
?>