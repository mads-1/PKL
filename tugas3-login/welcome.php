<?php 
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>
</head>
<body>
<h1>Selamat datang <?php echo $_SESSION['nama_akun']; ?></h1>
<b>anda sudah masuk</b>
<a href="logout.php">logout</a>
</body>
</html>