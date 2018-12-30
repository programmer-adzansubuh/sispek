<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id_penduduk = $_POST['id_penduduk']; 
$penyebab = $_POST['penyebab']; 
$alamat_kematian = $_POST['alamat_kematian'];

$date = date('Y-m-d H:m:s', strtotime($_POST['tanggal_kematian']));

require_once '../koneksi.php';

$sql = "INSERT INTO `tabelkematian` 
    (
        id_penduduk, 
        tanggal_kematian, 
        penyebab, 
        alamat_kematian
    ) 
    VALUES (
        '$id_penduduk', 
        '$date', 
        '$penyebab', 
        '$alamat_kematian'
    )";

    if ($conn->query($sql) === TRUE) {
            echo "sukses";
            exit;
    } 
    else {
        echo 'error '.mysqli_error($conn);
        exit;
    }
