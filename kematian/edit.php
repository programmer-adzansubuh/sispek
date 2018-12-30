<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id_kematian = $_POST['id_kematian']; 
$id_penduduk = $_POST['id_penduduk']; 
$penyebab = $_POST['penyebab']; 
$alamat_kematian = $_POST['alamat_kematian'];

$date = date('Y-m-d H:m:s', strtotime($_POST['tanggal_kematian']));

require_once '../koneksi.php';

$sql = "UPDATE `tabelkematian` SET  
    id_penduduk='$id_penduduk', 
    tanggal_kematian='$date', 
    penyebab='$penyebab', 
    alamat_kematian='$alamat_kematian' 
    WHERE id_kematian='$id_kematian'";

    if ($conn->query($sql) === TRUE) {
            echo "sukses";
            exit;
    } 
    else {
        echo 'error '.mysqli_error($conn);
        exit;
    }
