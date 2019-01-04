<?php

$id = $_POST['id'];

require_once('../koneksi.php');

$sql = "DELETE FROM `tabeliuran` WHERE id_iuran='$id' ";

if ($conn->query($sql) === TRUE ) {
    echo 'sukses';
}

else {
	echo "gagal";
}

exit;

?>