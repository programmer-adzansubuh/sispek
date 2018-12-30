<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-90px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<h3>Tambah Data Kematian</h3>

<div class="row">
	<div class="col-lg-12">
		<hr>
	</div>
	<div class="col-lg-6">
		<div class="">
			<span style="font-size: 24px; color: grey;">Data Almarhum/ah</span>
			<span style="float: right;">
				<a title="Cari data almarhum" id="cari" class="btn btn-primary" data-id_penduduk_edit="<?php echo $id_penduduk?>"
				 role="button">
					<span> <img src='../img/ic_search.png' height='18'> </span>CARI DATA
				</a>
			</span>
			<hr>
		</div>
		<table style="border: 1.5px solid #80808040" class="table table-striped table-responsive">
			<tr>
				<td width="220px">Nomor Induk Kependudukan</td>
				<td width="10px">:</td>
				<td id="nik"></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
					<b id="nama">
					</b>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td id="tempat_lahir"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td id="tanggal_lahir"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td id="jenis_kelamin"></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td id="agama"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td id="dataAlamat"></td>
			</tr>
			<tr>
				<td>Nomor Kartu Keluarga</td>
				<td>:</td>
				<td id="no_kk"></td>
			</tr>
			<tr>
				<td>Status Perkawinan</td>
				<td>:</td>
				<td id="status_perkawinan"></td>
			</tr>
			<tr>
				<td>Status Dalam Keluarga</td>
				<td>:</td>
				<td id="status_dlm_keluarga"></td>
			</tr>
		</table>
	</div>

	<div class="col-lg-6">
		<div class="">
			<span style="font-size: 24px; color: grey;">Keterangan Kematian</span>
			<span style="float: right;">
				<img src='../img/info.svg' height='24'>
			</span>
			<hr>
		</div>
		<input type="text" name="id_penduduk" id="id_penduduk" class='hidden'>

		<div class="group">
			<div class="labels-fixed">Tanggal & Jam Kematian :</div>
			<input type="datetime-local" class="inputs" name="tanggal" id="tanggal_kematian" style="z-index: 1; padding-bottom: 4px;" />
			<span class="bar"></span>
		</div>

		<div class="group">
			<textarea type="text" name="penyebab" class="inputs" id="penyebab" required></textarea>
			<span class="bar"></span>
			<label class="labels">Penyebab :</label>
		</div>

		<div class="group">
			<textarea type="text" name="alamat" class="inputs" id="alamat_kematian" required></textarea>
			<span class="bar"></span>
			<label class="labels">Alamat kematian :</label>
			<p style="color:#b1b4c1; margin-top:10px;">
				*Abaikan alamat jika meninggal di alamat yang sama dengan data penduduk.
			</p>
		</div>
		

		<div class="form-inline">
			<div class="text-danger">
				*Tanggal, Jam & Penyebab wajib di isi.
			</div>
			<div align="right">
				<button id="save" type="button" class="btn btn-success" style="width: 100px;"><b>SIMPAN</b></button>
				<button onclick="backToHome()" type="button" class="btn btn-default">BATAL</button>
			</div>
		</div>
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

	//aksi simpan
	$('#save').click(function () {

		var formData = new FormData();
		formData.append('id_penduduk', $('#id_penduduk').val() );
		formData.append('tanggal_kematian', $('#tanggal_kematian').val() );
		formData.append('penyebab', $('#penyebab').val() );
		formData.append('alamat_kematian', $('#alamat_kematian').val() );

		console.log(formData);

		$.ajax({
			url: 'simpan.php',
			type: 'POST',
			data: formData,
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			success : function(data) {
				console.log(data);
			}
		})
		.done(function(resp) {
			console.log("response "+resp);
			if (resp != "sukses") {
				$.alert({
					type: 'red',
					title: 'Failure!',
					content: 'Terjadi kesalahan : ( Error : ' + resp + " )",
				});
			} else {
				$.confirm({
					title: 'Succesfully!',
					content: 'Berhasil disimpan.',
					type: 'blue',
					typeAnimated: true,
					buttons: {
						tryAgain: {
							text: 'See Data List',
							btnClass: 'btn-blue',
							action: function(){
								window.location = "../kematian";
							}
						},
						addNew: {
							text: 'Add New',
							action: function () {
								$('#data').load('input.php');
							}
						}
					}
				});
			}
		})
		.fail(function() {
			console.log("error ");
			$.alert({
						title: 'Failure!',
						content: 'Terjadi kesalahan'
					});
		})
		.always(function() {
			console.log("complete");
		});
	});
	

</script>



<div class="modal fade" id="modalPilihData">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
				<h4 class="modal-title">Pilih Penduduk</h4>
			</div>
			<div class="modal-body">

				<br>

				<table id="tabl" class="table table-responsive table-hover " width="100%">
					<thead bgcolor="#F4F4F4">
						<th>NIK</th>
						<th>Nama Lengkap</th>
						<th>Tempat, Tgl Lahir</th>
						<th width="130px">Jenis Kelamin</th>
						<th>Alamat</th>
						<th bgcolor="#a9daba" width="20px">Pilih</th>
					</thead>
				</table>

				<?php 

				require_once '../koneksi.php';

				$query = 
				"SELECT 
				tabelpenduduk.`nik`, 
				tabelpenduduk.`nama`, 
				tabelpenduduk.`tempat_lahir`, 
				tabelpenduduk.`tanggal_lahir`, 
				tabelpenduduk.`jenis_kelamin`,
				tabelpenduduk.`agama`,
				tabelpenduduk.`status_perkawinan`,
				tabelpenduduk.`status_dlm_keluarga`,
				tabelpenduduk.`terakhir_update`,
				tabelpenduduk.`id_penduduk`,
				tabelalamat.`no_rumah`,
				tabelalamat.`blok`,
				tabelalamat.`rt`,
				tabelalamat.`rw`,
				tabelalamat.`desa`,
				tabelalamat.`kecamatan`,
				tabelalamat.`kabupaten`,
				tabelkeluarga.`no_kk`
				FROM tabelpenduduk
				INNER JOIN tabelalamat 
				ON tabelalamat.`id_alamat` = tabelpenduduk.`id_alamat` 
				INNER JOIN tabelkeluarga 
				ON tabelkeluarga.`id_keluarga` = tabelpenduduk.`id_keluarga` 
				WHERE NOT EXISTS (SELECT id_penduduk FROM tabelkematian WHERE id_penduduk = tabelpenduduk.`id_penduduk`)
				ORDER BY tabelpenduduk.`terakhir_update` DESC";

				$response = $conn->query($query);

				if (mysqli_num_rows($response) > 0) {
				$result = array();
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

					"<a class='action pointer' id='get-pilih'
					data-id=".$data['id_penduduk']."
					data-nik=".$data['nik']." 
					data-nama=".$data['nama']."
					data-tmp_lahir=".$data['tempat_lahir']."
					data-tgl_lahir=".$data['tanggal_lahir']."
					data-jk=".$data['jenis_kelamin']."
					data-agama=".$data['agama']."
					data-no_kk=".$data['no_kk']."
					data-st_kawin=".$data['status_perkawinan']."
					data-st_kl=".$data['status_dlm_keluarga']."
					data-no_rumah=".$data['no_rumah']."
					data-blok=".$data['blok']."
					data-rt=".$data['rt']."
					data-rw=".$data['rw']."
					data-des=".$data['desa']."
					data-kec=".$data['kecamatan']."
					data-kab=".$data['kabupaten'].">

					<span data-ripple><img src='../img/check_circle.png' class='icon-circle'></img></span></a>"

					);
					
				}

				$data = json_encode($result);
				echo "<script>var dt = ".$data."</script>";
					
				}
			
				
			
			?>

				<br>
				<div class="row modal-footer">

					<div class="col-lg-6" style="text-align:left;">
						<span class="text-danger">*Centang kolom pilih untuk memilih data.</span>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<script>
var scrollValue = false;

if ($(window).width() < 700) {
	scrollValue = true;
}

var table = $('#tabl').DataTable({
	data: dt,
	responsive: true,
	"aoColumnDefs": [{
		"bSortable": false,
		"aTargets": [5]
	}]
});

$(table.column(5).nodes()).addClass('name-highlight-green');

$(document).on('click', '#get-pilih', function () {
	$("#modalPilihData").modal('hide');

	var id = $(this).data('id');
	var nik = $(this).data('nik');
	var nama = $(this).data('nama');
	var tmp_lahir = $(this).data('tmp_lahir');
	var tgl_lahir = $(this).data('tgl_lahir');
	var jk = $(this).data('jk');
	var agama = $(this).data('agama');
	var no_kk = $(this).data('no_kk');
	var st_kawin = $(this).data('st_kawin');
	var st_kl = $(this).data('st_kl');
	var no_rumah = $(this).data('no_rumah');
	var blok = $(this).data('blok');
	var rt = $(this).data('rt');
	var rw = $(this).data('rw');
	var des = $(this).data('des');
	var kec = $(this).data('kec');
	var kab = $(this).data('kab');

	$('.loading').fadeIn();
	$('.loading').fadeOut('fast', function () {
		$('#id_penduduk').val(id);
		$('#nik').text(nik);
		$('#nama').text(nama);
		$('#tempat_lahir').text(tmp_lahir);
		$('#tanggal_lahir').text(tgl_lahir);
		$('#jenis_kelamin').text(jk);
		$('#agama').text(agama);
		$('#no_kk').text(no_kk);
		$('#status_perkawinan').text(st_kawin);
		$('#status_dlm_keluarga').text(st_kl);
		$('#dataAlamat').text('No. Rumah. ' + no_rumah + ', Blok. ' + blok + ', RT/RW. ' + rt + '/' + rw + ', Desa. ' + des + ', Kec. ' + kec + ', Kab. ' + kab);
	});
});
</script>



<!-- Akhir Modal Alamat -->