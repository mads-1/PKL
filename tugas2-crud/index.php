<?php
require 'koneksi.php';
$result= mysqli_query($conn, "SELECT * FROM tb_akun")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
<h1>Akun</h1>
<a href="tambah.php">tambahkan akun baru</a>
	<table border="1" cellpadding="0" cellspacing="0" width="600">
		<tr>
			<th>id_akun</th>
			<th>username</th>
			<th>password</th>
			<th>nama_akun</th>
			<th>aksi</th>
		</tr>
<?php while ( $row = mysqli_fetch_assoc($result) ) : ?>  
		<tr>
			<td><?= $row["id_akun"]; ?></td>
			<td><?= $row["username"]; ?></td>
			<td><?= $row["password"]; ?></td>
			<td><?= $row["nama_akun"]; ?></td>
				<td>
					<a href="delete.php?id=<?= $row ["id_akun"]; ?>" onclick="return confirm(' anda yakin ingin menghapus?');">hapus</a> /
					<a href="edit.php?id=<?= $row ["id_akun"]; ?>"  onclick="return confirm(' anda yakin ingin mengedit?');">edit</a>
				</td>
		</tr>
<?php endwhile; ?>
	</table>
</body>
</html>


