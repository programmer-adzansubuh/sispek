<?php 

require 'functions.php';
$penduduk = query("SELECT * FROM tabelpenduduk");

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <!--css datatables-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>
    <link rel="stylesheet" href="style_css.css">
</head>
<body>
    <div class="container">
        <p align="center">Data Penduduk</p>
        <input type="image" src="icon/add-user-male.png" width="50" height"50" id="myBtn"/>
        <table id="example" class="mdl-data-table" style="width:100%">
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
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($penduduk as $pen) : ?>
            	
            
                <tr>
                    <td></td>
                    <td><?php echo $pen["nik"]; ?></td>
                    <td><?php echo $pen["nama"]; ?></td>
                    <td><?php echo $pen["tempat_lahir"]; ?></td>
                    <td><?php echo $pen["tanggal_lahir"]; ?></td>
                    <td><?php echo $pen["agama"]; ?></td>
                    <td><?php echo $pen["jenis_kelamin"]; ?></td>
                    <td></td>
                    <td><?php echo $pen["status_perkawinan"]; ?></td>
                    <td><?php echo $pen["status_dan_keluarga"]; ?></td>
                    <td>
                    	<a href="#">Edit</a>
                    	<a href="#">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>    
               
        </table>
    </div>
    <!--modal-->
    <!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h3>Tambah Data</h3>
      </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" class="form-control" id="usr">
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="form-group">
                        <label for="agama">Agama:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="form-group">
                        <label for="status_kawin">Status Kawin:</label>
                        <input type="text" class="form-control" id="">
                          </div>
                      <div class="form-group">
                        <label for="status_dalam_keluarga">Status Dalam Keluarga:</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      
                  </div>
        <div class="modal-footer">
            
        </div>
    </div>
</div>

    <!--end modal-->
    <script>
    $(document).ready(function() {
        $('#example').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );
    } );
    </script>
    <script>
        // Get the modal
    var modal = document.getElementById('myModal');
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>    
</body>
</html>