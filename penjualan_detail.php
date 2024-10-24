<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
    $data = mysqli_fetch_array($query);

?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pembelian</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
    </div>

    <form method="post">
        <table class="table table-borderless">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                   <?php echo $data['nama_pelanggan']; ?>
                </td>
            </tr>  
            <?php 
                $pro = mysqli_query($koneksi, "SELECT*FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
                while($produk = mysqli_fetch_array($pro)){                
            ?>
            <tr>
                <td><?php echo $produk['nama_produk']; ?></td>
                <td>:</td>
                <td>
                    Harga Satuan: <?php echo $produk['harga']; ?> <br>
                    Jumlah: <?php echo $produk['jumlah_produk']; ?> <br>
                    Sub Total: <?php echo $produk['subtotal']; ?>
            </td>
            </tr>
            <?php 
                }
            ?>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td>
                     <?php echo $data['total_harga']; ?>
                </td>
            </tr>
        </table>

    </form>

    </div>

    