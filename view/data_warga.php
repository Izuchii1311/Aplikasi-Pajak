<!-- Header Layouts -->
<?php

session_start();

# Memanggil Koneksi ke Database
require 'config.php';
# Memanggil Logic program
require 'functions.php';

# Menampilkan semua data dari tabel data_warga
$query = index("SELECT * FROM data_warga ORDER BY id ASC");

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

?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Data Warga | Perhitungan Pajak Bumi dan Bangunan Pedesaan dan Perkotaan </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <!-- <link href="../assets/img/favicon.png" rel="icon"> -->
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="home.php" class="logo d-flex align-items-center">
                <img src="../assets/img/logodesa.png" alt="">
                <h1>Desa Cangkuang Wetan<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="data_warga.php" class="active">Data Warga</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Data Warga</h2>
            <ol>
                <li><a href="home.php">Home</a></li>
                <li>Data Warga</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Pelayanan Kami</h2>
                    <p>Kami siap melayani masyarakan dalam membantu pengelolaan Pajak Bumi & Bangunan agar lebih mudah.</p>
                </div>

                <div class="row gy-4">

                    <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="card justify-content-center d-flex">
                            <!-- Header Table & Search -->
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="mt-4 ms-5">Informasi Data</h5>
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
                            <hr>
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col d-flex align-items-center">
                                            <table class="table mb-5">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>NIK</th>
                                                        <!-- <th>No. KK</th> -->
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <!-- <th>RT</th> -->
                                                        <!-- <th>RW</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0 text-secondary">
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($query as $row) : ?>
                                                        <tr>
                                                            <td class="text-secondary"><?= $i; ?></td>
                                                            <td class="text-secondary"><?= $row["nik"]; ?></td>
                                                            <!-- <td class="text-secondary"><?= $row["no_kk"]; ?></td> -->
                                                            <td class="text-secondary"><?= $row["nama"]; ?></td>
                                                            <td class="text-secondary"><?= $row["alamat"]; ?></td>
                                                            <!-- <td class="text-secondary"><?= $row["rt"]; ?></td> -->
                                                            <!-- <td class="text-secondary"><?= $row["rw"]; ?></td> -->
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center py-3 bg-dark text-white">
                                Copyright @SyifaNoerrohmah 2023
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Aplikasi PBB - P2.</h3>
                            <p>
                                Kota Bandung <br>
                                Jawa Barat, Indonesia<br><br>
                                <strong>Phone:</strong> 0895 - 3657 - 61398<br>
                                <strong>Email:</strong> syifa@gmail.com<br>
                            </p>
                        </div>
                    </div><!-- End footer info column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Menu Utama</h4>
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li>
                                <?php if (isset($_SESSION['ID'])) { ?>
                                    <a href="auth/logout.php">Hi, <?php echo ucwords($_SESSION['NAME']); ?> Log out</a>
                                <?php } else { ?>
                                    <a href="auth/login.php">Login</a>
                                <?php } ?>
                            </li>
                            <?php if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == 'admin') { ?>
                                <li>
                                    <a href="../view/dashboard/index.php">Dashboard Admin</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Data Warga</h4>
                        <ul>
                            <li><a href="data_warga.php">Informasi Data Warga</a></li>
                            <li><a href="#">Download</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Aplikasi PBB-P2</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main_view.js"></script>

</body>

</html>