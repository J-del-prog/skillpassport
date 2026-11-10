<html> 
<head>
    <title>tempat register</title>
</head>
<body>
    <h2>register</h2>
    <form method="POST" action="">
        <label for="username">username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <label for="alamat">alamat:</label>
        <input type="text" name="alamat" id="alamat" required><br><br>
        <label for="no">noHp:</label>
        <input type="text" name="no" id="no" required><br><br>
        <input type="submit" name="register" value="register">
</form>  
</body>
<?php
session_start();
include 'koneksi.php';
if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];

    $query = "INSERT INTO user (username, password, alamat, no) VALUES ('$username', '$password', '$alamat', '$no')";
    $hasil = mysqli_query($koneksi, $query);
    
    if ($hasil) {
        echo "register berhasil";
        header("Location: login.php");
    } else {
        echo "register gagal ulangi lagi aja";
    }
}
?>
</html>