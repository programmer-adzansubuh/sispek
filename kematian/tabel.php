<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../js/dataTables/dataTables.bootstrap.css">
<script src="../js/ripple.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
<script src="../js/dataTables/jquery.dataTables.js"></script>


<script>
    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function (element) {
        new RippleEffectDark(element);
    });
</script>

<?php 

  require_once '../koneksi.php';

  $query = 
          "SELECT 
          tabelpenduduk.`nik`, 
          tabelpenduduk.`nama`, 
          tabelkematian.`id_kematian`,
          tabelkematian.`tanggal_kematian`, 
          tabelkematian.`alamat_kematian`, 
          tabelkematian.`penyebab`
          FROM tabelpenduduk
          INNER JOIN tabelkematian
          ON tabelkematian.`id_penduduk` = tabelpenduduk.`id_penduduk` 
          ORDER BY tabelpenduduk.`terakhir_update` DESC";

  $response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {

    $result = array();
    $i = 0;
    while($data = $response->fetch_assoc()) {

          $result[] = array(
          $data["nik"],
          $data["nama"],
          $data["tanggal_kematian"],
          $data["alamat_kematian"],
          $data["penyebab"],
          

            "<a class='action pointer' id='edit' data-id_penduduk_edit=".$data['id_penduduk'].">
          <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>
          &nbsp;&nbsp;",

            "<a class='action pointer' id='delete' data-id_kematian_hapus=".$data['id_kematian']." >
          <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>",

            "<a class='action pointer' id='more' data-id2=".$data['id_penduduk']." >
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
        <th>Tanggal Kematian</th>
        <th width="130px">Alamat</th>
        <th>Penyebab</th>
        <th bgcolor="#b7cbd4" width="20px">Edit</th>
        <th bgcolor="#b7cbd4" width="20px">Hapus</th>
        <th bgcolor="#b7cbd4" width="20px">Detail</th>
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

    if ($(window).width() < 700) {
        scrollValue = true;
    }

    $('#tabl').DataTable({
        data: tableData,
        responsive: true,
        "scrollX": scrollValue,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5, 6, 7]
        }]

    });

    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function (element) {
        new RippleEffectDark(element);

    });

    $(document).on("click", "#edit", function () {

        var id = $(this).data('id_penduduk_edit');

        if ($('#data').load('input_edit.php?id=' + id)) {
            $('#data').fadeIn();
        }

    });


    $(document).on("click", "#delete", function () {

        var data = new FormData();

        var id = $(this).data('id_kematian_hapus');


        data.append('id', id);

        var value = data;

        if (confirm('Apakah anda yakin ingin menghapus Data?')) {

            $.ajax({

                url: "hapus.php",
                data: value,
                async: false,
                type: "POST",
                success: function (resps) {

                $('#data').load("tabel.php");
              
                },
                cache: false,
                contentType: false,
                processData: false

            });

        }

    });

    $('#btnTambah').click(function () {

        $('#tambah_link').show();

        if ($('#data').load('input.php')) {
            $('#data').fadeIn();
        }

    });
</script>