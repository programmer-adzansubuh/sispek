<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
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
          tabelpenduduk.`terakhir_update`,
          tabelpenduduk.`id_penduduk`,
          tabelalamat.`no_rumah`,
          tabelalamat.`blok`,
          tabelalamat.`rt`,
          tabelalamat.`rw`
          FROM tabelpenduduk
          INNER JOIN tabelalamat 
          ON tabelalamat.`id_alamat` = tabelpenduduk.`id_alamat` 
          ORDER BY tabelpenduduk.`terakhir_update` DESC";

  $response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {

    $result = array();
    $i = 0;
    while($data = $response->fetch_assoc()) {

          $date_source = $data["tanggal_lahir"];
          $date = new DateTime($date_source);
          $tanggal_lahir = $date->format('d-m-Y');

          $result[] = array(
          $data["nik"],
          $data["nama"],
          $data["tempat_lahir"].", ".
          $tanggal_lahir,
          $data["jenis_kelamin"],
          "No. ".$data["no_rumah"].", ".
          $data["blok"].", ".
          "RT. ".$data["rt"].", ".
          "RW. ".$data["rw"].", ",

            "<a class='action pointer' id='edit' data-id_penduduk_edit=".$data['id_penduduk']."
            data-toggle='tooltip' data-placement='left' title='Edit'>
          <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>
          &nbsp;&nbsp;",

            "<a class='action pointer' id='delete' data-id_penduduk_hapus=".$data['id_penduduk']." 
            data-nama_penduduk=".$data['nama']." data-toggle='tooltip' data-placement='bottom' title='Hapus'>
          <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>",

            "<a class='action pointer' id='detail' data-id_penduduk_detail=".$data['id_penduduk']." 
            data-toggle='tooltip' data-placement='right' title='Detail'>
          <span data-ripple><img src='../img/ic_more_black.png' height='20'></img></span></a>"

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
      <th width="130px">Jenis Kelamin</th>
      <th>Alamat</th>
      <th bgcolor="#b7cbd4" width="20px">Edit</th>   
      <th bgcolor="#b7cbd4" width="20px">Hapus</th>
      <th bgcolor="#b7cbd4" width="20px">Detail</th>
    </thead>
</table>

<script type="text/javascript" src="../js/ripple.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
<script src="../js/dataTables/jquery.dataTables.js"></script>

<script type="text/javascript">

  var tableData = <?php echo json_encode($result); ?>;  
  var scrollValue = false;

  if($(window).width() < 700){
      scrollValue = true;
  }

  var table = $('#tabl').DataTable( {
      data: tableData,
      responsive: true,
      "scrollX": scrollValue,
      "aoColumnDefs": [{ "bSortable": false, "aTargets": [5, 6, 7] }] 

  });

  $( table.column( 5 ).nodes() ).addClass( 'editor-highlight' );
  $( table.column( 6 ).nodes() ).addClass( 'editor-highlight' );
  $( table.column( 7 ).nodes() ).addClass( 'editor-highlight' );
  $( table.column( 0 ).nodes() ).addClass( 'date-highlight' );

  $('#tabl tbody').on( 'mouseenter', 'td', function () {
      var colIdx = table.cell(this).index().column;

      $( table.cells().nodes() ).removeClass( 'highlight' );
      $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
  });

	Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function(element){
  new RippleEffectDark(element);

  });

$(document).on("click", "#edit", function () {
  
  var id = $(this).data('id_penduduk_edit');

  $('.loading').fadeOut('fast', function () {
      $('#data').load('input_edit.php?id='+id);
      $('#data').fadeIn();
  });

});

$(document).on("click", "#detail", function () {
  
  var id = $(this).data('id_penduduk_detail');

  $('.loading').fadeOut('fast', function () {
      $('#data').load('detail.php?id='+id);
      $('#data').fadeIn();
  });

});


$(document).on("click", "#delete", function() {

  var data = new FormData();

  var id = $(this).data('id_penduduk_hapus');
  var nama = $(this).data('nama_penduduk');

  data.append('id', id);

  var value = data;

  $.confirm({
        title: 'Deletion Confirmation!',
        content: 'Apakah anda yakin ingin menghapus Data : ' + nama + '?',
        type: 'red',
        buttons: {
            somethingElse: {
                text: 'Delete',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
                action: function(){
                    btnClass: 'btn-red',
                    $.ajax({
                      url        : "hapus.php",
                      data       : value,
                      async      : false,
                      type       : "POST",
                      success    : function(resps){

                        window.location = "";

                      },
                      cache: false,
                      contentType: false,
                      processData: false

                    }); 
                }
            },
            cancel: function () {
              //
            }
        }
    });

});

$('#btnTambah').click(function () {

  $('#tambah_link').show();

  $('.loading').fadeOut('fast', function () {
      $('#data').load('input.php');
      $('#data').fadeIn();
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

});


</script>




