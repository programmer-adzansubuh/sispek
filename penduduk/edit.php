<?php

$id = $_POST['id'];

$nik = $_POST['nik']; 
$nama = $_POST['nama']; 
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = date('Y-m-d', strtotime($_POST['tanggal_lahir']));
$id_alamat = $_POST['id_alamat']; 
$no_hp = $_POST['no_hp']; 
$email = $_POST['email']; 
$status_perkawinan = $_POST['status_perkawinan']; 
$status_dalam_keluarga = $_POST['status_dalam_keluarga']; 
$id_keluarga = $_POST['id_keluarga']; 
$jenis_kelamin = $_POST['jenis_kelamin']; 
$agama = $_POST['agama']; 
$nama_pengguna = $_POST['nama_pengguna']; 
$kata_sandi = $_POST['kata_sandi'];

$fotoSource = $_FILES['foto']['tmp_name'];
$fileNameOri = $_FILES['foto']['name'];
$target = "photo/".$nik.'_'.time().'_'.$fileNameOri;

$nomor_kk = $_POST['no_kk'];

require_once '../koneksi.php';

// Update with photo yuuuhhh
if (isset($fotoSource)) {
	$sql = "UPDATE `tabelpenduduk` SET
		nik = '$nik', 
		nama = '$nama', 
		tempat_lahir = '$tempat_lahir', 
		tanggal_lahir = '$tanggal_lahir', 
		id_alamat = '$id_alamat', 
		no_hp = '$no_hp', 
		email = '$email', 
		status_perkawinan = '$status_perkawinan', 
		status_dlm_keluarga = '$status_dalam_keluarga', 
		id_keluarga = '$id_keluarga', 
		jenis_kelamin = '$jenis_kelamin', 
		agama = '$agama', 
		nama_pengguna = '$nama_pengguna', 
		kata_sandi = '$kata_sandi',
		foto = '$target' 
		WHERE `id_penduduk` = '$id' ";

	if (move_uploaded_file($fotoSource, $target)) {
		if ($conn->query($sql) === TRUE) {
			if( $status_dalam_keluarga == 'Kepala Keluarga' && $_POST['status_dlm_keluarga_sebelum'] != 'Kepala Keluarga' ) {
			
				if ( $conn->query("INSERT INTO `tabelkeluarga` (no_kk, id_penduduk) VALUES ('$nomor_kk','$id') ") ) {
					$last_id2 = $conn->insert_id;
					if( $conn->query("UPDATE `tabelpenduduk` SET id_keluarga='$last_id2' WHERE id_penduduk='$id' ") ) {
						echo "sukses";
						exit;
					} else {
						echo "gagal: 1 " . $conn->error;
						exit;
					}
				} else {
					echo "gagal: 2 " . $conn->error;
					exit;
				}
				
			}
			else if( $status_dalam_keluarga == 'Kepala Keluarga' ) {
				if( $conn->query("UPDATE `tabelkeluarga` SET no_kk='$nomor_kk' WHERE id_keluarga='$id_keluarga' ") ) {
					echo "sukses";
					exit;
				}else {
					echo "gagal: " . $conn->error;
					exit;
				}
			} 
			else {
				echo "sukses";
				exit;
			}
		} else {
			echo "gagal: " . $conn->error;
			exit;
		}
	}else{
		echo 'Error uploading photo';
	}

} 

// Update without photo
else {

	$sql = "UPDATE `tabelpenduduk` SET
		nik = '$nik', 
		nama = '$nama', 
		tempat_lahir = '$tempat_lahir', 
		tanggal_lahir = '$tanggal_lahir', 
		id_alamat = '$id_alamat', 
		no_hp = '$no_hp', 
		email = '$email', 
		status_perkawinan = '$status_perkawinan', 
		status_dlm_keluarga = '$status_dalam_keluarga', 
		id_keluarga = '$id_keluarga', 
		jenis_kelamin = '$jenis_kelamin', 
		agama = '$agama', 
		nama_pengguna = '$nama_pengguna', 
		kata_sandi = '$kata_sandi' 
		WHERE `id_penduduk` = '$id' ";

	if ($conn->query($sql) === TRUE) {
		if( $status_dalam_keluarga == 'Kepala Keluarga' && $_POST['status_dlm_keluarga_sebelum'] != 'Kepala Keluarga' ) {
			
			if ( $conn->query("INSERT INTO `tabelkeluarga` (no_kk, id_penduduk) VALUES ('$nomor_kk','$id') ") ) {
				$last_id2 = $conn->insert_id;
				if( $conn->query("UPDATE `tabelpenduduk` SET id_keluarga='$last_id2' WHERE id_penduduk='$id' ") ) {
					echo "sukses";
					exit;
				} else {
					echo "gagal: 1 " . $conn->error;
					exit;
				}
			} else {
				echo "gagal: 2 " . $conn->error;
				exit;
			}
			
		}
		else if( $status_dalam_keluarga == 'Kepala Keluarga' ) {
			if( $conn->query("UPDATE `tabelkeluarga` SET no_kk='$nomor_kk' WHERE id_keluarga='$id_keluarga' ") ) {
				echo "sukses";
				exit;
			}else {
				echo "gagal: " . $conn->error;
				exit;
			}
		} 
		else {
			echo "sukses";
			exit;
		}
	} else {
		echo "gagal: " . $conn->error;
		exit;
	}
}

?>

