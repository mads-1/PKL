<?php

require 'koneksi.php';
if(isset ($_POST["submit"])) {
	$id_akun    = htmlspecialchars($_POST["id_akun"  ]);
	$username   = htmlspecialchars($_POST["username" ]);
	$password   = htmlspecialchars($_POST["password" ]);
	$password	= md5($password);
	$nama_akun  = htmlspecialchars($_POST["nama_akun"]);
		
	$query 		= "INSERT INTO 
				tb_akun (
				username, 
				password, 
				nama_akun
				) 
				VALUES (
				'$username', 
				'$password', 
				'$nama_akun'
				)";
	$result 	= mysqli_query($conn, $query);	
if( $result ) {
	echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>
	";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan');
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
	<title>tambah akun</title>
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
<div id="" align="center">
	<form action="" method="POST">
		<table border="0" cellspacing="2" cellpadding="2" >
			<tr>
				<td colspan="3" align="center" cellspacing="20" >
					<b>Masukkan Id Akun Baru</b>
				</td>
			<tr>
				<td>
					<label for="username">username</label>
				</td>
				<td>
					:
				</td>
				<td>
					<div class="inputBox">
					<input type="text" name="username" id="username">
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">password</label>
				</td>
				<td>
					:
				</td>
				<td>
					<div class="inputBox">
					<input type="password" name="password" id="password">
					<div id="toggle" onclick="showHide();">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="right">
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
					<input type="text" name="nama_akun" id="nama_akun">
				</td>
			</tr>
			<tr>
				<td>
					<a href="index.php">kembali</a>
				</td>
				<td colspan="2" align="right">
					<button type="submit" name="submit" >tambah</button>
				</td>				
			</tr>								
		</table>
	</form>
</div>
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