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

			<div class="panel">
				<div align="center">
					<img src="../img/person_grey.png" style="width:auto; height:140px; padding:10px" id="image_upload_preview">
					<input type="file" name="foto" id="inputFile" class="btn btn-default" style="width:100%;">
				</div>
			</div>

			<br>

			<div class="group">
				<input type="text" id="nama" class="inputs" required>
				<span class="bar"></span>
				<label class="labels">Nama Lengkap :</label>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="group">
						<input type="text" id="tempat_lahir" class="inputs" required>
						<span class="bar"></span>
						<label class="labels">Tempat Lahir :</label>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="group">
						<input type="date" id="tanggal_lahir" class="inputs" style="z-index: 1; padding-bottom: 4px;">
						<span class="bar"></span>
						<label class="labels">Tanggal Lahir :</label>
					</div>
				</div>
			</div>

			<div class="group">
				<input type="number" id="no_hp" class="inputs" required>
				<span class="bar"></span>
				<label class="labels">Nomor Handphone :</label>
			</div>

			<div class="group">
				<input type="text" id="email" class="inputs" required>
				<span class="bar"></span>
				<label class="labels">Alamat Email :</label>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="group">
						<select name="jenis_kelamin" id="jenis_kelamin" class="inputs">
							<option disabled selected>- Pilih Jenis Kelamin-</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<span class="bar"></span>
						<label class="labels">Jenis Kelamin :</label>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="group">
						<select name="agama" id="agama" class="inputs">
							<option disabled selected>- Pilih Agama-</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen Protestan</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Budha">Katolik</option>
							<option value="Hindu">Kong Hu Cu</option>
						</select>
						<span class="bar"></span>
						<label class="labels">Agama :</label>
					</div>
				</div>
			</div>
	</div>
	<!-- Akhir Row Satu -->

	<!-- Row Dua -->
	<div class="col-lg-6">

		<div class="group ">
			<input type="number" id="nik" class="inputs" id="no_induk" required>
			<span class="bar"></span>
			<label class="labels">NIK : </label>
		</div>

		<br>

		<div class="row">
			<div class="col-lg-6">
				<div class="group">
					<select name="status_perkawinan" id="status_perkawinan" class="inputs">
						<option disabled selected>- Pilih Status-</option>
						<option value="Kawin">Kawin</option>
						<option value="Belum Kawin">Belum Kawin</option>
						<option value="Duda/Janda">Duda/Janda</option>
					</select>
					<span class="bar"></span>
					<label class="labels">Status Perkawinan :</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group">
					<select name="status_dalam_keluarga" id="status_dalam_keluarga" class="inputs">
						<option disabled selected>- Pilih Status-</option>
						<option value="Anak">Anak</option>
						<option value="Kepala Keluarga">Kepala Keluarga</option>
						<option value="Istri">Istri</option>
					</select>
					<span class="bar"></span>
					<label class="labels">Status Dalam Keluarga :</label>
				</div>
			</div>
		</div>

		<div id="for-anak-istri">
			<div class="labels-fixed">Pilih Nomor KK / Nama Kepala Keluarga. :</div>
			<div class="group">
				<input type="number" id="kkView" class="inputs" required readonly>
				<span class="bar"></span>
			</div>
		</div>
		<div id="for-kk">
			<div class="labels-fixed">Tambah Nomor KK :</div>
			<div class="group">
				<input type="number" id="nomor_kk" class="inputs" required>
				<span class="bar"></span>
			</div>
		</div>

		<input type="number" id="id_keluarga" class="hidden" required>

		<div class="labels-fixed">Pilih Alamat :</div>
		<div class="group">
			<textarea type="text" class="inputs" id="alamatView" readonly required></textarea>
			<span class="bar"></span>
		</div>

		<!-- for id alamat -->
		<input type="text" id="alamat" class="hidden">

		<div class="row">
			<div class="col-lg-6">
				<div class="group">
					<input type="text" id="nama_pengguna" class="inputs" required>
					<span class="bar"></span>
					<label class="labels">Username :</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group">
					<input type="password" id="kata_sandi" class="inputs" required>
					<span class="bar"></span>
					<label class="labels">Password : </label>
				</div>
			</div>
		</div>
		
		<br><br>

		<div class="form-inline">
			<br>
			<div class="text-danger">
				*Harap isi semua data.
			</div>
			<div align="right">
				<button id="save" type="button" class="btn btn-success" style="width: 100px;"><b>SIMPAN</b></button>
				<button onclick="backToHome()" type="button" class="btn btn-default">BATAL</button>
			</div>
		</div>

		</form>



	</div>
</div>
<!-- Akhir Row Dua -->

<script src="../js/bootstrap.min.js"></script>
<script src="../js/ripple.js"></script>
<script>

	function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#image_upload_preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
	}

	$("#inputFile").change(function () {
        readURL(this);
    });
	//buat function untuk tombol back
	function backToHome(params) {

		$('#tambah_link').hide();

		if ($('#data').load('tabel.php')) {
			$('#data').fadeIn();
		}
	}

	$('#status_perkawinan').change(function() {
		switch (this.value) {
			case 'Belum Kawin':
				$('#status_dalam_keluarga').val('Anak');
				break;
			case 'Kawin':
				$('#status_dalam_keluarga').val('- Pilih Status -');
				break;
			case 'Duda/Janda':
				$('#status_dalam_keluarga').val('- Pilih Status -');
				break;
			default:
				break;
		}
	});

	$('#for-kk').hide();
	$('#status_dalam_keluarga').change(function() {
		switch (this.value) {
			case 'Anak':
				$('#for-kk').hide();
				$('#for-anak-istri').show();
				break;
			case 'Kepala Keluarga':
				$('#for-kk').show();
				$('#for-anak-istri').hide();
				if ($('#status_perkawinan').val() == 'Belum Kawin' ) {
					$('#status_perkawinan').val(0);
				}
				break;
			case 'Istri':
				$('#for-kk').hide();
				$('#for-anak-istri').show();
				if ($('#status_perkawinan').val() == 'Belum Kawin' ) {
					$('#status_perkawinan').val(0);
				}
				break;
			default:
				break;
		}
	});

	//aksi simpan
	$('#save').click(function () {

		var formData = new FormData();
		formData.append('foto', $('#inputFile')[0].files[0]);
		formData.append('nik', $('#nik').val() );
		formData.append('nama', $('#nama').val() );
		formData.append('tempat_lahir', $('#tempat_lahir').val() );
		formData.append('tanggal_lahir', $('#tanggal_lahir').val() );
		formData.append('no_hp', $('#no_hp').val() );
		formData.append('email', $('#email').val() );
		formData.append('status_perkawinan', $('#status_perkawinan').val() );
		formData.append('status_dalam_keluarga', $('#status_dalam_keluarga').val() );
		formData.append('id_keluarga', $('#id_keluarga').val() );
		formData.append('jenis_kelamin', $('#jenis_kelamin').val() );
		formData.append('agama', $('#agama').val() );
		formData.append('nama_pengguna', $('#nama_pengguna').val() );
		formData.append('kata_sandi', $('#kata_sandi').val() );
		formData.append('id_alamat', $('#alamat').val() );
		formData.append('nomor_kk', $('#nomor_kk').val() );
		
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
								window.location = "../penduduk";
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


	$(document).on('click', '#tambahAlamat', function () {
		$('#modalTambah').modal();

		$('#simpanAlamat').click(function () {

			var no_rumah = $('#no_rumah').val(); 
			var blok = $('#blok').val(); 
			var rt = $('#rt').val(); 
			var rw = $('#rw').val();
			var desa = $('#desa').val();
			var kecamatan = $('#kecamatan').val();
			var kabupaten = $('#kabupaten').val();

			$.ajax({
				url: 'simpan_alamat.php',
				type: 'POST',
				dataType: 'html',
				data: {
					no_rumah: no_rumah, 
					blok: blok, 
					rt: rt, 
					rw: rw,
					desa: desa,
					kecamatan: kecamatan,
					kabupaten: kabupaten
					},
			})
			.done(function(resp) {
				console.log("response "+resp);
				if (resp != 0) {
					//berhasil
					$('#alamatView').val(
						'No. Rumah. ' + no_rumah + 
						', Blok. ' + blok + 
						', RT/RW. ' + rt + '/' + rw + 
						', Desa. ' + desa + 
						', Kec. ' + kecamatan + 
						', Kab. ' + kabupaten);

					$('#alamat').val(resp);

					$('.modal').not($(this)).each(function () {
						$(this).modal('hide');
					});

				} else {
					alert('Terjadi kesalahan, Gagal menyimpan alamat.');
				}
			})
			.fail(function() {
				console.log("error ");
				$.alert({
							title: 'Failure!'
						});
			})
			.always(function() {
				console.log("complete");
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

	$("#kkView").click(function () {
		$('#modalPilihKK').modal();
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
								<input type="text" id="no_rumah" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">No. Rumah :</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="group">
								<input type="text" id="blok" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Blok :</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="group">
								<input type="text" id="rt" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">RT :</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="group">
								<input type="text" id="rw" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">RW :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" id="desa" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Desa/Kelurahan :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" id="kecamatan" class="inputs" required>
								<span class="bar"></span>
								<label class="labels">Kecamatan :</label>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="group">
								<input type="text" id="kabupaten" class="inputs" value="Bekasi" required>
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
						<th bgcolor="#a9daba" width="20px">Pilih</th>
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
					var tableData = <?php echo json_encode($result) ?>;
					var scrollValue = false;

					if ($(window).width() < 700) {
						scrollValue = true;
					}

					var table = $('#tabel_alamat').DataTable({
						data: tableData,
						responsive: true,
						"aoColumnDefs": [{ "bSortable": false, "aTargets": [7] }]
					});

					$( table.column( 7 ).nodes() ).addClass( 'name-highlight-green' );

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
								des + ', Kec. ' + kec + ', Kab. ' + kab) && $('#alamat').val(id)) {
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

<!-- Modal Pilih KK-->

<div class="modal fade" id="modalPilihKK">
	<div class="modal-dialog modal-md modal-dialog-centered">
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
						<th bgcolor="#a9daba" width="20px">Pilih</th>
					</thead>
				</table>

				<?php 

					require_once '../koneksi.php';

					$query = "SELECT * FROM `tabelkeluarga`
					INNER JOIN `tabelpenduduk` ON `tabelkeluarga`.id_penduduk = `tabelpenduduk`.id_penduduk
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

							"<a class='action pointer' id='get-pilih-kk' 
							data-id=".$data['id_keluarga']." 
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
						"aoColumnDefs": [{ "bSortable": false, "aTargets": [3] }]
					});

					$( table2.column( 1 ).nodes() ).addClass( 'name-highlight-blue' );
					$( table2.column( 3 ).nodes() ).addClass( 'name-highlight-green' );

					$(document).on('click', '#get-pilih-kk', function () {
						var id = $(this).data('id');
						var kk = $(this).data('nokk');
						var nama = $(this).data('namakk');
						if ($('#kkView').val(kk) && $('#id_keluarga').val(id)) {
							$("#modalPilihKK").modal('hide');
						}
					});
				</script>

				<br>
				<div class="row modal-footer">
					<div style="text-align:left;">
						<span class="text-danger">Jika Nomor KK / Nama Kepala Keluarga tidak ditemukan, silahkan input Kepala keluarga terlebih dahulu.</span>
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