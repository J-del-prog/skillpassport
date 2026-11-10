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
        <title>Data Barang</title>
    </head>
    <body>

        <h2>DATA BARANG DI TOKO:</h2>
        <table border="1">
            <tr>
                <th>id produk</th>
                <th>nama produk</th>
                <th>harga</th>
                <th>stok</th>
                <th>edit/hapus</th>
            </tr>

            <?php
            include 'koneksi.php';

            $query = "SELECT * FROM produk";
            $hasil = mysqli_query($koneksi, $query);

            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . $row['ProdukID'] . "</td>";
                echo "<td>" . $row['namaProduk'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['stok'] . "</td>";
                echo "<td>";
                echo "<a href='editbarang.php?id=" . $row['ProdukID'] . "'>Edit</a> ";
                echo "<a href='tablebarang.php?id=" . $row['ProdukID'] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }

            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "DELETE FROM produk WHERE ProdukID='$id'";
                $hasil = mysqli_query($koneksi, $query);
                if ($hasil) {
                    echo "data sudah dihapus";
                } else {
                    echo "penghapusan gagal tolong coba lagi";
                }

            }
            ?>
        </table>
        <br><br>
            <a href="tambahbarang.php">tambah barang</a>
    </body>
</html>