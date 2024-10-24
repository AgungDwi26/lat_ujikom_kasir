<?php 
    $id = $_GET['id'];

    if(isset($_POST['nama_produk'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");

        if($query) {
            echo '<script>alert("Edit Data Berhasil!"); location.href="?page=produk";</script>';
        } else {
            echo '<script>alert("Edit Data Gagal!")</script>';
        }
    }
    $query = mysqli_query($koneksi, "SELECT*FROM produk WHERE id_produk=$id");
    $data = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">produk</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=produk" class="btn btn-danger">Kembali</a>
    </div>

    <form method="post">
        <table class="table table-borderless">
            <tr>
                <td width="200">Nama produk</td>
                <td width="1">:</td>
                <td><input type="text" value="<?php echo $data['nama_produk']; ?>" class="form-control" name="nama_produk"></td>
            </tr>            
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" class="form-control" value="<?php echo $data['harga']; ?>" step="0" name="harga"></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input type="number" class="form-control" value="<?php echo $data['stok']; ?>" step="0" name="stok"></td>
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

    