<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

<?php
session_start();
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $hasil = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($hasil) > 0) {
        $_SESSION['username'] = $username;
        echo "login berhasil";
        header("Location: index.php");
        exit;
    } else {
        echo "login gagal";
    }
}
?>
