<?php
    require 'koneksi.php';
//proses
if(isset($_POST['submit'])) {
    $nama_akun= $_POST['nama_akun'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
//script validasi data
    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_akun WHERE nama_akun='$nama_akun' or username='$username'"));
    if ($cek > 0){
        echo "<script>window.alert('Nama Akun atau Username sudah ada')
        window.location=''</script>";
        }else{ mysqli_query ($conn,"INSERT INTO tb_akun(id_akun,nama_akun,username, password) VALUES ('','$nama_akun','$username','$password')");
            echo "<script>window.alert('DATA SUDAH DISIMPAN')
            window.location='welcome.php'</script>";
        }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style type="text/css">
body {
    background-repeat: no-repeat;
    background-image: 
    background-size: cover;
}
fieldset {  
  display: block;
  margin-left: 30px;
  margin-right: 900px;
  padding-top: 1em;
  padding-bottom: 20em;
  padding-left: 2em;
  padding-right: 2em;
  border: 2px groove (internal value);
}
.inputBox{
    position: relative;
    width: 200px;
    height: 30px;
}
.inputBox input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: ;
    background: transparent;
    padding: 0 10px;
    font-family:times new roman;
    font-size: 16px;
    box-sizing: border-box;
    border-radius: 0px;
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
    <form action="" method="POST">
        <fieldset >
        <legend>Registrasi</legend>
        <p>
            <label>Nama Akun:</label>
            <div class="inputBox">
            <input type="text" name="nama_akun" id="nama_akun" placeholder="nama_akun"  />
            </div>
        </p>
        <p>
            <label>Username:</label>
            <div class="inputBox">
            <input type="text" name="username" id="username" placeholder="username" required />
            </div>
        </p>
        <p>
            <label>Password:</label>
            <div class="inputBox">
            <input type="password" name="password" id="password" placeholder="password"  required />
            <div id="toggle" onclick="showHide();"></div>
            </div>
        </p>
        <p>
            <label>
            <input type="checkbox" name="remember" value="remember" /> Remember me</label>
        </p>
        <p>
            <input type="submit" name="submit" value="Daftar" />
        </p>
        </fieldset>
    </form>
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