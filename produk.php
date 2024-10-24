<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=produk_tambah" class="btn btn-primary">+ Tambah Data</a>
    </div>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        
        <?php 
        $query = mysqli_query($koneksi, "SELECT*FROM produk");
        while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><?php echo $data['stok'] ?></td>
                <td>
                    <a href="?page=produk_ubah&&id=<?php echo $data['id_produk'] ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=produk_hapus&&id=<?php echo $data['id_produk'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
</table>
</div>