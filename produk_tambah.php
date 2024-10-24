<?php 
    if(isset($_POST['nama_produk'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");

        if($query) {
            echo '<script>alert("Tambah Data Berhasil!"); location.href="?page=produk";</script>';
        } else {
            echo '<script>alert("Tambah Data Gagal!")</script>';
        }
    }
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=produk" class="btn btn-danger">Kembali</a>
    </div>

    <form method="post">
        <table class="table table-borderless">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input type="text" class="form-control" name="nama_produk"></td>
            </tr>         
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" class="form-control" step="0" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="number" class="form-control" step="0" name="stok"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>

    </form>

    </div>

    