<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-90px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<h3>Tambah Penduduk</h3>

<br>
<br>

<!-- Row Satu -->

<div class="row">
	<div class="col-lg-6">

		<form id="form" method="POST" action="" enctype="multipart/form-data">

			<div class="group ">
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

			<div class="group" style="margin-top: -19px;">
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




	</div>
	<!-- Akhir Row Satu -->

	<!-- Row Dua -->
	<div class="col-lg-6">



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

		<div class="group">
			<textarea type="text" name="" class="inputs" id="alamatView" required></textarea>
			<span class="bar"></span>
			<label class="labels">Pilih Alamat : </label>
		</div>

		<!-- for id alamat -->
		<input type="text" name="alamat" id="alamat-for-id" class="hidden">

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



	</div>
</div>
<!-- Akhir Row Dua -->



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

		$('#simpanAlamat').click(function () {

			$.ajax({

				url: "simpan_alamat.php",
				data: $("#form-alamat").serialize(),
				type: "POST",
				async: false,
				cache: false,
				success: function (resps) {

					if (resps == 'sukses') {
						$('.modal').not($(this)).each(function () {
							$(this).modal('hide');
						});
					} else {
						alert('Gagal menyimpan ke database, terdapat kesalahan! (ini error nya : ' + resps + ')');
					}

				},
				error: function (resps) {

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


	$("#alamatView").click(function () {
		$('#modalPilihAlamat').modal();
	});
</script>





<!-- Modal Dibawah ini-->





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

				<form id="form-alamat" method="POST" action="">

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
								<input type="text" name="blok" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Blok :</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="group">
								<input type="text" name="rt" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">RT :</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="group">
								<input type="text" name="rw" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">RW :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" name="desa" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Desa/Kelurahan :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" name="kecamatan" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Kecamatan :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" name="kabupaten" class="inputs" value="Bekasi" required>
								<span class="bar"></span>
								<label class="labels">Kabupaten :</label>
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<button id="simpanAlamat" type="button" class="btn btn-primary" style="width: 120px;">
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

<!-- Modal Pilih Alamat-->

<div class="modal fade" id="modalPilihAlamat">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
				<h4 class="modal-title">Pilih Alamat</h4>
			</div>
			<div class="modal-body">

				<br>

				<table id="tabel_alamat" class="table table-responsive table-hover " width="100%">
					<thead bgcolor="#F4F4F4">
						<th>No.Rmh</th>
						<th>Blok</th>
						<th>RT</th>
						<th>RW</th>
						<th>Desa</th>
						<th>Kec</th>
						<th>Kab</th>
						<th bgcolor="#b7cbd4" width="20px">Pilih</th>
					</thead>
				</table>

				<?php 

					require_once '../koneksi.php';

					$query = "SELECT * FROM `tabelalamat` ORDER BY `id_alamat` DESC";

					$response = $conn->query($query);

					if (mysqli_num_rows($response) > 0) {

						$result = array();
						$i = 0;
						while($data = $response->fetch_assoc()) {

							$result[] = array(
							$data["no_rumah"],
							$data["blok"],
							$data["rt"],
							$data["rw"],
							$data["desa"],
							$data["kecamatan"],
							$data["kabupaten"],

							"<a class='action pointer' id='get-pilih-alamat' 
							data-id=".$data['id_alamat']." 
							data-no=".$data['no_rumah']."
							data-blok=".$data['blok']."
							data-rt=".$data['rt']."
							data-rw=".$data['rw']."
							data-des=".$data['desa']."
							data-kec=".$data['kecamatan']."
							data-kab=".$data['kabupaten'].">

							<span data-ripple><img src='../img/check_circle.png' class='icon-circle'></img></span></a>"

							);

						}

					}

					?>

				<script>
					var tableData = <?php echo json_encode($result); ?>;
					var scrollValue = false;

					if ($(window).width() < 700) {
						scrollValue = true;
					}

					$('#tabel_alamat').DataTable({
						data: tableData,
						responsive: true

					});

					$(document).on('click', '#get-pilih-alamat', function () {
						var id = $(this).data('id');
						var no = $(this).data('no');
						var blok = $(this).data('blok');
						var rt = $(this).data('rt');
						var rw = $(this).data('rw');
						var des = $(this).data('des');
						var kec = $(this).data('kec');
						var kab = $(this).data('kab');
						if ($('#alamatView').val('No. Rumah. ' + no + ', Blok. ' + blok + ', RT/RW. ' + rt + '/' + rw + ', Desa. ' +
								des + ', Kec. ' + kec + ', Kab. ' + kab) && $('#alamat-for-id').val(id)) {
							$("#modalPilihAlamat").modal('hide');
						}
					});
				</script>

				<br>
				<div class="row modal-footer">

					<div class="col-lg-6" style="text-align:left;">
						<span class="text-danger">*Centang kolom pilih untuk memilih alamat.</span>
					</div>

					<div class="col-lg-6">
						<button type="button" class="btn btn-primary float-right" data-dismiss="modal" id="tambahAlamat">Tambah Alamat</button>
					</div>

				</div>
				
			</div>
		</div>
	</div>
</div>

<!-- Akhir Modal Alamat -->