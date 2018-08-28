<?php
$host = "127.0.0.1";
$user = "root";
$password = "root";
$database = "sispek";
$connect = mysqli_connect($host, $user, $password, $database);
if ($connect) {
	echo "";
}else{
	echo "gagal";
}
?>
