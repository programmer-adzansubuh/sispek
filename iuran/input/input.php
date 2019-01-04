<?php 

$id = $_GET['id'];
require_once '../../koneksi.php';

  	$query = "SELECT * FROM tabeljenisiuran
          WHERE tabeljenisiuran.`id_jenisiuran` = '$id' ";

  	$response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {
    	while($data = $response->fetch_assoc()) {
			$nama_iuran = $data['nama_iuran'];
			$nominal = $data['nominal_iuran'];
			$periode = $data['periode'];
			$keterangan = $data['keterangan'];
			$date_source = $data["tanggal_buat"];
			$date = new DateTime($date_source);
			$tanggal = $date->format('d/m/Y');
    	}    
    }
?>
<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-70px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-12">
		<div class="">
			<span style="font-size: 24px;">Detail Iuran</span>
			<hr>
		</div>
		<table style="border: 1.5px solid #80808040" class="table table-striped table-responsive">
			<tr>
				<td width="140px">Nama Jenis Iuran</td>
				<td width="10px">:</td>
				<td id="nama_iuran">
					<?php echo $nama_iuran ?>
				</td>
			</tr>
			<tr>
				<td>Nominal Iuran</td>
				<td>:</td>
				<td>
					<b id="nominal">Rp.
						<?php echo $nominal ?></b>
				</td>
			</tr>
			<tr>
				<td>Periode Iuran</td>
				<td>:</td>
				<td id="periode">Per
					<?php echo $periode ?>
				</td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td id="keterangan">
					<?php echo $keterangan ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal dibuat</td>
				<td>:</td>
				<td id="tanggal">
					<?php echo $tanggal ?>
				</td>
			</tr>
		</table>
		<div style="text-align: right; margin-top: 20px; margin-bottom: 10px;">
			<a id="edit" class="btn btn-primary" data-id_penduduk_edit="<?php echo $id_penduduk?>" role="button">
				<span> <img src='../img/ic_edit_white.png' height='18'> </span>UBAH DETAIL
			</a>
		</div>
	</div>

	<div class="col-lg-9">
		<div class="">
			<span style="font-size: 24px;">Input Iuran</span>
			<hr>
		</div>

		<div id='data-iuran'></div>

	</div>
</div>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/ripple.js"></script>
<script>

	//buat function untuk tombol back
	function backToHome(params) {

		$('#tambah_link').hide();

		if ($('#data').load('tabel.php')) {
			$('#data').fadeIn();
		}
	}

	$('.modal').on('show.bs.modal', function () {
		$('.modal').not($(this)).each(function () {
			$(this).modal('hide');
		});
	});


	$("#cari").click(function () {
		$('#modalPilihData').modal();
	});

	$('.loading').fadeOut('fast', function () {
		var id = <?php echo $id ?>;
		var nominal = <?php echo $nominal ?>;
		$('#data-iuran').load('/sispek/iuran/input/tabel.php?id='+id+'&nominal='+nominal);
	});

</script>
