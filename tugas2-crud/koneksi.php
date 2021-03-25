<?php
	$servername = "localhost";
	$database = "db_kasir";
	$username = "root";
	$password = ""; 
	$conn = mysqli_connect($servername, $username, $password, $database);
//function query($query) {
//	global $conn;
//	$result = mysqli_query($conn, $query);
//    $rows = [];
//    while ($row = mysqli_fetch_assoc ($result) ) {
//        $rows [] = $row;   
 //   }
 //   return $rows;
//}
function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_akun WHERE id_akun = $id");
	return mysqli_affected_rows($conn);
}
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} 
?>