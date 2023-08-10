<!-- Header Layouts -->
<?php

// Session
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:../auth/login.php");
    exit();
}

if (!isset($_SESSION['ROLE']) || $_SESSION['ROLE'] !== 'admin') {
    header("Location: ../home.php"); // Arahkan jika bukan admin
    exit();
}

// Header
$title = 'Dashboard';
$active = 'dashboard';
include '../layouts/header.php';
?>

<!-- Content -->
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include '../layouts/sidebar.php'; ?>

        <div class="layout-page">
            <?php include '../layouts/navbar.php'; ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content -->
                <div class="container flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex">
                                                <img src="../../assets/img/logodesa.png" alt="" width="100" height="80" class="mt-4 me-3">
                                                <div>
                                                    <h1 class="card-title text-primary mt-4">Desa Cangkuang Wetan!</h1>
                                                    <p>
                                                        Aplikasi Perhitungan Pajak Bumi dan Bangunan
                                                        Pedesaan dan Perkotaan <span class="fw-bold">(PBB-P2)</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <!-- End Header -->
                                            <!-- Body -->
                                            <div class="mt-3">
                                                <h4 class="fw-bolder">Sejarah Desa Cangkuang Wetan</h4>
                                                <p><span class="fw-bold">Desa Cangkuang Wetan</span> berada di Jl. Cisirung - Sayati KM 1,8 Kp. Cibedug Girang RW 02, Desa Cangkuang Wetan, Kecamatan Dayeuhkolot, Kabupaten Bandung ,40238. <br><br></p>
                                                <div class="d-flex flex-column align-items-center">
                                                    <img src="../../assets/img/desa1.png" alt="" width="800" class="mb-2">
                                                    <p class="text-center"><span class="text-secondary fst-italic  fs-6 text">Desa Cangkuang Wetan <br>
                                                            sumber: iNews.id
                                                        </span></p>
                                                </div>
                                                <p>Sebelum dipecah menjadi Desa Cangkuang Barat dan Cangkuang Timur pada tahun 1983, luas wilayah wilayah Desa Cangkuang adalah 424, 494 Ha yang berdasarkan cerita dari para orang tua/sesepuh bernama Rd. Raksaeni yang kemudian menjabat sebagai Lurah/Kepala Desa Cangkuang pertama sampai tahun 1810. <br>
                                                    Nama desanya sendiri diambil dari nama sebuah tumbuhan yang banyak tumbuh di daerah rawa serta sangat besar manfaatnya bagi kehidupan penduduk pada zamannya, yaitu pohon CANGKUANG. Manfaat pohon ini antara lain daunnya dapat dipergunakan sebagai bahan anyaman tikar atau pembungkus gula aren/gula kawung. <br><br>
                                                    Pada tahun 1991 periode kepemimpinan Olih Solihat, Desa Cangkuang Timur di ganti nama menjadi Desa Cangkuang Wetan disesuaikan dengan nama Ibukota Kecamatan Dayeuhkolot berdasarkan Surat Keputusan Gubernur Kepala Daerah Tingkat I Jawa Barat Nomor: 146.1/SK.1040-Pemdes/91 tentang Pergantian Nama Desa Cangkuang Timur Di Wilayah Kabupaten Daerah Tingkat II Bandung.</p>
                                            </div>
                                            <hr>
                                            <!-- End Body -->
                                            <!-- Footer -->
                                            <div class="card-footer text-center">
                                                Copyright @SyifaNoerrohmah 2023
                                            </div>
                                            <!-- End Footer -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

            </div>
            <!-- Content wrapper -->

        </div>
    </div>
    <!-- End Menu -->

</div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php
include '../layouts/footer.php';
?>