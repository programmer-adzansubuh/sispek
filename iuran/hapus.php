<?php

$id = $_POST['id'];

require_once('../koneksi.php');

$sql = "DELETE FROM `tabeljenisiuran` WHERE id_jenisiuran='$id' ";

if ($conn->query($sql) === TRUE ) {
    echo 'sukses';
}

else {
	echo "gagal";
}

exit;

?>