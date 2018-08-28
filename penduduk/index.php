<?php 

require 'functions.php';
$penduduk = query("SELECT tabelalamat.blok, tabelpenduduk.nik, tabelpenduduk.tempat_lahir, tabelpenduduk.tanggal_lahir, tabelpenduduk.agama, tabelpenduduk.nama, tabelpenduduk.jenis_kelamin, tabelpenduduk.status_perkawinan, tabelpenduduk.status_dan_keluarga FROM tabelalamat INNER JOIN tabelpenduduk");

 ?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
    /* modal auto scroll*/
      .modal{
    overflow-y: auto;
}
      .modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
    
}
    ::-webkit-scrollbar {
    height:12px;
    width: 5px;
    background: lightblue; //warna background scroll
}
    ::-webkit-scrollbar-thumb {
    background-color:red; //warna scroll
}
    </style>
    <title>Form Data Warga</title>
  </head>
  <body>
    <div class="container-fluid">
    <h1 align="center">Data Warga</h1>
    <input type="image" src="icon/add-user-male.png" width="50" height"50" data-toggle="modal" id="#modal" data-target="#modal-tambah-data">
    <table id="data-warga" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status Kawin</th>
                <th>Status Dalam Keluarga</th>
                <th rowspan="2">Tindakan</th>
                
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($penduduk as $pen) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $pen["nik"];?></td>
                <td><?php echo $pen["nama"]; ?></td>
                <td><?php echo $pen["tempat_lahir"]; ?></td>
                <td><?php echo $pen["tanggal_lahir"]; ?></td>
                <td><?php echo $pen["agama"]; ?></td>
                <td><?php echo $pen["jenis_kelamin"]; ?></td>
                <td><?php echo $pen["blok"]; ?></td>
                <td><?php echo $pen["status_perkawinan"]?></td>
                <td><?php echo $pen["status_dan_keluarga"]; ?></td>
                <td>
                <input type="image" src="icon/view-file.png" width="30" height="30" id="view-file">
                <input type="image" src="icon/multi-edit.png" width="30" height"30">
                <input type="image" src="icon/trash.png" width="30" height="30">
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
<!-- Modal -->
<div class="modal fade" id="modal-tambah-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="nama">NIK:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Nama:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="tgl_lhr">Tempat Lahir:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="jenkel">Tanggal Lahir:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="nama_ayah">Agama:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="nama_ibu">Jenis Kelamin:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="pelapor">Alamat:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="pelapor">Status Kawin:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="pelapor">Status Dalam Keluarga:</label>
            <input type="text" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
      <!--end modal -->
    <script>
        $(document).ready(function() {
    $('#data-warga').DataTable();
} );
    </script>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>