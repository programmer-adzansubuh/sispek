<!DOCTYPE html>

<html>
<head>
	<title>P2TL Admin</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../js/dataTables/dataTables.bootstrap.css">
<script src="../js/ripple.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
<script src="../js/dataTables/jquery.dataTables.js"></script>

<?php

$title = "Data Penduduk";

?>

<style type="text/css">

.icon-flipped {
    transform: scaleX(-1);
    -moz-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    -ms-transform: scaleX(-1);
}

#snackbar {
    visibility: hidden;
    min-width: 250px;
    background-color: rgba(88,88,88, .7);
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

.p{
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
    transition: all 0.4s ease 0s;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
}
.p_active{
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
  transition: all 0.4s ease 0s;
}

.fade-custom {
    opacity: 0.2;
    transition: opacity .25s ease-in-out;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;
}
.fade-clear {
    transition: opacity .25s ease-in-out;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;
}

</style>

<script type="text/javascript">

  $(document).ready(function(){

                var level = '<?php echo $level; ?>';
                
                if (level == 'admin') {
                    $('.for-admin-super').css({display: 'none'});
                }

                if (level == 'superadmin') {
                    $('.for-admin-rayon').css({display: 'none'});
                }  


            });

    $("#drop").hide();

    $(document).on("click", function () {
        $("#drop").hide();
    });


	$(document).ready(function(){

            $('.more').click(function(event){
                event.stopPropagation();
                $("#drop").slideToggle("fast");

            });

            $("#drop").on("click", function (event) {
                event.stopPropagation();
            });

        /* OPEN MENU DESKTOP */

        $('.open-menu').click(function(){

            $('#sidebar').toggleClass("sidebar-wrapper-close");
            $('#sidebar').toggleClass("sidebar-wrapper");
            $('#wrap').toggleClass("wrapper-close");
            $('#wrap').toggleClass("wrapper");

        });

        $('#b-search').click(function(){
            $('.box-search').css({opacity: 1, width: 300});
            $('.box-search').focus();

        });

        $(document).on('blur', '.box-search', function(){
            $(this).css({opacity: 0, width: -100});
            $(this).focusout();
        });

        /* OPEN MENU MOBILE */
        $('.close-menu-mobile').css({display: 'none',transition: 'all 0.4s ease 0s' });
        $('.open-menu-mobile').click(function(){

            $(this).css({display: 'none'});
            $('.menu-mobile-close').css({display: 'block'});
            $('.close-menu-mobile').css({display: 'block'});

            $('.sidebar-wrapper-mobile').css({top: 60, left: 250, position:'fixed'});

        });

        /* CLOSE MENU MOBILE */

        $('.close-menu-mobile').click(function(){

            $(this).css({display: 'none'});
            $('.open-menu-mobile').css({display: 'block'});

            $('.sidebar-wrapper-mobile').css({top: 60, left: 0, position:'fixed'});

        });

        $('#page-content-wrapper').click(function(){

            $('.close-menu-mobile').css({display: 'none'});
            $('.open-menu-mobile').css({display: 'block'});

            $('.sidebar-wrapper-mobile').css({top: 60, left: 0, position:'fixed'});

        });


        $('.jum').hide();

        var jumlah_pesanan = $('.jum').val();
        if(jumlah_pesanan == "0"){
            $('.mybadge').hide();
        }else{
            $('.mybadge').fadeIn(3000);
        }


        $('#floating').hide();

        $('.arrow').click(function() {

            $(".icon").toggleClass("p_active");
            $(".icon").toggleClass("p");

		});

        $('.arrow2').click(function() {

            $(".icon2").toggleClass("p_active");
            $(".icon2").toggleClass("p");

        });


		$.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });

		$('#tabelView').hide();
        $('#floating').fadeIn();
        $('#edit_link').hide();
        $('#tambah_link').hide();

		if ($('#tabel').load('tabel.php')) {

			$('#tabelView').fadeIn(1500);
		}


	});


	$(document).ready(function() {

			  $('#number').bind("cut copy paste drag drop", function(e) {
			      e.preventDefault();
			  });

		});


</script>

</head>
<body>

<div id="navbar-custom">
    <div style=" display:inline-block"  >
        <ul class="navbars">
            <li class="menu">
                <a href="#" data-ripple class="open-menu">
                    <img class="first-child" src="../img/ic_menu_white.png" height="60" style="width: 60px;  padding :17px;" />
                    <img class="last-child" src="../img/ic_menu_white_hover.png" height="60" style="width: 60px;  5px; padding : 8px;"/>
                </a>
            </li>
            <li class="menu-mobile">
                <a href="#" data-ripple class="open-menu-mobile">
                    <img class="first-child" src="../img/ic_menu_white.png" height="60" style="width: 60px;  padding :17px;" />
                    <img class="last-child" src="../img/ic_menu_white_hover.png" height="60" style="width: 60px; 5px; padding : 8px;"/>
                </a>
            </li>
            <li class="menu-mobile-close">
                <a href="#" data-ripple class="close-menu-mobile" style="margin-top: -20px;">
                    <img class="first-child" src="../img/ic_close_white.png" height="60" style="width: 60px; padding :17px;" />
                    <img class="last-child" src="../img/ic_close_white_hover.png" height="60" style="width: 60px; padding : 8px;"/>
                </a>
            </li>
        </ul>

        <ul class="navbars">
            <li class="title">
                <h3 style="margin-top: 17px;"><font color="#fff"><?php echo $title; ?></font></h3>
            </li>
            <li>
                <h4 style="margin-top: 20px;"  class="title-small"><font color="#fff">P2TL</font></h4>
            </li>
        </ul>

    </div>

    <div style=" display:inline">

        <ul class="bars">

            <li>
                <input class="box-search" type="text" placeholder="Pencarian.."/>
            </li>

            <li>
                <a id="b-search" href="#" data-ripple class="" class="text"> <img src="../img/ic_search.png" width="26"/></a>
            </li>
            <li>
                <a href="#" data-ripple class="more" style="margin-left: -20px;"  ><img src="../img/ic_account-circle.png" width="26"/> <img src="../img/ic_more.png" width="26"/></a>
            </li>

        </ul>

    </div>
    </div>

        <div id="drop" class="dropdown-content">
        <a href="../_profil">Profil</a>
            <a href="#pengaturan">Pengaturan</a>
            <a href="../logout.php" onclick="return confirm('Yakin ingin Keluar?')">Keluar</a>
        </div>

<div class="wrapper" id="wrap">

<!-- SIDEBAR FOR DESKTOP -->

 <div class="sidebar-wrapper" id="sidebar">
        <div >
        <div align="center" style="display: block; padding-bottom: 10px; vertical-align: top; padding-top: 20px;  background-color: #b5b5b5;">

            <img  style="display: inline-block; " src="../img/bapptl.png" height="100">

        </div>
            <br>
            <ul class="nav">
                <small style="margin-left: 20px;"><font color="#d1d1d1">NAVIGASI OPSI</font></small>
                <li >
                    <a href="../_dashboard" data-ripple-dark >
                        <img class="first-child" src="../img/ic_dashboard_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../img/ic_dashboard.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Dashboard</font>
                    </a>
                </li>
                <li>
                    <a href="../_hasil" data-ripple-dark >
                        <img class="first-child" src="../img/ic_hasil_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../img/ic_hasil.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text">Hasil Pemeriksaan</font>
                    </a>
                </li>
                <li class="for-admin-rayon">
                    <a href="../_petugas" data-ripple-dark >
                        <img class="first-child" src="../img/ic_admin_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../img/ic_admin_in.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text">Data Petugas</font>
                    </a>
                </li>
                
                <li class="for-admin-super">
                        <a href="../_rayon" data-ripple-dark >
                            <img class="first-child" src="../img/ic_store_out.png" height="25px" style="margin-right: 5px;" />
                            <img class="last-child" src="../img/ic_store.png" height="25px" style="margin-right: 5px;" />
                            <font color="#8c8c8c" class="text">Unit Rayon</font>
                        </a>
                </li>
                <li class="for-admin-super">
                        <a href="../_admin" data-ripple-dark >
                            <img class="first-child" src="../img/ic_admin_out.png" height="25px" style="margin-right: 5px;" />
                            <img class="last-child" src="../img/ic_admin_in.png" height="25px" style="margin-right: 5px;" />
                            <font color="#8c8c8c" class="text">Data Admin</font>
                        </a>
                    </li>
                <li>
                        <a href="../_laporan" data-ripple-dark >
                            <img class="first-child" src="../img/ic_laporan_out.png" height="25px" style="margin-right: 5px;" />
                            <img class="last-child" src="../img/ic_laporan.png" height="25px" style="margin-right: 5px;" />
                            <font color="#8c8c8c" class="text"> Buat Laporan </font>
                        </a>
                    </li>
                <hr>
                <a href="#"><div style="margin-left: 30px;">&#9432 <small>Bantuan & Tentang</small></div></a>
            </ul>

        </div>
    </div>


  	<div id="page-content-wrapper">
          <div>
              <div><br>
                 <h2><?php echo $title; ?></h2>
                  <font size="2px" color="#B1B1B1"><p>> <a href="#">Home</a> /   <a href="#"> <?php echo $title; ?></a> <a id="edit_link" href="#"> > Lihat & Edit</a> <a id="tambah_link" href="#"> > Tambah</a> </p></font>

                      <div align="right" style="float:right; display:inline-block; margin-right : 70px;" id="floating">
                          <a id="launchModalBtn" data-ripple class="btn-floating btn-large">
                              <img id="floating" src="../img/ic_add.png" width="15" height="15">
                          </a>
                      </div>
              </div>

            <div id="tabelView" class="panel" style='padding-left: 20px; padding-right: 20px; margin-top:40px; padding-top: 40px; padding-bottom: 20px;'>
                <div id="tabel"></div>
            </div>

            <div id="view-data"></div>

            <div> <div id="snackbar">Penyimpanan berhasil..</div> </div>
          </div>
    </div>

</div>

</body>

    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ripple.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.js"></script>
    <script src="../js/dataTables/jquery.dataTables.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	Array.prototype.forEach.call(document.querySelectorAll('[data-ripple]'), function(element){
	  new RippleEffect(element);
	});


	Array.prototype.forEach.call(document.querySelectorAll('[data-ripple-dark]'), function(element){
	  new RippleEffectDark(element);
    });

});


$(document).on('click','#launchModalBtn',function () {

    $('#view-data').slideUp();
    $('#floating').hide();
    $('#tambah_link').show();

    if ($('#view-data').load('input.php')) {
        $('#view-data').fadeIn();
    }

    $('#tabelView').hide();

});

    </script>
</html>