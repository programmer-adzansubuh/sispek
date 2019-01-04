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
          "SELECT * FROM tabeljenisiuran
          ORDER BY tabeljenisiuran.`tanggal_buat` DESC";

  $response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {

    $result = array();
    while($data = $response->fetch_assoc()) {

        $date_source = $data["tanggal_buat"];
        $date = new DateTime($date_source);
        $tanggal = $date->format('d/m/Y');

        $result[] = array(
        $data["nama_iuran"],
        '<b>Rp. '.$data["nominal_iuran"].'</b>',
        $data["periode"],
        $tanggal,

        "<a class='action pointer' id='input' data-id_jenisiuran_input=".$data['id_jenisiuran'].">
        <button class='btn btn-sm btn-primary'><span>+ &nbsp;</span>INPUT</button></a>",

        "<a class='action pointer' id='edit' 
        data-id_jenisiuran_edit=".$data['id_jenisiuran']."
        data-nama_jenisiuran_edit=".$data['nama_iuran']."
        data-nominal_jenisiuran_edit=".$data['nominal_iuran']."
        data-periode_jenisiuran_edit=".$data['periode']."
        data-keterangan_jenisiuran_edit=".$data['keterangan'].">
        <span data-ripple><img src='../img/ic_edit.png' height='20'></img></span></a>",

        "<a class='action pointer' id='delete' data-id_jenisiuran_hapus=".$data['id_jenisiuran']."  
        data-nama_jenisiuran_hapus='".$data['nama_iuran']."'>
        <span data-ripple><img src='../img/ic_delete.png' height='20'></img></span></a>",

        "<a class='action pointer' id='detail' data-id_jenisiuran_detail=".$data['id_jenisiuran'].">
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
        <th>Nama Iuran</th>
        <th>Nominal</th>
        <th>Periode</th>
        <th>Tanggal Dibuat</th>
        <th></th>
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
            "aTargets": [4, 5, 6, 7]
        }]

    });

    $(table.column(0).nodes()).addClass('date-highlight');
    $(table.column(5).nodes()).addClass('editor-highlight');
    $(table.column(6).nodes()).addClass('editor-highlight');
    $(table.column(7).nodes()).addClass('editor-highlight');

    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function (element) {
        new RippleEffectDark(element);

    });

    $(document).on("click", "#input", function () {

        var id = $(this).data('id_jenisiuran_input');

        $('.loading').fadeOut('fast', function () {
            $('#data').load('input/input.php?id=' + id);
            $('#data').fadeIn();
        });

    });

    $(document).on("click", "#detail", function () {

        var id = $(this).data('id_kematian_detail');

        $('.loading').fadeOut('fast', function () {
            $('#data').load('detail.php?id=' + id);
            $('#data').fadeIn();
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

                        window.location = "../iuran";

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

        var id = $(this).data('id_jenisiuran_hapus');
        var nama = $(this).data('nama_jenisiuran_hapus');

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
</script>


<!-- Awal Modal Tambah -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Tambah Jenis Iuran</h4>
            </div>
            <div class="modal-body">

                <br>

                <div class="row">

                    <div class='col-lg-12'>

                        <div class="group">
                            <input type="text" id="nama_iuran" class="inputs" required>
                            <span class="bar"></span>
                            <label class="labels">Nama Iuran :</label>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="group">
                                    <input type="number" id="nominal" class="inputs" required>
                                    <span class="bar"></span>
                                    <label class="labels">Nominal :</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="group">
                                    <select name="periode" id="periode" class="inputs">
                                        <option disabled selected>- Pilih Periode -</option>
                                        <option value="Bulan">Bulan</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Hari">Hari</option>
                                        <option value="Sekali">Sekali</option>
                                    </select>
                                    <span class="bar"></span>
                                    <label class="labels">Periode :</label>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <textarea type="text" class="inputs" id="keterangan" required></textarea>
                            <span class="bar"></span>
                            <label class="labels">Keterangan :</label>
                        </div>



                        <div class="modal-footer">
                            <button id="simpanIuran" type="button" class="btn btn-success" style="width: 120px;">
                                <b>SIMPAN</b>
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                BATAL
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal -->

<!-- Awal Modal Edit -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Edit Jenis Iuran</h4>
            </div>
            <div class="modal-body">

                <br>

                <div class="row">

                    <div class='col-lg-12'>

                        <div class="group">
                            <input type="text" id="nama_iuran_edit" class="inputs" required>
                            <span class="bar"></span>
                            <label class="labels">Nama Iuran :</label>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="group">
                                    <input type="number" id="nominal_edit" class="inputs" required>
                                    <span class="bar"></span>
                                    <label class="labels">Nominal :</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="group">
                                    <select name="periode" id="periode_edit" class="inputs">
                                        <option disabled selected>- Pilih Periode -</option>
                                        <option value="Bulan">Bulan</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Hari">Hari</option>
                                        <option value="Sekali">Sekali</option>
                                    </select>
                                    <span class="bar"></span>
                                    <label class="labels">Periode :</label>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <textarea type="text" class="inputs" id="keterangan_edit" required></textarea>
                            <span class="bar"></span>
                            <label class="labels">Keterangan :</label>
                        </div>



                        <div class="modal-footer">
                            <button id="editIuran" type="button" class="btn btn-success" style="width: 120px;">
                                <b>PERBARUI</b>
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                BATAL
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal -->