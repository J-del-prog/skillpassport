<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "anda belum login, jadi dilarang melihat halaman ini!";
    exit;
}
?>
<!DOCTYPE html>

<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
<form method="POST" action="">
        <label for="namaProduk">Nama Produk:</label>
        <input type="text" name="namaProduk" id="namaProduk"><br><br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga"><br><br>
        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok"><br><br>
        <input type="submit" name="update" value="Update">

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM produk WHERE ProdukID='$id'";
            $hasil = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_assoc($hasil);

            if (isset($_POST['update'])) {
                $namaProduk = $_POST['namaProduk'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];

                $query = "UPDATE produk SET namaProduk='$namaProduk', harga='$harga', stok='$stok' WHERE ProdukID='$id'";
                $hasil = mysqli_query($koneksi, $query);

                if ($hasil) {
                    echo "data sudah di update";
                    header("Location: tablebarang.php");
                    exit;
                } else {
                    echo "data gagal di update";
                }
            }
        }
        ?>
</form>
    
</body>
</html>


    
