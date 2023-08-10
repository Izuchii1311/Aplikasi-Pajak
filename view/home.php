<?php

// Session
session_start();
include_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home | Perhitungan Pajak Bumi dan Bangunan Pedesaan dan Perkotaan </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
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
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="data_warga.php">Data Warga</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">Selamat Datang</h2>
                        <p data-aos="fade-up">Di Aplikasi Perhitungan Pajak Bumi dan Bangunan - Pedesaan & Perkotaan</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#services" class="btn-get-started">Mulai Aplikasi</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active" style="background-image: url(../assets/img/desa1.png)"></div>
            <div class="carousel-item" style="background-image: url(../assets/img/desa2.png)"></div>
            <div class="carousel-item" style="background-image: url(../assets/img/desa3.png)"></div>
            <div class="carousel-item" style="background-image: url(../assets/img/desa4.png)"></div>
            <div class="carousel-item" style="background-image: url(../assets/img/desa5.png)"></div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Pelayanan Kami</h2>
                    <p>Kami siap melayani masyarakan dalam membantu pengelolaan Pajak Bumi & Bangunan agar lebih mudah.</p>
                </div>

                <div class="row gy-4 justify-content-center">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item  position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-trowel-bricks"></i>
                            </div>
                            <h3>Data Warga</h3>
                            <p>Data warga desa yang sudah terdaftar ke dalam aplikasi.</p>
                            <a href="data_warga.php" class="readmore stretched-link">Lihat Data <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-mountain-city"></i>
                            </div>
                            <h3>About</h3>
                            <p>Tentang Desa Cangkuang Wetan.</p>
                            <a href="about.php" class="readmore stretched-link">Lihat<i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Alt Services Section ======= -->
        <section id="alt-services" class="alt-services">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                    <div class="col-lg-6 img-bg" style="background-image: url(../assets/img/desa3.png);" data-aos="zoom-in" data-aos-delay="100"></div>

                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h3>Mari kita mengenal keuntungan dengan membayar Pajak</h3>
                        <p>Pajak Bumi dan Bangunan (PBB) adalah salah satu pajak yang ada di Indonesia. Menurut pengertiannya adalah pajak yang dipungut oleh pemerintah atas tanah dan bangunan dimana dasar pengenaan pajak tersebut berdasarkan Nilai Jual Objek Pajak (NJOP).</p>

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-easel flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Menghindari denda</a></h4>
                                <p>Salah satu keuntungan yang paling terasa dari membayar PBB tepat waktu adalah terhindar denda. Berdasarkan Undang-Undang (UU) Nomor 28 Tahun 2009 tentang Pajak Daerah dan Retribusi Daerah, penunggak PBB dikenai denda sebesar 2 persen per bulan dari pokok pajak terutang dengan maksimal 24 bulan.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-patch-check flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Mendukung pembangunan dan pelayanan publik</a></h4>
                                <p>Keuntungan selanjutnya dari membayar PBB tepat waktu adalah mendukung pembangunan dan pelayanan publik di daerah domisili. Sebab, PBB menjadi salah satu sumber pendapatan daerah yang digunakan untuk membiayai berbagai kegiatan dan program pembangunan, seperti infrastruktur, pendidikan, kesehatan, lingkungan, dan sosial.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-brightness-high flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Mendapatkan insentif</a></h4>
                                <p>Insentif merupakan bentuk keringanan atau pengurangan pajak yang diberikan oleh pemda sebagai stimulus atau dorongan bagi wajib pajak (WP).Semakin banyak WP yang memanfaatkan program insentif tersebut, maka semakin besar pula dampak positifnya terhadap pembangunan dan pelayanan publik.</p>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>
                </div>

            </div>
        </section><!-- End Alt Services Section -->

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
                            <li>
                                <?php if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == 'admin') { ?>
                                    <a href="../view/dashboard/index.php">Dashboard Admin</a>
                                <?php } ?>
                            </li>

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