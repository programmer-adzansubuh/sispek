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

$id_jenisiuran = $_GET['id'];
$nominal = $_GET['nominal'];

  require_once '../../koneksi.php';

  $query = 
          "SELECT * FROM tabeliuran
          INNER JOIN tabeljenisiuran ON tabeliuran.`id_jenisiuran` = tabeljenisiuran.`id_jenisiuran`
          INNER JOIN tabelkeluarga ON tabeliuran.`id_keluarga` = tabelkeluarga.`id_keluarga`
          INNER JOIN tabelpenduduk ON tabelkeluarga.`id_penduduk` = tabelpenduduk.`id_penduduk`
          WHERE tabeliuran.`id_jenisiuran` = '$id_jenisiuran' 
          ORDER BY tabeliuran.`tanggaliuran` DESC";

  $response = $conn->query($query);
  $result = array();

  $input_kk = "<td>
  <input type='text' class='hidden' id='id_kk' readonly required>
  <input type='number' placeholder='Cari kk' style='background-color:white; width:150px;' class='form-control' id='input_kk' readonly required>
  </td>";

  $input_nama = "<td>
  <input type='text' style='background-color:white; width:120px;' class='form-control' id='input_nama' readonly required>
  </td>";

  $input_nominal = "<td>
  <input type='number' placeholder='Isi Nominal' value='$nominal'  style='background-color:white; width:120px;' class='form-control' id='input_nominal' required>
  </td>";

  $input_tanggal = "<td>
  <input type='date' style='background-color:white; width:170px;' class='form-control' id='input_tanggal' required>
  </td>";

    $result[] = array(
        $input_kk,
        $input_nama,
        $input_nominal,
        $input_tanggal,
        "<button id='add' type='button' class='btn btn-primary' >ADD</button",
        "<td></td>"
        );

    if (mysqli_num_rows($response) > 0) {

    while($data = $response->fetch_assoc()) {

        $date_source = $data["tanggaliuran"];
        $date = new DateTime($date_source);
        $tanggal = $date->format('d/m/Y');

        $result[] = array(
        $data["no_kk"],
        $data["nama"],
        '<b>Rp. '.$data["nominal_iuran"].'</b>',
        $tanggal,

        "<a class='action pointer' id='edit' 
        data-id_iuran_edit=".$data['id_jenisiuran']."
        data-nama_iuran_edit=".$data['nama_iuran']."
        data-nominal_iuran_edit=".$data['nominal_iuran']."
        data-periode_iuran_edit=".$data['periode']."
        data-keterangan_iuran_edit=".$data['keterangan'].">
        <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>",

        "<a class='action pointer' id='delete' data-id_iuran_hapus=".$data['id_iuran']."  
        data-nama_iuran_hapus='".$data['nama']."'>
        <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>"

        );
        
      }

    }
  
 ?>

<table id="tabl" class="table table table-hover " width="100%">
    <thead bgcolor="#F4F4F4">
        <th>No. KK</th>
        <th>Keluarga</th>
        <th>Nominal</th>
        <th>Tanggal</th>
        <th bgcolor="#b7cbd4" width="20px">Action</th>
        <th bgcolor="#b7cbd4" width="20px"></th>
    </thead>
</table>

<script type="text/javascript" src="../js/ripple.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
<script src="../js/dataTables/jquery.dataTables.js"></script>

<script type="text/javascript">
    var tableData = <?php echo json_encode($result); ?>;
    var scrollValue = true;

    if ($(window).width() < 700) {
        scrollValue = true;
    }

    var table = $('#tabl').DataTable({
        data: tableData,
        responsive: true,
        "scrollX": scrollValue,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [4, 5]
        }]
    });

    $(table.column(0).nodes()).addClass('date-highlight');
    $(table.column(4).nodes()).addClass('editor-highlight');
    $(table.column(5).nodes()).addClass('editor-highlight');

    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function (element) {
        new RippleEffectDark(element);

    });

    $(document).on("click", "#add", function () {

        var id_kk = $('#id_kk').val();
        var id_jenisiuran = <?php echo $id_jenisiuran ?>;
        var nominal = $('#input_nominal').val();
        var tanggal = $('#input_tanggal').val();

        $.ajax({
                url: 'input/simpan.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    id_kk: id_kk,
                    id_jenisiuran: id_jenisiuran,
                    nominal: nominal,
                    tanggal: tanggal
                },
            })
            .done(function (resp) {
                console.log("response " + resp);
                if (resp != 0) {
                    //berhasil
                    $('.modal').not($(this)).each(function () {
                        $(this).modal('hide');
                    });

                    $('.loading').fadeOut('fast', function () {
                        $('#data').load('input/input.php?id=' + id_jenisiuran);
                        $('#data').fadeIn();
                    });

                } else {
                    alert('Terjadi kesalahan, Gagal menyimpan.');
                }
            })
            .fail(function () {
                console.log("error ");
                $.alert({
                    title: 'Failure!'
                });
            })
            .always(function () {
                console.log("complete");
            });

    });


    $(document).on("click", "#edit", function () {

        var id = $(this).data('id_jenisiuran_edit');

        $('#nama_iuran_edit').val($(this).data('nama_jenisiuran_edit'));
        $('#nominal_edit').val($(this).data('nominal_jenisiuran_edit'));
        $('#periode_edit').val($(this).data('periode_jenisiuran_edit'));
        $('#keterangan_edit').val($(this).data('keterangan_jenisiuran_edit'));

        $('#modalEdit').modal();

        $('#editIuran').click(function () {

            var nama_iuran = $('#nama_iuran_edit').val();
            var nominal = $('#nominal_edit').val();
            var periode = $('#periode_edit').val();
            var keterangan = $('#keterangan_edit').val();

            $.ajax({
                    url: 'edit.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        id: id,
                        nama_iuran: nama_iuran,
                        nominal: nominal,
                        periode: periode,
                        keterangan: keterangan
                    },
                })
                .done(function (resp) {
                    console.log("response " + resp);
                    if (resp != 0) {
                        //berhasil
                        $('.modal').not($(this)).each(function () {
                            $(this).modal('hide');
                        });

                        $('.loading').fadeOut('fast', function () {
                            $('#data').load('input/input.php?id=' + id_jenisiuran);
                            $('#data').fadeIn();
                        });

                    } else {
                        alert('Terjadi kesalahan, Gagal menyimpan.');
                    }
                })
                .fail(function () {
                    console.log("error ");
                    $.alert({
                        title: 'Failure!'
                    });
                })
                .always(function () {
                    console.log("complete");
                });

        });

    });


    $(document).on("click", "#delete", function () {

        var data = new FormData();

        var id = $(this).data('id_iuran_hapus');
        var nama = $(this).data('nama_iuran_hapus');

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
                            url: "inpu/hapus.php",
                            data: value,
                            async: false,
                            type: "POST",
                            success: function (resps) {

                                $('.loading').fadeOut('fast', function () {
                                    $('#data').load('input/input.php?id=' +
                                        id_jenisiuran);
                                    $('#data').fadeIn();
                                });

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

        $('#modalTambah').modal();

        $('#simpanIuran').click(function () {

            var nama_iuran = $('#nama_iuran').val();
            var nominal = $('#nominal').val();
            var periode = $('#periode').val();
            var keterangan = $('#keterangan').val();

            $.ajax({
                    url: 'simpan.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        nama_iuran: nama_iuran,
                        nominal: nominal,
                        periode: periode,
                        keterangan: keterangan
                    },
                })
                .done(function (resp) {
                    console.log("response " + resp);
                    if (resp != 0) {
                        //berhasil
                        $('.modal').not($(this)).each(function () {
                            $(this).modal('hide');
                        });

                        window.location = "../iuran";

                    } else {
                        alert('Terjadi kesalahan, Gagal menyimpan alamat.');
                    }
                })
                .fail(function () {
                    console.log("error ");
                    $.alert({
                        title: 'Failure!'
                    });
                })
                .always(function () {
                    console.log("complete");
                });

        });

    });


    $('.modal').on('show.bs.modal', function () {
        $('.modal').not($(this)).each(function () {
            $(this).modal('hide');
        });
    });


    $("#input_kk").click(function () {
        $('#modalPilihKK').modal();
    });
</script>

<!-- Modal Pilih KK-->

<div class="modal fade" id="modalPilihKK">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Pilih Nomor KK / Nama Kepala Keluarga</h4>
            </div>
            <div class="modal-body">

                <br>

                <table id="tabel_kk" class="table table-responsive table-hover " width="100%">
                    <thead bgcolor="#F4F4F4">
                        <th>ID</th>
                        <th>Nomor Kepala Keluarga</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat</th>
                        <th bgcolor="#a9daba" width="20px">Pilih</th>
                    </thead>
                </table>

                <?php 

					require_once '../../koneksi.php';

					$query = "SELECT * FROM `tabelkeluarga`
					INNER JOIN `tabelpenduduk` ON `tabelkeluarga`.id_penduduk = `tabelpenduduk`.id_penduduk
                    INNER JOIN `tabelalamat` ON `tabelalamat`.id_alamat = `tabelpenduduk`.id_alamat
					ORDER BY `tabelkeluarga`.id_keluarga DESC";

					$response = $conn->query($query);

					if (mysqli_num_rows($response) > 0) {

						$result = array();
						$i = 0;
						while($data = $response->fetch_assoc()) {

							$result2[] = array(
							$data["id_keluarga"],
							$data["no_kk"],
                            $data["nama"],
                            "No. ".$data["no_rumah"].", ".
                            $data["blok"].", ".
                            "RT. ".$data["rt"].", ".
                            "RW. ".$data["rw"].", ",

							"<a class='action pointer' id='get-pilih-kk' 
							data-id_kk=".$data['id_keluarga']." 
							data-nokk=".$data['no_kk']."
							data-namakk=".$data['nama'].">

							<span data-ripple><img src='../img/check_circle.png' class='icon-circle'></img></span></a>"

							);

						}

					}

					?>

                <script>
                    var tableData = <?php echo json_encode($result2); ?>;
                    var scrollValue = false;

                    if ($(window).width() < 700) {
                        scrollValue = true;
                    }

                    var table2 = $('#tabel_kk').DataTable({
                        data: tableData,
                        responsive: true,
                        "aoColumnDefs": [{
                            "bSortable": false,
                            "aTargets": [4]
                        }]
                    });

                    $(table2.column(1).nodes()).addClass('name-highlight-blue');
                    $(table2.column(4).nodes()).addClass('name-highlight-green');

                    $(document).on('click', '#get-pilih-kk', function () {
                        var id_kk = $(this).data('id_kk');
                        var kk = $(this).data('nokk');
                        var nama = $(this).data('namakk');
                        if ($('#input_kk').val(kk) && $('#id_kk').val(id_kk) && $('#input_nama').val(nama)) {
                            $("#modalPilihKK").modal('hide');
                        }
                    });
                </script>

                <br>
                <div class="row modal-footer">
                    <div style="text-align:left;">
                        <span class="text-danger">Jika Nomor KK / Nama Kepala Keluarga tidak ditemukan, silahkan input
                            Kepala keluarga terlebih dahulu.</span>
                    </div>
                    <br>
                    <div style="text-align:left;">
                        <span class="text-danger">Centang kolom pilih untuk memilih KK.</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal KK -->