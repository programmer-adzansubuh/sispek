<?php 

$id = $_POST['id'];

require_once('../koneksi.php');

$sql = "UPDATE tabelpenduduk SET nama WHERE id_penduduk='$id' nama_penduduk='$nama' ";

if ($conn->query($sql) === TRUE ) {

	echo 'update sukses';
}

else{

	echo "update gagal";
}

exit;


?>