<div align="right" style="float:right; display:inline-block; margin-right : 50px; margin-top:-90px;" id="floating">
	<a onclick="backToHome()" data-ripple class="btn-floating btn-large">
		<img id="floating" src="../img/ic_close.png" width="15" height="15">
	</a>
</div>

<h3>Tambah Penduduk</h3>

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

	<div class="form-inline" >
	<br><div class="text-danger">
		*Harap isi semua data.
		</div>
		<div align="right">
			<button id="simpan" type="submit" class="btn btn-success" style="width: 100px;">Simpan</button>
			<button onclick="backToHome()" type="button" class="btn btn-default">Batal</button>
		</div>
	</div>

	</form>

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

		url        : "simpan.php",
		data       : $("#form").serialize(),
		type       : "POST", 
		async      : false,
		cache	   : false,
		success    : function(resps){
			//sukses disini yaitu sukses dalam arti respon nya berjalan dengan benar
			//bukan sukses nyimpnenya, nyimpennya mah belum tentu

			//jadi di file simpan.php saya berikan :
				// output sukses jika (sukses)
				// gagal jika (gagal/error nyimpennya)
				
			//nah sekarang tinggal nangkep output sukses / gagal nya itu :
			if(resps != 'sukses'){

				alert('Gagal menyimpan ke database, terdapat kesalahan!');

			}
		},
		error 		: function (error) {
			alert(error)
		}

	});

});

</script>
