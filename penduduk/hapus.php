<?php

$id = $_POST['id'];

require_once('../koneksi.php');

$sql = "DELETE FROM `tabelpenduduk` WHERE id_penduduk='$id' ";

if ($conn->query($sql) === TRUE ) {

	echo 'sukses';
}

else{

	echo "gagal";
}

exit;

?>