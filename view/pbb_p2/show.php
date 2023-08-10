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
$query = index("SELECT * FROM data_sppt ORDER BY id ASC");

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
$title = 'Form Perhitungan PBB-P2';
$active = 'show_perhitungan';
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
                            <h4 class="fw-bold">Semua Data PBB-P2</h4>
                            <p class="text-secondary">Data Informasi Pajak Bumi dan Bangunan di Pedesaan & Perkotaan.</p>
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
                                <div class="me-5 mt-3">
                                    <a href="showLaporan.php" class="btn btn-primary">Cetak Laporan</a>
                                </div>
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
                                        <th>Tanggal Pembuatan</th>
                                        <th>Akun</th>
                                        <th>Alamat Objek Pajak</th>
                                        <th>Alamat Wajib Pajak</th>
                                        <th>Luas Bumi</th>
                                        <th>Luas Bangunan</th>
                                        <th>NJOP DPP</th>
                                        <th>NJOP TKP</th>
                                        <th>NJOP PBB</th>
                                        <th>PBB Terutang</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($query as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["kode_id"]; ?></td>
                                            <td><?= $row["nop"]; ?></td>
                                            <td><?= $row["tanggal"]; ?></td>
                                            <td><?= $row["akun"]; ?></td>
                                            <td><?= $row["alamat_op"]; ?></td>
                                            <td><?= $row["alamat_wp"]; ?></td>
                                            <td><?= $row["luas_bumi"]; ?></td>
                                            <td><?= $row["luas_bangunan"]; ?></td>
                                            <?php
                                            // Perhitungan NJOP DPP
                                            $totalNjopBumi = $row['luas_bumi'] * $row['njop_bumi'];
                                            $totalNjopBangunan = $row['luas_bangunan'] * $row['njop_bangunan'];

                                            $njopDpp = $totalNjopBumi + $totalNjopBangunan;
                                            ?>
                                            <td><?= $njopDpp; ?></td>
                                            <td>Rp. 10.000.000</td>
                                            <td>Rp. <?= $njopDpp - 10000000; ?></td>
                                            <?php
                                            // PBB Terutang
                                            $njopPBB = $njopDpp - 10000000;
                                            if ($njopPBB < 1000000000) {
                                                $tarif = 0.11; // Tarif 0,11% (0,0011)
                                            } elseif ($njopPBB > 1000000000) {
                                                $tarif = 0.22; // Tarif 0,22% (0,0022)
                                            } else {
                                                $tarif = 0;
                                            }
                                            $pbbTerutang = $njopPBB * $tarif;
                                            ?>
                                            <td><?= $pbbTerutang ?></td>
                                            <?php
                                            // Keterangan
                                            if ($pbbTerutang == 0) {
                                                $info = "Lunas";
                                            } elseif ($pbbTerutang >= 0) {
                                                $info = "Belum Lunas";
                                            } else {
                                                $info = "Hasilnya Minus, Belum Lunas";
                                            }
                                            ?>
                                            <td><?= $info ?></td>
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