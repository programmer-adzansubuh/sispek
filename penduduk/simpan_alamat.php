<?php

$no_rumah = $_POST['no_rumah'];
$blok = $_POST['blok'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$desa = $_POST['desa'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];

require_once '../koneksi.php';

$sql = "INSERT INTO `tabelalamat` 
(
    no_rumah,
    blok,
    rt,
    rw,
    desa,
    kecamatan,
    kabupaten
) 

VALUES (
    '$no_rumah',
    '$blok',
    '$rt',
    '$rw',
    '$desa',
    '$kecamatan',
    '$kabupaten'
)";

if ($conn->query($sql) === TRUE) {
    echo "sukses";
    exit;
} else {
    echo "gagal: " . $conn->error;
    exit;
}


?>