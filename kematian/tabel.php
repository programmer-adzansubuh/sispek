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
          tabelpenduduk.`id_penduduk`,
          tabelpenduduk.`nik`, 
          tabelpenduduk.`nama`, 
          tabelkematian.`id_kematian`,
          tabelkematian.`tanggal_kematian`, 
          tabelkematian.`alamat_kematian`, 
          tabelkematian.`penyebab`,
          tabelkematian.`id_kematian`
          FROM tabelpenduduk
          INNER JOIN tabelkematian
          ON tabelkematian.`id_penduduk` = tabelpenduduk.`id_penduduk`
          ORDER BY tabelkematian.`id_kematian` DESC";

  $response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {

    $result = array();
    while($data = $response->fetch_assoc()) {

        $date_source = $data["tanggal_kematian"];
        $date = new DateTime($date_source);
        $tanggal_kematian = $date->format('d/m/Y H:m:s');

        $result[] = array(
        $data["nik"],
        $data["nama"],
        $tanggal_kematian,
        $data["penyebab"],
        $data["alamat_kematian"],

        "<a class='action pointer' id='edit' data-id_penduduk_edit=".$data['id_penduduk'].">
        <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>",

        "<a class='action pointer' id='delete' data-id_kematian_hapus=".$data['id_kematian']."  
        data-nama_kematian_hapus='".$data['nama']."'>
        <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>",

        "<a class='action pointer' id='detail' data-id_kematian_detail=".$data['id_penduduk'].">
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
        <th>Tanggal & Jam Kematian</th>
        <th>Penyebab</th>
        <th width="130px">Alamat Kematian</th>
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

    if ($(window).width() < 700) {
        scrollValue = true;
    }

    var table = $('#tabl').DataTable({
        data: tableData,
        responsive: true,
        "scrollX": scrollValue,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5, 6, 7]
        }]

    });

    $(table.column(5).nodes()).addClass('editor-highlight');
    $(table.column(6).nodes()).addClass('editor-highlight');
    $(table.column(7).nodes()).addClass('editor-highlight');

    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function (element) {
        new RippleEffectDark(element);

    });

    $(document).on("click", "#detail", function () {
  
        var id = $(this).data('id_kematian_detail');

        $('.loading').fadeOut('fast', function () {
            $('#data').load('detail.php?id='+id);
            $('#data').fadeIn();
        });

    });

    $(document).on("click", "#edit", function () {

        var id = $(this).data('id_penduduk_edit');

        $('.loading').fadeOut('fast', function () {
            $('#data').load('input_edit.php?id=' + id);
            $('#data').fadeIn();
        });

    });


    $(document).on("click", "#delete", function () {

        var data = new FormData();

        var id = $(this).data('id_kematian_hapus');
        var nama = $(this).data('nama_kematian_hapus');

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
                    action: function () {
                        btnClass: 'btn-red',
                        $.ajax({
                            url: "hapus.php",
                            data: value,
                            async: false,
                            type: "POST",
                            success: function (resps) {

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

        if ($('#data').load('input.php')) {
            $('#data').fadeIn();
        }

    });
</script>