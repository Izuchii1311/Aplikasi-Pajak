<!-- Section SideBar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Header -->
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <img src="../../assets/img/logodesa.png" alt="" width="50">
            <h4 class="mt-3">
                <span class="demo menu-text fw-bolder ms-2">Data Desa</span>
            </h4>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </a>
    </div>
    <!-- End Header -->

    <!-- Shadow -->
    <div class="menu-inner-shadow"></div>

    <!-- SideBar Menu -->
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?php echo $active === 'dashboard' ? 'active' : ''; ?>">
            <a href="../dashboard/index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Master Data -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Master Data</span></li>
        <li class="menu-item <?php echo $active === 'data_warga' ? 'active' : ''; ?>">
            <a href="../data_warga/index.php" class="menu-link">
                <i class="menu-icon bx bx-user"></i>
                <div>Data Warga</div>
            </a>
        </li>
        <li class="menu-item <?php echo $active === 'data_sppt' ? 'active' : ''; ?>">
            <a href="../data_sppt/index.php" class="menu-link">
                <i class="menu-icon bx bx-file"></i>
                <div>Data SPPT</div>
            </a>
        </li>

        <!-- PBB-P2 -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Perhitungan PBB-P2</span></li>
        <li class="menu-item <?php echo $active === 'pergitungan_pbb' ? 'active' : ''; ?>">
            <a href="../pbb_p2/index.php" class="menu-link">
                <i class="menu-icon bx bx-user"></i>
                <div>PBB-P2</div>
            </a>
        </li>
        <li class="menu-item <?php echo $active === 'show_perhitungan' ? 'active' : ''; ?>">
            <a href="../pbb_p2/show.php" class="menu-link">
                <i class="menu-icon bx bx-book"></i>
                <div>Semua Data PBB-P2.</div>
            </a>
        </li>

        <!-- PBB-P2 -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
        <li class="menu-item <?php echo $active === 'menu' ? 'active' : ''; ?>">
            <a href="../home.php" class="menu-link">
                <i class="menu-icon bx bx-menu"></i>
                <div>Menu</div>
            </a>
        </li>
    </ul>
    <!-- End SideBar Menu -->
</aside>
<!-- End Section SideBar -->