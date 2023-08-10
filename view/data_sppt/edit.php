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

// Menangkap id yang dikirimkan di URL
$id = $_GET["id"];

// Menampilkan data_warga berdasarkan idnya
$query = index("SELECT * FROM data_sppt WHERE id = $id")[0];

// Header
$title = 'Edit Data SPPT Baru';
$active = 'data_sppt';
include '../layouts/header.php';

// Condition update data
if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diedit!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit!');
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
                    <h4 class="fw-bold"><span class="text-muted fw-light">Update </span>Data SPPT</h4>
                    <p class="text-secondary">Edit Data Surat Pemberitahuan Pajak Terhutang.</p>
                </div>

                <!-- Basic Layout -->
                <div class="row">
                    <!-- Basic Layout -->
                    <div class="col-xxl">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Form Input Data</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $query["id"]; ?>">
                                    <input type="hidden" name="user_id" value="<?= $query['user_id']; ?>">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="kode_id">Kode_id</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_id" name="kode_id" placeholder="Masukkan Kode ID..." value="<?= $query['kode_id'] ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="nop">NOP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nop" name="nop" placeholder="Masukkan Nomor Objek Pajak Anda..." value="<?= $query['nop'] ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="akun">Akun</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="akun" name="akun" placeholder="Masukkan Akun Anda..." value="<?= $query['akun'] ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda..." value="<?= $query['nama']; ?>" readonly/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="alamat_op">Alamat OP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat_op" name="alamat_op" placeholder="Masukkan Alamat OP Anda..." value="<?= $query['alamat_op'] ?>" />
                                            <span class="text-secondary">*Alamat Objek Pajak</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="alamat_wp">Alamat WP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat_wp" name="alamat_wp" placeholder="Masukkan Alamat WP Anda..." value="<?= $query['alamat_wp'] ?>" />
                                            <span class="text-secondary">*Alamat Wajib Pajak</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="luas_bumi">Luas Bumi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="luas_bumi" name="luas_bumi" placeholder="Masukkan Luas Bumi Anda..." value="<?= $query['luas_bumi'] ?>" />
                                            <span class="text-secondary">*Luas Bumi (m2)</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="kelas_bumi">Kelas Bumi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kelas_bumi" name="kelas_bumi" placeholder="Masukkan Kelas Bumi Anda..." value="<?= $query['kelas_bumi'] ?>" />
                                            <span class="text-secondary">*Nomor kelas bumi</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="njop_bumi">NJOP Bumi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="njop_bumi" name="njop_bumi" placeholder="Masukkan NJOP Bumi Anda..." value="<?= $query['njop_bumi'] ?>" />
                                            <span class="text-secondary">*Harga njop bumi / m2</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="luas_bangunan">Luas Bangunan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="Masukkan Luas Bangunan Anda..." value="<?= $query['luas_bangunan'] ?>" />
                                            <span class="text-secondary">*Luas Bangunan (m2)</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="kelas_bangunan">Kelas Bangunan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kelas_bangunan" name="kelas_bangunan" placeholder="Masukkan Kelas Bangunan Anda..." value="<?= $query['kelas_bangunan'] ?>" />
                                            <span class="text-secondary">*Nomor kelas bangunan</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="njop_bangunan">NJOP Bangunan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="njop_bangunan" name="njop_bangunan" placeholder="Masukkan NJOP Bangunan Anda..." value="<?= $query['njop_bangunan'] ?>" />
                                            <span class="text-secondary">*Harga njop bangunan / m2</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="tanggal">Tanggal Pembuatan</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"/>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between d-flex">
                                        <div class="col-sm-2">
                                            <a href="../data_sppt/index.php" class="btn btn-warning">Kembali</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="submit" class="btn btn-primary ms-2">Update Data</button>
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
include '../layouts/footer.php';
?>