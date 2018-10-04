<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-90px;" id="floating">
	<a id="btnCencel" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<form id="form" method="post" action="simpan.php" enctype="multipart/form-data">

<h3>Tambah Penduduk</h3>

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
		<input type="text" name="nama" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Tempat Lahir :</label>
	</div>

	<div class="group">
		<span style="margin-left:5px; font-size: 12px; color: #03A9F4;">Tanggal Lahir : </span>
		<input type="date" name="hp" class="inputs" required>
		<span class="bar"></span>
	</div>

	<div class="group">
		<input type="number" name="hp" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Nomor Handphone :</label>
		</div>

	<div class="group">
		<input type="text" name="sts_perkawinan" class="inputs" required>
		<span class="bar"></span>
		<label class="labels">Status Perkawinan :</label>
		</div>

	<div class="group">
		<input type="text" name="sts_dlm_keluarga" class="inputs" required>
				<span class="bar"></span>
		<label class="labels">Status Dalam Keluarga :</label>
			</div>

	<div class="group">
		<input type="text" name="no_kk" class="inputs" required>
					<span class="bar"></span>
		<label class="labels">Nomor KK / Nama KK :</label>
			</div>

	<div class="group">
		<input type="text" name="jenis_kelamin" class="inputs" required>
					<span class="bar"></span>
		<label class="labels">Jenis Kelamin :</label>
			</div>


	<div class="group">
		<input type="text" name="username" class="inputs" required>
					<span class="bar"></span>
		<label class="labels">Username :</label>
			</div>
			

	<div class="group">
					<input type="password" name="password" class="inputs" required>
					<span class="bar"></span>
		<label class="labels">Password : </label>
			</div>

			<div class="form-inline" >
			<br><div class="text-danger">
				*Harap isi semua data.
				</div>
				<div align="right">
					<input id="sSimpan" type="submit" value="Simpan" class="btn btn-success" style="width: 100px;">
					<button id="backToHome" type="button" class="btn btn-default">Batal</button>
				</div>
			</div>

	</form>

<script src="../js/bootstrap.min.js"></script>
 <script src="../js/jquery-3.2.1.min.js"></script>
   <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ripple.js"></script>
<script>

$('#backToHome').click(function () {

	$('#tambah_link').hide();

	if ($('#data').load('tabel.php')) {
		$('#data').fadeIn();
	}

});

    </script>
