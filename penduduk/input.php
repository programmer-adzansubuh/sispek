<script>
$(document).ready(function(){

	$('#for-load-rayon').load('for_load_rayon.php');

	$("#iBaru").hide();
	$("#bSimpanBaru").hide();
	$("#bBatalSimpan").hide();
	$("#title2").hide();
	$("#container-atrr").hide();


    $("#bBaru").click(function(){

    	$("#form").slideUp();
    	$("#ft").slideUp();
        $("#bSimpanBaru").fadeIn();
        $("#bBatalSimpan").fadeIn();
        $("#title2").fadeIn(1000);
        $("#iBaru").fadeIn(2000);
        $("#container-atrr").show();



    });

    $("#bBatalSimpan").click(function(){

    	$("#form").slideDown();
    	$("#ft").slideDown();


    	$("#iBaru").hide();
    	$("#bSimpanBaru").hide();
    	$("#container-atrr").hide();

		$("#bBatalSimpan").hide();

		$("#sNilai").fadeIn(500);
        $("#sKeterangan").fadeIn(1000);
        $("#sFoto").fadeIn(1500);
        $("#sSimpan").fadeIn(1700);
        $("#sBatal").fadeIn(2000);

        $("#title2").hide();
    });

    $("#bSimpanBaru").click(function() {

    	$.ajax({
    		url: 'spesifikasi_atribut_simpan.php',
    		type: 'POST',
    		dataType: 'html',
    		data: {namaselect: $('#iBaru').val()},
    	})
    	.done(function() {
    		console.log("success");
    		$("#form").slideDown();
    		$("#ft").slideDown();
	    	$("#iBaru").hide();
	    	$("#iBaru").val();
	    	$("#bSimpanBaru").hide();
			$("#bBatalSimpan").hide();
			$("#sNilai").fadeIn(500);
	        $("#sKeterangan").fadeIn(1000);
	        $("#sFoto").fadeIn(1500);
	        $("#sSimpan").fadeIn(1700);
	        $("#sBatal").fadeIn(2000);
	        $("#title2").hide();
	        $('#for-load-rayon').load('for_load_rayon.php');
	        $('#selected').hide();
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	.always(function() {
    		console.log("complete");
    	});


    });

});

</script>



<br><br>

<form id="form" method="post" action="simpan.php" enctype="multipart/form-data">

<div class="col-md-8">
    <div class="panel" style="padding: 20px; margin: 0px auto;" >

		<h3>Tambah Admin Rayon</h3>
		<br>

		<div class="form-inline">

			<p id="title"><b>Status : <font color="red"> *  </font></b></p>

			<span>
				<select name="status" id="status" class="form-control" required>
					<option value="1">Active</option>
					<option value="0">Non-Active</option>
				</select>
			</span>

		</div>
		<br>
		<br>
		<div class="form-inline">

				<p id="title"><b>Unit Rayon : <font color="red"> *  </font></b></p>
				<span id="for-load-rayon"></span>

		</div>
			<br>
			<br>

			<div class="group" style="width: 300px;">
				<input type="text" name="no_induk" class="inputs" id="no_induk" required>
				<span class="bar"></span>
				<label class="labels">No. Induk : </label>
			</div>

			<div class="group" style="width: 100%;">

					<input type="text" name="nama" class="inputs" required>
					<span class="bar"></span>
					<label class="labels">Nama Lengkap : <font color="red"> *  </font></label>
			</div>

			<div class="group" style="width: 100%;">

					<input type="text" name="email" class="inputs" required>
					<span class="bar"></span>
					<label class="labels">Email : <font color="red"> *  </font></label>
			</div>

			<div class="group" style="width: 300px;">

					<input type="number" name="hp" class="inputs" required>
					<span class="bar"></span>
					<label class="labels">No. Telepon : </label>
			</div>
			

			<div class="group" style="width: 300px;">

					<input type="password" name="password" class="inputs" required>
					<span class="bar"></span>
					<label class="labels">Kata Sandi : <font color="red"> *  </font></label>
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

		</div>
		</div>

	</form>

	<br><br>

	</div>

  </div>

<script src="../js/bootstrap.min.js"></script>
 <script src="../js/sidebar.js"></script>
 <script src="../js/jquery-3.2.1.min.js"></script>

   <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ripple.js"></script>


<script type="text/javascript">

	Array.prototype.forEach.call(document.querySelectorAll('[data-ripple]'), function(element){
	  new RippleEffect(element);
	});


	Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function(element){
	  new RippleEffectDark(element);
    });
    

});

$(document).on('click','#backToHome',function () {

$('#view-data').hide();

$('#tabelView').show();

});

    </script>
</html>
