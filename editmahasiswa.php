<?php
session_start();
include "koneksi.php";
ceklogin();

$query = "SELECT * FROM prodi";
$data = ambildata($query);

$nim = $_GET['nim'];
$querymahasiswa = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$datamahasiswa = ambildata($querymahasiswa);
$datamahasiswa = $datamahasiswa[0];

include "template/header.php";
include "template/sidebar.php";
?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Edit Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <form action="editaksimahasiswa.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" name="nim" id="nim" class="form-control" required value="<?= $datamahasiswa['nim']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required value="<?= $datamahasiswa['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="<?= $datamahasiswa['tanggal_lahir']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="telp" class="form-label">No Telepon</label>
                                    <input type="text" name="telp" id="telp" class="form-control" required value="<?= $datamahasiswa['telp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required value="<?= $datamahasiswa['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id" class="form-label">Prodi</label>
                                    <select class="form-select" name="id" id="id" required>
                                        <?php foreach ($data as $d) : ?>
                                            <option value="<?= $d['id']; ?>" <?= $d['id'] == $datamahasiswa['id'] ? 'selected' : ''; ?>>
                                                <?= $d['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="foto">Upload Foto (Kosongkan jika tidak mengubah)</label>
                                    <input type="file" class="form-control" id="foto" name="foto" />
                                </div>
                                <div class="card-footer mt-3">
                                    <a href="index.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'template/footer.php'; ?>