<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dasboard</h1>
    </div>
    
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM pelanggan")); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM produk")); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pembelian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM penjualan")); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body ">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user")); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Produk Terlaris!</h1>
            <p class="lead">Produk yang paling banyak terjual di toko ini adalah:</p>
            <hr class="my-4">
            <h2><?php echo $data_produk_terlaris['nama_produk']; ?></h2>
            <p>Harga: Rp <?php echo number_format($data_produk_terlaris['harga'], 0, ',', '.'); ?></p>
            <p>Jumlah Terjual: <?php echo $data_produk_terlaris['total_terjual']; ?> pcs</p>
        </div>

        <div class="col-md-6">
            <h1 class="display-4">Pelanggan Teraktif!</h1>
            <p class="lead">Pelanggan yang paling sering berkunjung adalah:</p>
            <hr class="my-4">
            <h2><?php echo $data_pelanggan_teraktif['nama_pelanggan']; ?></h2>
            <p>Jumlah Kunjungan: <?php echo $data_pelanggan_teraktif['total_kunjungan']; ?> kali</p>
        </div>
    </div>
</div>



        </div>

    

