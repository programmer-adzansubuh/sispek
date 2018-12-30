<?php 

$id_penduduk = $_GET['id'];
require_once '../koneksi.php';

  	$query = 
          "SELECT * FROM tabelpenduduk
		  INNER JOIN tabelkeluarga
		  ON tabelkeluarga.`id_keluarga` = tabelpenduduk.`id_keluarga`
          INNER JOIN tabelalamat 
          ON tabelalamat.`id_alamat` = tabelpenduduk.`id_alamat` 
		  INNER JOIN tabelkematian 
          ON tabelkematian.`id_penduduk` = tabelpenduduk.`id_penduduk` 
          WHERE tabelpenduduk.`id_penduduk` = '$id_penduduk' ";

  	$response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {
    	while($data = $response->fetch_assoc()) {
			$foto = $data['foto'];
			$nama = $data['nama'];
			$tempat_lahir = $data['tempat_lahir'];
			$date_source = $data["tanggal_lahir"];
			$date = new DateTime($date_source);
			$tanggal_lahir = $date->format('Y-m-d');
			$no_hp = $data['no_hp'];
			$email = $data['email'];
			$jenis_kelamin = $data['jenis_kelamin'];
			$agama = $data['agama'];
			$nik = $data['nik'];
			$id_keluarga = $data['id_keluarga'];
			$status_perkawinan = $data['status_perkawinan'];
			$status_dlm_keluarga = $data['status_dlm_keluarga'];

			$alamat = 
			'No. Rumah. ' . $data['no_rumah'] . 
			', Blok. ' . $data['blok'] . 
			', RT/RW. ' . $data['rt'] . '/' . $data['rw'] .
			', Desa. ' . $data['desa'] . 
			', Kec. ' . $data['kecamatan'] . 
			', Kab. ' . $data['kabupaten'];

			$no_kk = $data['no_kk'];

			$tanggal_kematian = $data['tanggal_kematian'];
			$alamat_kematian = $data['alamat_kematian'];
			$penyebab = $data['penyebab'];

			$id_kematian = $data['id_kematian'];
    	}    
    }
?>
<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-90px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<h3>Data Kematian</h3>

<div class="row">
	<div class="col-lg-12">
		<hr>
	</div>
	<div class="col-lg-6">
		<div class="">
			<span style="font-size: 24px; color: grey;">Data Almarhum/ah</span>
			<hr>
		</div>
		<table style="border: 1.5px solid #80808040" class="table table-striped table-responsive">
			<tr>
				<td width="220px">Nomor Induk Kependudukan</td>
				<td width="10px">:</td>
				<td id="nik"><?php echo $nik ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
					<b id="nama"><?php echo $nama ?></b>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td id="tempat_lahir"><?php echo $tempat_lahir ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td id="tanggal_lahir"><?php echo $tanggal_lahir ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td id="jenis_kelamin"><?php echo $jenis_kelamin ?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td id="agama"><?php echo $agama ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td id="dataAlamat"><?php echo $alamat ?></td>
			</tr>
			<tr>
				<td>Nomor Kartu Keluarga</td>
				<td>:</td>
				<td id="no_kk"><?php echo $no_kk ?></td>
			</tr>
			<tr>
				<td>Status Perkawinan</td>
				<td>:</td>
				<td id="status_perkawinan"><?php echo $status_perkawinan ?></td>
			</tr>
			<tr>
				<td>Status Dalam Keluarga</td>
				<td>:</td>
				<td id="status_dlm_keluarga"><?php echo $status_dlm_keluarga ?></td>
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

		<input type="text" name="id_penduduk" id="id_penduduk" value='<?php echo $id_penduduk ?>' class='hidden'>

		<div class="group">
			<div class="labels-fixed">Tanggal & Jam Kematian :</div>
			<input readonly type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', strtotime($tanggal_kematian)); ?>" class="inputs" name="tanggal" id="tanggal_kematian" style="z-index: 1; padding-bottom: 4px;" />
			<span class="bar"></span>
		</div>

		<div class="group">
            <div class="labels-fixed">Penyebab :</div>    
            <textarea type="text" name="penyebab" class="inputs" id="penyebab" readonly required><?php echo $penyebab ?></textarea>
			<span class="bar"></span>
		</div>

		<div class="group">
            <div class="labels-fixed">Alamatkematian :</div>    
            <textarea type="text" name="alamat" class="inputs" id="alamat_kematian" readonly required><?php echo $alamat_kematian ?></textarea>
			<span class="bar"></span>
        </div>

		<div style="text-align: right; margin-top: 20px; margin-bottom: 10px;" >
		<a id="edit" class="btn btn-primary"
			data-id_penduduk_edit="<?php echo $id_penduduk?>" role="button">
			<span> <img src='../img/ic_edit_white.png' height='18'> </span>UBAH DATA
		</a>
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
		formData.append('id_kematian', '<?php echo $id_kematian ?>' );
		formData.append('id_penduduk', $('#id_penduduk').val() );
		formData.append('tanggal_kematian', $('#tanggal_kematian').val() );
		formData.append('penyebab', $('#penyebab').val() );
		formData.append('alamat_kematian', $('#alamat_kematian').val() );

		console.log(formData);

		$.ajax({
			url: 'edit.php',
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
