<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        
        <a href="?page=produk_tambah" class="btn btn-info">+ Tambah Data</a>
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
        $query = mysqli_query($koneksi, "SELECT * FROM produk");
        while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['nama_produk']; ?></td>
                <td>Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td>
                    <a href="?page=produk_ubah&&id=<?php echo $data['id_produk']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=produk_hapus&&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
