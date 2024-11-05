<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
    <link rel="stylesheet" href="path/to/fontawesome.css">
</head>
<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pembelian</h1>
            <button class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="printDiv('printArea')">
                <i class="fas fa-download fa-sm text-white-50"></i> Print Data
            </button>
            <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
        </div>

        <div id="printArea">
            <form method="post">
                <table class="table table-bordered">
                    <tr>
                        <td width="200">Nama Pelanggan</td>
                        <td width="1">:</td>
                        <td>
                           <?php echo $data['nama_pelanggan']; ?>
                        </td>
                    </tr>  
                    <?php 
                        $pro = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
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
    </div>

    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>
