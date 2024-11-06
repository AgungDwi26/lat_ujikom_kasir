<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        <button class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="printDiv('printArea')">
            <i class="fas fa-download fa-sm text-white-50"></i> Print Data
        </button>
    </div>
    <hr>
    <div id="printArea">
    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Harga Satuan</th>
            <th>Sisa Stok</th>
        </tr>
        
        <?php 
        $query = mysqli_query($koneksi, "SELECT * FROM produk");
        while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['nama_produk']; ?></td>
                <td>Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $data['stok']; ?></td>
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
