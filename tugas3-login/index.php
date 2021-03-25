<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if(isset($_SESSION['username'])){ // Jika session username ada berarti dia sudah login
  header("location: welcome.php"); // Kita Redirect ke halaman welcome.php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
<style type="text/css">
h1 {
  font-family:"Raleway Thin", sans-serif;
}
body {
  background-image: url(foto/02.png);
  background-repeat: ;
  background-size: cover;
}
#card {
  background: #fbfbfb;
  border-radius: 8px;
  box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
  height: 350px;
  margin: 6rem auto 8.1rem auto;
  width: 329px;
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
    border:;
    background: transparent;
    padding: 0 10px;
    font-family:times new roman;
    font-size: 16px;
    box-sizing: border-box;
    border-radius: 6px;   
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
#submit-btn {
  background: #008B8B;
  border: none;
  border-radius: 0px;
  box-shadow: 0px 1px 8px #24c64f;
  cursor: pointer;
  color: white;
  font-family: "Raleway SemiBold", sans-serif;
  height: 42.3px;
  margin: 0 auto;
  margin-top: 20px;
  transition: 0.25s;
  width: 250px;
}
#submit-btn:hover {
  box-shadow: 1px 1px 18px #24c64f;
}
</style>
</head>
<body>
<div id="card" align="center">
  <form action="login.php" method="POST">
    <table border="0" cellspacing="3" cellpadding="4" >
      <tr>
        <td colspan="3" align="center" cellspacing="20" >
          <h1>LOGIN</h1>
        </td>
      <tr>
        <td>         
          <label for="username"><img src="foto/username.jpg" style="width: 30px"></label>
        </td>     
        <td>
          <div class="inputBox">
          <input type="text" name="username" id="username" placeholder="username" required/>
        </td>
      </tr>
      <tr>
        <td colspan="3"></td>
      </tr>
      <tr>
        <td>
          <label for="password"><img for="" src="foto/password.png" style="width: 35px"></label>
        </td>      
        <td>
          <div class="inputBox">
          <input type="password" name="password" id="password" placeholder="password" required/>
          <div id="toggle" onclick="showHide();">
        </td>
      </tr>       
    </table>
  <div style="color: red; margin-top: 20px;">
    <?php
    // Cek apakah terdapat cookie dengan nama message
    if(isset($_COOKIE["message"])){ // Jika ada
      echo $_COOKIE["message"]; // Tampilkan pesannya
    }
    ?>
  </div>
    <button id="submit-btn" type="submit" name="submit" >login</button>
    <br><br>
    <a href="registrasi.php">buat akun baru</a>
  </form>
</div>
<script type="text/javascript">
  const password= document.getElementById('password');
  const toggle  = document.getElementById('toggle');
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