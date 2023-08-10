<!-- Header Layouts -->
<?php

# Memanggil Koneksi ke Database
require '../config.php';

// Session
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:../auth/login.php");
    exit();
}

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == 'user') {
    header('Location: ../home.php');
    exit();
}

# Memanggil Logic program
require 'functions.php';

# Menampilkan semua data dari tabel data_sppt
$query = index("SELECT data_sppt.*, data_warga.id AS user_id FROM data_sppt INNER JOIN data_warga ON data_sppt.user_id = data_warga.id ");

# Melakukan Pencarian
if (isset($_POST["search"])) {
    $query = search($_POST["request"]);
}
# Melakukan Refresh
if (isset($_POST["refresh"])) {
    if (isset($_POST["query"])) {
        $query = index($_POST["query"]);
    }
}

// Header
$title = 'Data SPPT';
$active = 'data_sppt';
include '../layouts/header.php';
?>

<!-- Content -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include '../layouts/sidebar.php'; ?>

        <div class="layout-page">
            <?php include '../layouts/navbar.php'; ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container flex-grow-1 container-p-y">
                    <div class="row d-flex justify-content-between">
                        <div class="col-sm-9">
                            <h4 class="fw-bold">Data SPPT</h4>
                            <p class="text-secondary">Data Surat Pemberitahuan Pajak Terhutang.</p>
                        </div>
                        <div class="col-sm-3 text-end">
                            <a href="../data_sppt/laporan.php" class="btn btn-primary mt-3">Download Data SPPT</a>
                        </div>
                    </div>
                    <!-- Responsive Table -->
                    <div class="card">
                        <!-- Header Table & Search -->
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-header">Informasi Data</h5>
                            </div>
                            <div class="col-md-8 justify-content-end d-flex">
                                <form class="mt-3" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" name="request" id="request" class="form-control" placeholder="Cari Data SPPT">
                                                <button type="submit" name="search" class="input-group-text bg-secondary text-white"><i class="bx bx-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" name="refresh" class="btn btn-secondary text-white"><i class="bx bx-refresh"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive text-nowrap">
                            <table class="table mb-5">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No.</th>
                                        <th>Kode_ID</th>
                                        <th>NOP</th>
                                        <th>Akun</th>
                                        <th>Nama</th>
                                        <th>Alamat OP</th>
                                        <th>Alamat WP</th>
                                        <th>Luas Bumi</th>
                                        <th>Kelas Bumi</th>
                                        <th>NJOP Bumi</th>
                                        <th>Luas Bangunan</th>
                                        <th>Kelas Bangunan</th>
                                        <th>NJOP Bangunan</th>
                                        <th>Tanggal Pembuatan</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($query as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["kode_id"]; ?></td>
                                            <td><?= $row["nop"]; ?></td>
                                            <td><?= $row["akun"]; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["alamat_op"]; ?></td>
                                            <td><?= $row["alamat_wp"]; ?></td>
                                            <td><?= $row["luas_bumi"]; ?></td>
                                            <td><?= $row["kelas_bumi"]; ?></td>
                                            <td><?= $row["njop_bumi"]; ?></td>
                                            <td><?= $row["luas_bangunan"]; ?></td>
                                            <td><?= $row["kelas_bangunan"]; ?></td>
                                            <td><?= $row["njop_bangunan"]; ?></td>
                                            <td><?= $row["tanggal"]; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="edit.php?id=<?= $row["id"]; ?>"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                                        <a class="dropdown-item" href="delete.php?id=<?= $row["id"]; ?>"><i class="bx bx-trash me-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="card-footer text-center mt-5 pt-5">
                                Copyright @SyifaNoerrohmah 2023
                            </div>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Responsive Table -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Content wrapper -->

        </div>

    </div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php
include '../layouts/footer.php';
?>