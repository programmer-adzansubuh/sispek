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

  $query = 
          "SELECT 
          tabelpenduduk.`nik`, 
          tabelpenduduk.`nama`, 
          tabelpenduduk.`tempat_lahir`, 
          tabelpenduduk.`tanggal_lahir`, 
          tabelpenduduk.`jenis_kelamin`,
          tabelalamat.`no_rumah`,
          tabelalamat.`blok`,
          tabelalamat.`rt`,
          tabelalamat.`rw`
          FROM tabelpenduduk
          INNER JOIN tabelalamat 
          ON tabelalamat.`id_alamat` = tabelpenduduk.`id_alamat` ";

  $response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {

    $result = array();
    $i = 0;
    while($data = $response->fetch_assoc()) {

          $result[] = array(
          $data["nik"],
          $data["nama"],
          $data["tempat_lahir"].", ".
          $data["tanggal_lahir"],
          $data["jenis_kelamin"],
          "No. ".$data["no_rumah"].", ".
          $data["blok"].", ".
          "RT. ".$data["rt"].", ".
          "RW. ".$data["rw"].", ",

            "<a class='action pointer' id='view' data-id1=".$data['ID_PETUGAS'].">
          <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>
          &nbsp;&nbsp;"
          
          .
            "
            <a class='action pointer' id='del' data-id2=".$data['ID_PETUGAS']." >
          <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>"

        );
        
      }

        
    }
  
    
  
 ?>

<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-70px;" id="floating">
	<a id="btnTambah" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_add.png" width="15" height="15">
	</a>
</div>


<table id="tabl" class="table table-responsive table-hover " width="100%">
        <thead bgcolor="#F4F4F4">
          <th>NIK</th>
          <th>Nama Lengkap</th>
          <th>Tempat, Tgl Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Tindakan</th>   
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
          "aoColumnDefs": [{ "bSortable": false, "aTargets": [5] }] 

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

$('#btnTambah').click(function () {

    $('#tambah_link').show();

    if ($('#data').load('input.php')) {
        $('#data').fadeIn();
    }


});


</script>


