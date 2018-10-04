<?php

$nik = $_POST['nik']; 
$nama = $_POST['nama']; 
$tempat_lahir = $_POST['tempat_lahir'];
$id_alamat = $_POST['id_alamat']; 
$no_hp = $_POST['no_hp']; 
$status_perkawinan = $_POST['status_perkawinan']; 
$status_dalam_keluarga = $_POST['status_dalam_keluarga']; 
$id_keluarga = $_POST['id_keluarga']; 
$jenis_kelamin = $_POST['jenis_kelamin']; 
$agama = $_POST['agama']; 
$nama_pengguna = $_POST['nama_pengguna']; 
$kata_sandi = $_POST['kata_sandi'];

$date=date_create($_POST['tanggal_lahir']);
$tanggal_lahir = date_format($date, 'Y-m-d');

//validasi mungkin bisa dibuatkan seperti nik harus berpa digit dll, ini belum dibuat jadi langsung nyimpen.
//if(isset(bla bla bla))

require_once '../koneksi.php';

$sql = "INSERT INTO `tabelpenduduk` 
(
    nik, 
    nama, 
    tempat_lahir, 
    tanggal_lahir, 
    id_alamat, 
    no_hp, 
    status_perkawinan, 
    status_dlm_keluarga, 
    id_keluarga, 
    jenis_kelamin, 
    agama, 
    nama_pengguna, 
    kata_sandi
) 

VALUES (
    '$nik', 
    '$nama', 
    '$tempat_lahir', 
    '$tanggal_lahir', 
    '$id_alamat', 
    '$no_hp', 
    '$status_perkawinan', 
    '$status_dalam_keluarga', 
    '$id_keluarga', 
    '$jenis_kelamin', 
    '$agama', 
    '$nama_pengguna', 
    '$kata_sandi'
)";

if ($conn->query($sql) === TRUE) {
    echo "sukses";
    exit;
} else {
    echo "gagal: " . $conn->error;
    exit;
}


?>