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

// Header Page
$title = 'Tambah Data Warga Baru';
$active = 'data_warga';

# Memanggil tampilan header
include '../layouts/header.php';

// Condition store data
if (isset($_POST["submit"])) {
    if (store($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!-- Content -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include '../layouts/sidebar.php'; ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container flex-grow-1 container-p-y">
                <div class="mt-3 mb-5">
                    <h4 class="fw-bold"><span class="text-muted fw-light">Tambah </span>Data Warga Baru</h4>
                    <p class="text-secondary">Tambah & Daftarkan Data Warga Baru ke dalam Aplikasi.</p>
                </div>

                <!-- Basic layout -->
                <div class="row">
                    <!-- Basic Layout -->
                    <div class="col-xxl">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Form Input Data</h5>
                            </div>
                            <div class="card-body">
                                <form action="../data_warga/create.php" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="nik">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anda..." />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="no_kk">No Kartu Keluarga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Masukkan Nomor Kartu Keluarga" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda..." />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda..." />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="rt">RT</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="rt" name="rt" placeholder="Masukkan Nomor RT Anda..." />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="rw">RW</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="rw" name="rw" placeholder="Masukkan Nomor RW Anda..." />
                                        </div>
                                    </div>
                                    <div class="row justify-content-between d-flex">
                                        <div class="col-sm-2">
                                            <a href="../data_warga/index.php" class="btn btn-warning">Kembali</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="submit" class="btn btn-primary ms-2">Tambah Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Basic Layout -->
                </div>
                <!-- End Basic Layout -->

            </div>
            <!-- End Content -->
        </div>
        <!-- End Content wrapper -->

    </div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php
# Memanggil tampilan footer
include '../layouts/footer.php';
?>