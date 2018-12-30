<?php

$id = $_POST['id'];

require_once('../koneksi.php');

$sql = "DELETE FROM `tabelkematian` WHERE id_kematian='$id' ";

if ($conn->query($sql) === TRUE ) {
    echo 'sukses';
}

else {
	echo "gagal";
}

exit;

?>