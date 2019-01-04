<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_POST['id'];
$nama_iuran = $_POST['nama_iuran']; 
$nominal = $_POST['nominal']; 
$periode = $_POST['periode']; 
$keterangan = $_POST['keterangan'];

require_once '../koneksi.php';

$sql = "UPDATE `tabeljenisiuran` SET  
    nama_iuran='$nama_iuran', 
    nominal_iuran='$nominal', 
    periode='$periode', 
    keterangan='$keterangan' 
    WHERE id_jenisiuran='$id'";

    if ($conn->query($sql) === TRUE) {
            echo "sukses";
            exit;
    } 
    else {
        echo 'error '.mysqli_error($conn);
        exit;
    }
