<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=pembelian_tambah" class="btn btn-primary">+ Tambah Pembelian</a>
    </div>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Pembelian</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        
        <?php 
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan");

        while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['tanggal_penjualan']; ?></td>
                <td><?php echo $data['nama_pelanggan']; ?></td>
                <td>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
                <td>
                    <a href="?page=penjualan_detail&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-warning">Detail</a>
                    |
                    <a href="?page=penjualan_hapus&&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
