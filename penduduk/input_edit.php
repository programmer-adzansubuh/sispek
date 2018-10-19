<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-90px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<?php

$id = $_GET['id'];

?>

<h3>Edit Penduduk <?php echo "(".$id.")" ?></h3>

<br>
<br>

<form id="form" method="POST" action="" enctype="multipart/form-data">
	<div class="group">
		<input type="text" name="nik" class="inputs" id="no_induk" required>
		<span class="bar"></span>
		<label class="labels">NIK : </label>
	</div>

	<div class="group">
		<input type="text" name="nama" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Nama Lengkap :</label>
	</div>

	<div class="group">
		<input type="text" name="tempat_lahir" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Tempat Lahir :</label>
	</div>

	<div class="group">
		<span style="margin-left:5px; font-size: 12px; color: #03A9F4;">Tanggal Lahir : </span>
		<input type="date" name="tanggal_lahir" class="inputs" required>
		<span class="bar"></span>
	</div>

	<div class="group">
		<input type="number" name="no_hp" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Nomor Handphone :</label>
	</div>

	<div class="group">
		<input type="text" name="status_perkawinan" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Status Perkawinan :</label>
	</div>

	<div class="group">
		<input type="text" name="status_dalam_keluarga" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Status Dalam Keluarga :</label>
	</div>

	<div class="group">
		<input type="text" name="id_keluarga" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Nomor KK / Nama KK :</label>
	</div>

	<div class="group">
		<input type="text" name="jenis_kelamin" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Jenis Kelamin :</label>
	</div>

	<div class="group">
		<input type="text" name="agama" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Agama :</label>
	</div>

	<div class="group">
		<input type="text" name="nama_pengguna" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Username :</label>
	</div>


	<div class="group">
		<input type="password" name="kata_sandi" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Password : </label>
	</div>

	<input type="text" name="id_alamat" class="inputs" required>
	<button type="button" class="btn btn-primary" id="tambahAlamat">
		Tambah Alamat</button>

	<div class="form-inline">
		<br>
		<div class="text-danger">
			*Harap isi semua data.
		</div>
		<div align="right">
			<button id="simpan" type="submit" class="btn btn-success" style="width: 100px;">Simpan</button>
			<button onclick="backToHome()" type="button" class="btn btn-default">Batal</button>
		</div>
	</div>

</form>





<!-- Modal -->

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
				<h4 class="modal-title">Tambah Alamat</h4>
			</div>
			<div class="modal-body">

				<br>

				<form action="">

					<div class="row">

						<div class="col-lg-4">
							<div class="group">
								<input type="text" name="no_rumah" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">No. Rumah :</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="group">
								<input type="text" name="jenis_kelamin" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Blok :</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="group">
								<input type="text" name="jenis_kelamin" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">RT :</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="group">
								<input type="text" name="jenis_kelamin" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">RW :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" name="jenis_kelamin" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Desa/Kelurahan :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" name="jenis_kelamin" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Kecamatan :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" name="jenis_kelamin" class="inputs" value="Bekasi" required>
								<span class="bar"></span>
								<label class="labels">Kabupaten :</label>
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<button id="simpanAlamat" type="submit" value="Simpan" class="btn btn-primary" style="width: 120px;">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>

<!-- Akhir Modal -->





<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
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


	//aksi simpan
	$('#form').submit(function () {

		$.ajax({

			url: "simpan.php",
			data: $("#form").serialize(),
			type: "POST",
			async: false,
			cache: false,
			success: function (resps) {
				//sukses disini yaitu sukses dalam arti respon nya berjalan dengan benar
				//bukan sukses nyimpnenya, nyimpennya mah belum tentu

				//jadi di file simpan.php saya berikan :
				// output sukses jika (sukses)
				// gagal jika (gagal/error nyimpennya)

				//nah sekarang tinggal nangkep output sukses / gagal nya itu :
				if (resps != 'sukses') {

					alert('Gagal menyimpan ke database, terdapat kesalahan! (ini error nya : ' + resps + ')');

				}
			},
			error: function (error) {
				alert(error)
			}

		});

	});


	$(document).on('click', '#tambahAlamat', function () {
		$('#modalTambah').modal();


		$('#sSimpan').click(function () {


			var data = new FormData();

			var ket = $("#ket").val();

			jQuery.each(jQuery('#foto')[0].files, function (i, file) {

				data.append('foto', file);
				data.append('text', ket);

			});

			var values = data;

			$.ajax({

				url: "header_simpan.php",
				data: values,
				cache: false,
				contentType: false,
				processData: false,
				type: "POST",
				success: function (resp) {

					$('.modal').not($(this)).each(function () {
						$(this).modal('hide');
					});

					$('#tabel').load('header_tampil_tabel.php');

					$('html,body').animate({
						scrollTop: document.body.scrollHeight
					}, "fast");

				},
				error: function (resp) {

					alert("some error occured !");
				}
			});
		});

	});



	$('.modal').on('show.bs.modal', function () {
		$('.modal').not($(this)).each(function () {
			$(this).modal('hide');
		});


	});
</script>