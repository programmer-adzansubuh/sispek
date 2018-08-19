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
    <title>Data Warga</title>
  </head>
  <body>
  <?php
  include 'koneksi.php';
  ?>
    <div class="container-fluid">
    <h1 align="center">Data Warga</h1>
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
                <th>No. Hp</th>
                <th>Status Kawin</th>
                <th>Status Dalam Keluarga</th>
                <th>Tindakan</th>
                
            </tr>
        </thead>
        <tbody>
    <?php
    $query = mysqli_query($connect, "SELECT * FROM data_penduduk");
    $i = 1;
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['nik'];?></td>
                <td><?php echo $row['nama'];?></td>
                <td><?php echo $row['tempat_lahir'];?></td>
                <td><?php echo $row['tanggal_lahir'];?></td>
                <td><?php echo $row['agama'];?></td>
                <td><?php echo $row['jenis_kelamin'];?></td>
                <td><?php echo $row['alamat'];?></td>
                <td><?php echo $row['no_hp'];?></td>
                <td><?php echo $row['status_kawin'];?></td>
                <td><?php echo $row['status_dlm_keluarga'];?></td>
                <td align="center">
                <input type="image" src="icon/view-file.png" width="30" height="30" data-toggle="modal" id="#modal-view" data-target="#modal-view">
                </td>
            </tr>
    <?php
           }
    ?>
        </tbody>
    </table>
<!-- Modal -->
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No. KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1234</td>
                    <td>12345</td>
                    <td>Enjang</td>
                    <td>Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>123456</td>
                    <td>Nurdin</td>
                    <td>Anak</td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>1234567</td>
                    <td>Mika Tamabayong</td>
                    <td>Istri</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
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