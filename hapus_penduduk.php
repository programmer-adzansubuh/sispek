<?php 

require_once 'koneksi.php';

$id = $_GET["id"];

if (hapus_penduduk($id) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'data_user.php';
		</script>";
}
else{
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'data_user.php';
		</script>";
}

   ?>