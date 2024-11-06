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
    <style>
        /* Default Styles */
        body {
            font-family: Arial, sans-serif;
        }

        /* Styles for printing */
        @media print {
            body {
                width: 58mm;
                font-size: 12px;
            }
            .container-fluid, .d-sm-flex, .btn {
                display: none;
            }
            #printArea {
                width: 100%;
                display: block;
                padding: 10px;
                border: none;
            }
            table {
                width: 100%;
            }
            td, th {
                padding: 5px 0;
            }
            h1 {
                font-size: 16px;
                text-align: center;
            }
        }
    </style>
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
            <h1>STRUK PEMBELIAN</h1>
            <p><strong>Nama Pelanggan:</strong> <?php echo $data['nama_pelanggan']; ?></p>
            <table class="table">
                <?php 
                    $pro = mysqli_query($koneksi, "SELECT * FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
                    while($produk = mysqli_fetch_array($pro)){                
                ?>
                <tr>
                    <td><?php echo $produk['nama_produk']; ?></td>
                    <td>Qty: <?php echo $produk['jumlah_produk']; ?></td>
                    <td align="right">Rp <?php echo number_format($produk['subtotal'], 0, ',', '.'); ?></td>
                </tr>
                <?php 
                    }
                ?>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td align="right"><strong>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></strong></td>
                </tr>
            </table>
            <p align="center">Terima Kasih atas Kunjungan Anda!</p>
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
