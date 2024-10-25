<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="img/bn.png" alt="" class="img-fluid" style="max-width: 70%; height: auto;">
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Kasir <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="?page=pelanggan">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="?page=produk">
        <i class="fas fa-box-open"></i>
            <span>Produk/Barang</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="?page=pembelian">
        <i class="fas fa-shopping-cart"></i>
            <span>Pembelian</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item active">
        <a class="nav-link" href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <div class="sb-sidenav-footer text-center text-dark mt-auto" style="background-color: #e9ecef;">
        <div class="small">Logged in as:</div>
        <?php echo $_SESSION['user']['nama']; ?>
    </div>
</ul>

<!-- End of Sidebar -->