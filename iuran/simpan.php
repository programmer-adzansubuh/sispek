<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$nama_iuran = $_POST['nama_iuran']; 
$nominal = $_POST['nominal']; 
$periode = $_POST['periode'];
$keterangan = $_POST['keterangan'];

require_once '../koneksi.php';

$sql = "INSERT INTO `tabeljenisiuran` 
    (
        nama_iuran, 
        nominal_iuran, 
        periode, 
        keterangan
    ) 
    VALUES (
        '$nama_iuran', 
        '$nominal', 
        '$periode', 
        '$keterangan'
    )";

    if ($conn->query($sql) === TRUE) {
            echo "sukses";
            exit;
    } 
    else {
        echo 'error '.mysqli_error($conn);
        exit;
    }
