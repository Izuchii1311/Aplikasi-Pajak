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
    exit(); // It's a good practice to include exit() after header redirect
}

# Memanggil Logic program
require 'functions.php';

# Menampilkan semua data dari tabel data_warga
$query = index("SELECT * FROM data_warga ORDER BY id ASC");

// Header Page
$title = 'Data Warga';
$active = 'data_warga';

// Condition search data
if (isset($_POST["search"])) {
    $query = search($_POST["request"]);
}

// Condition refresh data
if (isset($_POST["refresh"])) {
    if (isset($_POST["query"])) {
        $query = index($_POST["query"]);
    }
}

# Memanggil tampilan header
include '../layouts/header.php';
?>

<!-- Content -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include '../layouts/sidebar.php'; ?>

        <!-- Layout page -->
        <div class="layout-page">
            <?php include '../layouts/navbar.php'; ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content -->
                <div class="container flex-grow-1 container-p-y">
                    <div class="row d-flex justify-content-between">
                        <div class="col-sm-6">
                            <h4 class="fw-bold">Data Warga</h4>
                            <p class="text-secondary">Data warga yang sudah terdaftar di dalam aplikasi.</p>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="d-flex justify-content-end">
                            <a href="../data_warga/laporan.php" class="btn btn-primary ms-5">Download Data Warga</a>
                            <a href="../data_warga/create.php" class="btn btn-primary ms-5">Tambah Data Baru +</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
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
                                                <input type="text" name="request" id="request" class="form-control" placeholder="Cari Data Warga">
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
                        <div class="table-responsive text-nowrap">
                            <table class="table mb-5">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>No. KK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    <?php foreach ($query as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["nik"]; ?></td>
                                            <td><?= $row["no_kk"]; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["alamat"]; ?></td>
                                            <td><?= $row["rt"]; ?></td>
                                            <td><?= $row["rw"]; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="../data_sppt/create.php?id=<?= $row["id"]; ?>"><i class="bx bx-file me-2"></i> Buat SPPT</a>
                                                        <a class="dropdown-item" href="edit.php?id=<?= $row["id"]; ?>"><i class="bx bx-edit me-2"></i> Edit</a>
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
                    </div>
                    <!--/ End Card -->

                </div>
                <!-- End Content -->
            </div>
            <!-- End Content wrapper -->

        </div>
        <!-- End Layout page -->

    </div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php

# Memanggil tampilan footer
include '../layouts/footer.php';
?>