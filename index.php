<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "koneksi.php";


$query = "SELECT m.*, p.nama namaProdi FROM mahasiswa m JOIN prodi p ON m.id = p.id";
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
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
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
                                            <td>NIM</td>
                                            <td>Nama</td>
                                            <td>Tanggal Lahir</td>
                                            <td>No Telepon</td>
                                            <td>Prodi</td>
                                            <td>Email</td>
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
                                                <td><?php echo $d["namaProdi"] ?> </td>
                                                <td><?php echo $d["email"] ?> </td>
                                                <td><a href="deletemahasiswa.php?nim=<?= $d['nim']; ?>"
                                                        onclick="return confirm('YAKIN JA LAH MEHAPUS NII ?! (HALA MADRID)')" class="btn btn-danger">Delete</a> |
                                                    <a href="editmahasiswa.php?nim=<?= $d['nim']; ?>" class="btn btn-warning">Edit</a>


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