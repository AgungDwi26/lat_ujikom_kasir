<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
        <button class="d-flex d-sm-inline-block btn btn-sm btn-info shadow-sm" onclick="printDiv('printArea')">
            <i class="fas fa-download fa-sm text-white-50"></i> Print Data
        </button>
        
        <a href="?page=pelanggan_tambah" class="btn btn-info">+ Tambah Data</a>
    </div>
    <hr>
    <div id="printArea">
    <table class="table table-bordered">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th class="no-print">Aksi</th> <!-- Tambahkan kelas 'no-print' -->
        </tr>
        
        <?php 
        $query = mysqli_query($koneksi, "SELECT*FROM pelanggan");
        while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['nama_pelanggan'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['no_telepon'] ?></td>
                <td class="no-print"> <!-- Tambahkan kelas 'no-print' -->
                    <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan'] ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</div>

<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
