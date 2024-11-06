<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
        <button class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="printDiv('printArea')">
            <i class="fas fa-download fa-sm text-white-50"></i> Print Data
        </button>
    </div>
    <hr>
    <div id="printArea">
        <h1>Laporan Penjualan</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal Penjualan</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Subtotal</th>
            </tr>
            
            <?php 
            $query = mysqli_query($koneksi, "SELECT penjualan.id_penjualan, penjualan.tanggal_penjualan, produk.nama_produk, detail_penjualan.jumlah_produk, detail_penjualan.subtotal 
                                             FROM detail_penjualan 
                                             LEFT JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
                                             LEFT JOIN produk ON detail_penjualan.id_produk = produk.id_produk");
            while($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $data['id_penjualan']; ?></td>
                    <td><?php echo $data['tanggal_penjualan']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo $data['jumlah_produk']; ?></td>
                    <td>Rp <?php echo number_format($data['subtotal'], 0, ',', '.'); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
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
