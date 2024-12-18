<?php 
    if(isset($_POST['id_pelanggan'])) {
        $id_pelanggan = $_POST['id_pelanggan'];
        $produk = $_POST['produk'];
        $total = 0;
        $tanggal = date('Y/m/d');

        $query = mysqli_query($koneksi, "INSERT INTO penjualan (tanggal_penjualan, id_pelanggan) VALUES ('$tanggal', '$id_pelanggan')");
        
        $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id_penjualan DESC"));
        $id_penjualan = $idTerakhir['id_penjualan'];
        
        foreach($produk as $key=>$val) {
            $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$key"));
            
            if($val > 0) {
                $sub = $val * $pr['harga'];
                $total += $sub;
                $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, subtotal) VALUES ('$id_penjualan', '$key', '$val', '$sub')");

                $updateProduk = mysqli_query($koneksi, "UPDATE produk SET stok=stok-$val WHERE id_produk=$key");
            }
        }

        $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga=$total WHERE id_penjualan=$id_penjualan");

        if($query) {
            echo '<script>alert("Tambah Data Berhasil!"); location.href="?page=pembelian";</script>';
        } else {
            echo '<script>alert("Tambah Data Gagal!")</script>';
        }
    }
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Print Data
        </a>
        <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
    </div>

    <form method="post" onsubmit="return validateForm()" id="purchaseForm">
        <table class="table table-borderless">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <select name="id_pelanggan" class="form-control form-select" id="id_pelanggan">
                        <option value="">Pilih Pelanggan</option>
                        <?php 
                            $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            while($pel = mysqli_fetch_array($p)){
                                ?>
                                <option value="<?php echo $pel['id_pelanggan'];?>"><?php echo $pel['nama_pelanggan'];?></option>
                                <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>  
            <?php 
                $pro = mysqli_query($koneksi, "SELECT * FROM produk");
                while($produk = mysqli_fetch_array($pro)){                
            ?>
            <tr>
                <td><?php echo $produk['nama_produk'] . ' (Stock: ' . $produk['stok'] . ')'; ?></td>
                <td>:</td>
                <td>
                    <input 
                        type="number" 
                        class="form-control product-input" 
                        step="0" 
                        value="0" 
                        max="<?php echo $produk['stok']; ?>" 
                        name="produk[<?php echo $produk['id_produk']; ?>]" 
                        <?php echo $produk['stok'] == 0 ? 'disabled' : ''; ?>>
                    <input type="hidden" class="product-price" value="<?php echo $produk['harga']; ?>">
                </td>
            </tr>
            <?php 
                }
            ?>
            <tr>
                <td></td>
                <td><strong>Total Harga:</strong></td>
                <td>
                    <span id="total_harga">Rp 0</span> 
                </td>
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

<script>
function validateForm() {
    const pelanggan = document.getElementById('id_pelanggan').value;
    const productInputs = document.querySelectorAll('.product-input');
    let isProductSelected = false;

    if (pelanggan === "") {
        alert("Pilih pelanggan terlebih dahulu!");
        return false;
    }

    productInputs.forEach(input => {
        if (input.value > 0) {
            isProductSelected = true;
        }
    });

    if (!isProductSelected) {
        alert("Isi terlebih dahulu data produk di atas!");
        return false;
    }

    return true;
}

function updateTotalPrice() {
    const productInputs = document.querySelectorAll('.product-input');
    let total = 0;

    productInputs.forEach(input => {
        const productId = input.name.replace('produk[', '').replace(']', ''); 
        const quantity = parseInt(input.value);
        
        if (quantity > 0) {
            const price = parseInt(input.closest('tr').querySelector('.product-price').value);
            
            const subtotal = quantity * price;
            total += subtotal;
        }
    });

    document.getElementById('total_harga').textContent = "Rp " + total.toLocaleString();
}

document.querySelectorAll('.product-input').forEach(input => {
    input.addEventListener('input', updateTotalPrice);
});

document.getElementById('purchaseForm').addEventListener('reset', function() {
    setTimeout(updateTotalPrice, 0); 
});

updateTotalPrice();
</script>
