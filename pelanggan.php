<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=pelanggan_tambah" class="btn btn-primary">+ Tambah Data</a>
    </div>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
        
        <?php 
        $query = mysqli_query($koneksi, "SELECT*FROM pelanggan");
        while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['nama_pelanggan'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['no_telepon'] ?></td>
                <td>
                    <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan'] ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
</table>
</div>