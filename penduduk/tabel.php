<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../js/dataTables/dataTables.bootstrap.css">
<script src="../js/ripple.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
<script src="../js/dataTables/jquery.dataTables.js"></script>


<script>

Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function(element){
  new RippleEffectDark(element);
});

</script>

<?php 

  require_once '../koneksi.php';

  $query= "SELECT tabelalamat.blok, tabelpenduduk.nik, tabelpenduduk.tempat_lahir, tabelpenduduk.tanggal_lahir, tabelpenduduk.agama, tabelpenduduk.nama, tabelpenduduk.jenis_kelamin, tabelpenduduk.status_perkawinan, tabelpenduduk.status_dan_keluarga FROM tabelalamat INNER JOIN tabelpenduduk";

  $response = mysqli_query($conn,$query);

    if (mysqli_num_rows($response) > 0) {

    $result = array();
    $i = 0;
    while($data = mysqli_fetch_array($response)) {

          $result[] = array(
          $data["nik"],
          $data["nama"],
          $data["tempat_lahir"].", ".
          $data["tanggal_lahir"],
          $data["agama"],
          $data["jenis_kelamin"],
          $data["blok"],
          $data["status_perkawinan"],
          $data["status_dan_keluarga"],

            "<div style='float:right;' class='action pointer'><a id='view' data-id1=".$data['ID_PETUGAS'].">
          <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>"
          
          ,

            "<div style='float:right;' class='action pointer'><a id='del' data-id2=".$data['ID_PETUGAS']." >
          <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>"

        );
        
      }

        
    }
  
    
  
 ?>

<table id="tabl" class="table table-responsive table-hover " width="100%">
        <thead bgcolor="#F4F4F4">
          <th>NIK</th>
          <th>Nama</th>
          <th>TTL</th>
          <th>Agama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Status Kawin</th>
          <th>Status Dalam Keluarga</th>
          <th>Tindakan</th>   
          <th></th>   
        </thead>

    </table>

<script type="text/javascript" src="../js/ripple.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
<script src="../js/dataTables/jquery.dataTables.js"></script>

<script type="text/javascript">

  var tableData = <?php echo json_encode($result); ?>;  
  var scrollValue = false;

  if($(window).width() < 700){
      scrollValue = true;
  }

  $('#tabl').DataTable( {
          data: tableData,
          responsive: true,
          "scrollX": scrollValue,
          "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 8, 9] }] 

      });

	Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function(element){
  new RippleEffectDark(element);

  });

  $(document).on('click','#view',function () {

  	var id = $(this).data("id1");

  	$('#view-data').hide();
  	$('#view-data').load("edit.php?id_rayon="+id);
  	$('#tabelView').hide();
    $('#floating').hide();
    $('#edit_link').show();

    $('#view-data').fadeIn(1000);


  });

$(document).on('click','#del',function () {

          var data = new FormData();

          var id = $(this).data('id2');

          data.append('id', id);

          var value = data;

      if (confirm('Apakah anda yakin ingin menghapus rayon ini?')) {

          $.ajax({

                  url        : "rayon_hapus.php",
                  data       : value,
                  async      : false,
                  type       : "POST",
                  success    : function(resps){

                          alert(resps);

                          $('#tabel').load("rayon_tampil_tabel.php");

                  },
                  cache: false,
                  contentType: false,
                  processData: false
              });
              
          

      } else {

      }


      return false;


    });


</script>


