<?php

# Memanggil Koneksi ke Database
require '../config.php';

// Session
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:../auth/login.php");
    exit();
}

if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == 'user') {
    header('Location: ../home.php');
    exit();
}


# Memanggil Logic program
require 'functions.php';

# Melakukan Pencarian
$searched = false;
if (isset($_POST["search"])) {
    $query = search($_POST["request"]);
    if ($query && isset($query[0])) {
        $query = $query[0];
        $searched = true;
    }
}
# Melakukan Refresh
if (isset($_POST["refresh"])) {
    $searched = false;
}

// Header Page
$title = 'Form Perhitungan PBB-P2';
$active = 'perhitungan_pbb';

# Memanggil tampilan header
include '../layouts/header.php';
?>

<!-- Content -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include '../layouts/sidebar.php'; ?>

        <!-- Layout Page -->
        <div class="layout-page">
            <?php include '../layouts/navbar.php'; ?>

            <div class="content-wrapper">
                <!-- Content -->
                <div class="container flex-grow-1 container-p-y">
                    <div class="row d-flex justify-content-between">
                        <div class="col-sm-9">
                            <h4 class="fw-bold">PBB-P2</h4>
                            <p class="text-secondary">Data warga yang sudah terdaftar di dalam aplikasi.</p>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <!-- <a href="../data_warga/create.php" class="btn btn-primary ms-5">Tambah Data Baru +</a> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl">
                            <!-- Card -->
                            <div class="card mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="card-header">Perhitungan Data PBB-P2</h5>
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
                                <div class="card-body">
                                    <?php if ($searched) : ?>
                                        <?php if ($query) : ?>
                                            <form action="" method="post">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="kode_id">Kode_Id</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="kode_id" name="kode_id" value="<?= $query['kode_id']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="nop">NOP</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nop" name="nop" value="<?= $query['nop']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="tanggal">Tanggal Pembuatan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $query['tanggal'] ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="akun">Akun</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="akun" name="akun" value="<?= $query['akun']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="alamat_op">Alamat Objek Pajak</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="alamat_op" name="alamat_op" value="<?= $query['alamat_op']; ?>" readonly />
                                                        <span class="text-secondary">*Alamat Objek Pajak</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="alamat_wp">Alamat Wajib Pajak</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="alamat_wp" name="alamat_wp" value="<?= $query['alamat_wp']; ?>" readonly />
                                                        <span class="text-secondary">*Alamat Wajib Pajak</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="luas_bumi">Luas Bumi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="luas_bumi" name="luas_bumi" value="<?= $query['luas_bumi']; ?>" readonly />
                                                        <span class="text-secondary">*Luas Bumi (m2)</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="luas_bangunan">Luas Bangunan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" value="<?= $query['luas_bangunan']; ?> m²" readonly />
                                                        <span class="text-secondary">*Luas Bangunan (m2)</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="">NJOP DPP</label>
                                                    <div class="col-sm-10">
                                                        <?php
                                                        // Perhitungan NJOP DPP
                                                        $totalNjopBumi = $query['luas_bumi'] * $query['njop_bumi'];
                                                        $totalNjopBangunan = $query['luas_bangunan'] * $query['njop_bangunan'];

                                                        $njopDpp = $totalNjopBumi + $totalNjopBangunan;
                                                        ?>
                                                        <input type="text" class="form-control" id="" name="" value="Rp. <?= $njopDpp; ?>" readonly />
                                                        <span class="text-secondary">
                                                            Total NJOP Bumi = Luas Bumi x NJOP Bumi <br>
                                                            Total NJOP Bangunan = Luas Bangunan x NJOP Bangunan <br>
                                                            *NJOP DPP = Total NJOP Bumi + Total NJOP Bangunan
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="">NJOP TKP</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="" name="" value="Rp. 10.000.000" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="">NJOP PBB</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="" name="" value="Rp. <?= $njopDpp - 10000000; ?>" readonly />
                                                        <span class="text-secondary">*NJOP DPP - Rp. 10.000.000</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="">PBB Terutang</label>
                                                    <div class="col-sm-10">
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
                                                        <input type="text" class="form-control" id="" name="" value="Rp. <?= $pbbTerutang; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="">Keterangan</label>
                                                    <div class="col-sm-10">
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
                                                        <input type="text" class="form-control" id="" name="" value="<?= $info; ?>" readonly />
                                                    </div>
                                                </div>

                                                <div class="row justify-content-between d-flex">
                                                    <div class="col-sm-2">
                                                        <a href="../data_warga/index.php" class="btn btn-warning">Kembali</a>
                                                    </div>
                                                    <div class="col-sm-3 justify-content-end d-flex">
                                                        <a href="laporan.php?id=<?= $query["id"]; ?>" class="btn btn-primary">Cetak Laporan</a>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <p>Data tidak ditemukan.</p>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <p>Lakukan Pencarian Berdasarkan Kode ID Data SPPT yang benar untuk melakukan Perhitungan PBB-P2.</p>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    </div>

                </div>
                <!-- End Content -->

            </div>
        </div>
        <!-- End Layout Page -->

    </div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php

# Memanggil tampilan footer
include '../layouts/footer.php';
?>