<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id_kk = $_POST['id_kk']; 
$id_jenisiuran = $_POST['id_jenisiuran']; 
$nominal = $_POST['nominal'];
$tanggal = date('Y-m-d H:m:s', strtotime($_POST['tanggal']));

require_once '../../koneksi.php';

$sql = "INSERT INTO `tabeliuran` 
    (
        id_jenisiuran, 
        id_keluarga, 
        nominal, 
        tanggaliuran
    ) 
    VALUES (
        '$id_jenisiuran', 
        '$id_kk', 
        '$nominal', 
        '$tanggal'
    )";

    if ($conn->query($sql) === TRUE) {
            echo "sukses";
            exit;
    } 
    else {
        echo 'error '.mysqli_error($conn);
        exit;
    }
