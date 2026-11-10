<html>
<head>
    <title>WEBSITE KASIR</title>
</head>
<body>
    <h1>selamat datang di website kasir</h1>
    <p>MENU:</p><br><br>
    <a href="login.php">login</a><br><br>
    <a href="register.php">register</a><br><br>
    <a href="tablebarang.php"> lihat barang</a><br><br>
    <a href="tambahbarang.php"> tambah barang</a><br><br>
    <a href="penjualan.php"> penjualan</a><br><br>
    <a href="logout.php">Logout</a><br><br>
</body>
<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "login sebagai: " . $_SESSION['username'] . "!";
} else {
    echo "anda masih belum login!.";
}
?>
</html>
