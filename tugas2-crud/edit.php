<?php
require 'koneksi.php';
	$id = $_GET["id"];
	$data = mysqli_query ($conn, "SELECT * FROM tb_akun WHERE id_akun ='$id'");	
if(isset ($_POST["submit"])){	
	$id_akun 	= htmlspecialchars ($_POST["id_akun"  ]);
	$username	= htmlspecialchars ($_POST["username" ]);
	$password	= htmlspecialchars ($_POST["password" ]);

	$password	= md5($password);
	$nama_akun  = htmlspecialchars ($_POST["nama_akun"]);

	$query 	= "UPDATE tb_akun SET 
			username ='$username', 
			password ='$password', 
			nama_akun='$nama_akun' 
			WHERE 
			id_akun	 ='$id'";
	$result = mysqli_query($conn, $query);
		if($result) {
				echo "
					<script>
					alert('data berhasil diubah');
					document.location.href = 'index.php';
					</script>
					";
		}else 		{
					echo "
					<script>
					alert('data gagal diubah');
					document.location.href = 'index.php';
					</script>
					";
					}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EditAkun</title>
	<style type="text/css">
.inputBox{
    position: relative;
    width: 200px;
    height: 20px;
}
.inputBox input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    background: transparent;
    padding: 0 20px;
    font-family:times new roman;
    font-size: 16px;
    box-sizing: border-box;
    border-radius: 8px;
    box-shadow: -4px -4px 10px rgba(255,255,255,1),
                inset 4px 4px 10px rgba(0,0,0,0.05),
                inset -4px -4px 10px rgba(255,255,255,1),
                4px 4px 10px rgba(0,0,0,0.05);
}
#toggle{
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    width: 25px;
    height: 25px;
    background: url(foto/show.png);
    background-size: cover;
    cursor: pointer;
}
#toggle.hide{
    background: url(foto/hide.png);
    background-size: cover;
}	
	</style>
</head>
	<body>
	<?php while( $row = mysqli_fetch_assoc($data) ) : ?>
<div id="" align="center">
	<form action="" method="POST">
		<table border="0" cellspacing="2" cellpadding="6" >
			<tr>
				<td colspan="3" align="center" cellspacing="20" >
				<b>Edit Id Akun</b>
				</td>
			</tr>
			<tr>
				<td>
					<label for="username">username</label>
				</td>
				<td>
					:
				</td>
				<td>
					<div class="inputBox">
					<input type="text" name="username" id="username"
					required value="<?= $row["username"]; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="password" >password </label >
				</td>
				<td>
					:
				</td>
				<td>
					<div class="inputBox">
					<input type="password" name="password" id="password"
					required value="<?= $row["password"]; ?>">
					<div id="toggle" onclick="showHide();">
				</td>
			</tr>
			<tr>
				<td>
					<label for="nama_akun">Nama akun</label>
				</td>
				<td>
					:
				</td>
				<td>
					<div class="inputBox">
					<input type="text" name="nama_akun" id="nama_akun"
					required value="<?= $row["nama_akun"]; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<a href="index.php">kembali</a>
				</td>
				<td>
					<input type="hidden" name="id" id="id" value="<?= $id ?>">
				</td>
					<td colspan="2" align="right">
					<button type="submit" name="submit" >kirim</button>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php endwhile; ?>
<script type="text/javascript">
	const password = document.getElementById('password');
 	const toggle = document.getElementById('toggle');
            
    function showHide(){
    if(password.type === 'password'){
        password.setAttribute('type', 'text');
        toggle.classList.add('hide')
    	} else{
        password.setAttribute('type', 'password');
        toggle.classList.remove('hide')
    	}
    }
</script>
</body>
</html>