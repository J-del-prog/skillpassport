<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "anda belum login, jadi dilarang melihat halaman ini!";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Barang</title>
    </head>
    <body>
        <h2>Tambah Barang</h2>
        <form method="POST" action="">
            <label for="namaProduk">Nama Produk:</label>
            <input type="text" name="namaProduk" id="namaProduk" required><br><br>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" required><br><br>
            <label for="stok">Stok:</label>
            <input type="number" name="stok" id="stok" required><br><br>
            <input type="submit" name="simpan" value="Simpan">
        </form>

        <?php
        include 'koneksi.php';

        if (isset($_POST['simpan'])) {
            $namaProduk = $_POST['namaProduk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $query = "INSERT INTO produk (namaProduk, harga, stok) VALUES ('$namaProduk', '$harga', '$stok')";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                echo "Data barang berhasil disimpan.";
                header("Location: tablebarang.php");
                exit;
            } else {
                echo "Gagal menyimpan data barang.";
            }
        }
        ?>
    </body>
</html>