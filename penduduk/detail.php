<?php 

	$id_penduduk = $_GET['id'];
  	require_once '../koneksi.php';

  	$query = 
          "SELECT * FROM tabelpenduduk
		  INNER JOIN tabelkeluarga
		  ON tabelkeluarga.`id_keluarga` = tabelpenduduk.`id_keluarga`
          INNER JOIN tabelalamat 
          ON tabelalamat.`id_alamat` = tabelpenduduk.`id_alamat` 
          WHERE tabelpenduduk.`id_penduduk` = '$id_penduduk' ";

  	$response = $conn->query($query);

    if (mysqli_num_rows($response) > 0) {
    	while($data = $response->fetch_assoc()) {
			$foto = $data['foto'];
			$nama = $data['nama'];
			$tempat_lahir = $data['tempat_lahir'];
			$date_source = $data["tanggal_lahir"];
			$date = new DateTime($date_source);
			$tanggal_lahir = $date->format('d-m-Y');
			$no_hp = $data['no_hp'];
			$email = $data['email'];
			$jenis_kelamin = $data['jenis_kelamin'];
			$agama = $data['agama'];
			$nik = $data['nik'];
			$id_keluarga = $data['id_keluarga'];
			$status_perkawinan = $data['status_perkawinan'];
			$status_dlm_keluarga = $data['status_dlm_keluarga'];

			$id_alamat = $data['id_alamat'];
			$alamat = 
			'No. Rumah. ' . $data['no_rumah'] . 
			', Blok. ' . $data['blok'] . 
			', RT/RW. ' . $data['rt'] . '/' . $data['rw'] .
			', Desa. ' . $data['desa'] . 
			', Kec. ' . $data['kecamatan'] . 
			', Kab. ' . $data['kabupaten'];

			$username = $data['nama_pengguna'];
			$kata_sandi = $data['kata_sandi'];

			$no_kk = $data['no_kk'];
    	}    
    }
?>

<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-70px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<!-- Row Satu -->

<div class="row">
	<div class="banner-profile">
		<div class="col-lg-3">
			<img src="<?php echo $foto; ?>" class="img-thumbnail" id="image_upload_preview">
		</div>
	</div>
	<div class="col-lg-6">
		<h2>
			<?php echo $nama ?>
		</h2>
		<div>
			<?php echo $email ?>
		</div>
	</div>
	<div class="col-lg-3" >
		<div style="text-align: right; margin-top: 20px; margin-bottom: 10px;" >
		<a id="edit" class="btn btn-primary"
			data-id_penduduk_edit="<?php echo $id_penduduk?>" role="button">
			<span> <img src='../img/ic_edit_white.png' height='18'> </span>EDIT PROFILE
		</a>
		</div>
	</div>
	<div class="col-lg-12">
		<hr>
	</div>

	<div class="col-lg-7">
		<div>
			<h3>Informasi Profil</h3>
			<hr>
		</div>
		<table style="border: 1.5px solid #80808040" class="table table-striped table-responsive">
			<tr>
				<td width="240px">Nomor Induk Kependudukan</td>
				<td width="10px">:</td>
				<td>
					<?php echo $nik ?>
				</td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
					<b><?php echo $nama ?></b>
				</td>
			</tr>
			<tr>
				<td><i>Username</i></td>
				<td>:</td>
				<td>
					<?php echo $username ?>
				</td>
			</tr>
			<tr>
				<td>Nomor Handphone</td>
				<td>:</td>
				<td>
					<a href="tel:<?php echo $no_hp ?>"><?php echo $no_hp ?></a>
				</td>
			</tr>
			<tr>
				<td>Alamat Email</td>
				<td>:</td>
				<td>
					<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td>
					<?php echo $tempat_lahir ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php echo $tanggal_lahir ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $jenis_kelamin ?>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<?php echo $agama ?>
				</td>
			</tr>
			<tr>
				<td>Alamat Lengkap</td>
				<td>:</td>
				<td>
					<?php echo $alamat ?>
				</td>
			</tr>
			<tr>
				<td>Nomor Kartu Keluarga</td>
				<td>:</td>
				<td>
					<?php echo $no_kk ?>
				</td>
			</tr>
			<tr>
				<td>Status Perkawinan</td>
				<td>:</td>
				<td>
					<?php echo $status_perkawinan ?>
				</td>
			</tr>
			<tr>
				<td>Status Dalam Keluarga</td>
				<td>:</td>
				<td>
					<?php echo $status_dlm_keluarga ?>
				</td>
			</tr>
		</table>
	</div>

	<div class="col-lg-5">
		<div>
			<h3>Anggota Keluarga</h3>
			<hr>
		</div>
		<div class="row">
		<?php 
				$query_keluarga = "SELECT * FROM `tabelpenduduk` WHERE id_keluarga='$id_keluarga' AND id_penduduk != '$id_penduduk' ";

				$response = $conn->query($query_keluarga);
				if (mysqli_num_rows($response) > 0) {
					while($row = $response->fetch_assoc()) {
						$foto = $row["foto"];
						?>
						<div class="col-lg-6">
							<div class="thumbnail">
								<img src="<?php echo $foto ?>" alt="photo_profile">
								<div class="caption">
									<h4><b><?php echo $row['nama'] ?></b></h4>
									<p><?php echo $row['status_dlm_keluarga'] ?></p>
									<p><a style="width: 100%;" id="detail" class="btn btn-primary" data-id_penduduk_detail="<?php echo $row['id_penduduk']?>" role="button">Lihat Profil</a></p>
								</div>
							</div>
						</div>
					<?php
					}
				}
			?>
			
		</div>
	</div>
</div>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/ripple.js"></script>

<script>
	function backToHome(params) {
		$('#tambah_link').hide();
		if ($('#data').load('tabel.php')) {
			$('#data').fadeIn();
		}
	}

	$(document).on("click", "#detail", function () {
  
		var id = $(this).data('id_penduduk_detail');

		$('.loading').fadeOut('fast', function () {
			$('#data').load('detail.php?id='+id);
			$("body, html").animate({
				scrollTop: $("#dataContainer").position().top
			});
		});

	});

	$(document).on("click", "#edit", function () {
  
		var id = $(this).data('id_penduduk_edit');

		$('.loading').fadeOut('fast', function () {
			$('#data').load('input_edit.php?id='+id);
			$('#data').fadeIn();
		});

	});
</script>

