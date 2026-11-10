<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "anda belum login, jadi dilarang melihat halaman ini";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Penjualan</title>
    </head>
    <body>
        <h2>Penjualan Barang</h2>
        <form method="POST" action="">
            <label for="namaProduk">Nama Produk:</label>
            <input type="text" name="namaProduk" id="namaProduk" required><br><br>
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required><br><br>
            <input type="submit" name="jual" value="Jual">
        </form>
        <?php
        if (isset($_POST['jual'])) {
            $namaProduk = $_POST['namaProduk'];
            $jumlah = $_POST['jumlah'];

        
            $query = "SELECT * FROM produk WHERE namaProduk='$namaProduk'";
            $hasil = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_assoc($hasil);

            if ($row) {
                if ($row['stok'] >= $jumlah) {
                    $stokbaru = $row['stok'] - $jumlah;
                    $updatequery = "UPDATE produk SET stok='$stokbaru' WHERE namaProduk='$namaProduk'";
                    mysqli_query($koneksi, $updateqery);
                    echo "penjualan sukses. stok saat ini: " . $stokbaru;
                } else {
                    echo "stok produk tidak mencukupi: " . $row['stok'];
                }
            } else {
                echo "produk tidak ada";

            }
            
        }
        ?>
    </body>
     



</html>


