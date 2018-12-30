<?php

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

$nomor_kk = $_POST['nomor_kk'];

require_once '../koneksi.php';

if ($nomor_kk != ''){
    $sql = "INSERT INTO `tabelpenduduk` 
    (
        nik, 
        nama, 
        tempat_lahir, 
        tanggal_lahir, 
        id_alamat, 
        no_hp, 
        email,
        status_perkawinan, 
        status_dlm_keluarga, 
        jenis_kelamin, 
        agama, 
        nama_pengguna, 
        kata_sandi,
        foto
    ) 

    VALUES (
        '$nik', 
        '$nama', 
        '$tempat_lahir', 
        '$tanggal_lahir', 
        '$id_alamat', 
        '$no_hp', 
        '$email',
        '$status_perkawinan', 
        '$status_dalam_keluarga', 
        '$jenis_kelamin', 
        '$agama', 
        '$nama_pengguna', 
        '$kata_sandi',
        '$target'
    )";

    if (move_uploaded_file($fotoSource, $target)) {
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            
            if( $conn->query("INSERT INTO `tabelkeluarga` (no_kk, id_penduduk) VALUES ('$nomor_kk','$last_id') ") ) {
                
                $last_id2 = $conn->insert_id;
                if( $conn->query("UPDATE `tabelpenduduk` SET id_keluarga='$last_id2' WHERE id_penduduk='$last_id' ") ) {
                    echo "sukses";
                    exit;
                }
            } 
            else {
                echo "gagal: " . $conn->error;
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

else {
    $sql = "INSERT INTO `tabelpenduduk` 
    (
        nik, 
        nama, 
        tempat_lahir, 
        tanggal_lahir, 
        id_alamat, 
        id_keluarga, 
        no_hp, 
        email, 
        status_perkawinan, 
        status_dlm_keluarga, 
        jenis_kelamin, 
        agama, 
        nama_pengguna, 
        kata_sandi,
        foto
    ) 

    VALUES (
        '$nik', 
        '$nama', 
        '$tempat_lahir', 
        '$tanggal_lahir', 
        '$id_alamat', 
        '$id_keluarga', 
        '$no_hp', 
        '$email',
        '$status_perkawinan', 
        '$status_dalam_keluarga', 
        '$jenis_kelamin', 
        '$agama', 
        '$nama_pengguna', 
        '$kata_sandi',
        '$target'
    )";

    if (move_uploaded_file($fotoSource, $target)) {
        if ($conn->query($sql) === TRUE) {
            
            echo "sukses";
            exit;

        } else {
            echo "gagal: " . $conn->error;
            exit;
        }
    }else{
        echo 'Error uploading photo';
    }
}

?>