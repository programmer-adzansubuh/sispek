<?php

$title = "Data Penduduk";

?>
<!DOCTYPE html>
<html>
<head>
	<title>SISPEK - <?php echo $title; ?></title>
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

		$.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });

        // id continer, edit-link dll nya di hide dulu, karena data nya belum ke load
		$('#dataContainer').hide();
        $('#edit_link').hide();
        $('#tambah_link').hide();

        //buat kondisi kalo data udah di load
		if ($('#data').load('tabel.php')) {
            
            //nampilin container yang di atas di hide
			$('#dataContainer').fadeIn();

        }

        // tujuan nya supaya komponen lebih efisien, 
        // karena browser gak akan membuat html yang di hide oleh jQuery,
        // (kalo datanya udah ada baru deh browser buatin html komponen tersebut sama si jQuery)

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
        <div align="center" style="display: block; vertical-align: top; background-color: #b5b5b5;">

            <img  style="display: inline-block; width:100%; " src="../img/banner_menu.jpg">

        </div>
            <br>
            <ul class="nav">
                <small style="margin-left: 20px;"><font color="#d1d1d1">MENU NAVIGASI</font></small>
                <li >
                    <a href="../_dashboard" data-ripple-dark >
                        <img class="first-child" src="../img/ic_dashboard_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../img/ic_dashboard.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Dashboard</font>
                    </a>
                </li>
                <li>
                    <a href="../penduduk" data-ripple-dark >
                        <img class="first-child" src="../img/ic_people_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../img/ic_people_in.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Data Penduduk</font>
                    </a>
                </li>
                <li class="for-admin-rayon">
                    <a href="../kematian" data-ripple-dark >
                        <img class="first-child" src="../img/ic_kematian_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../img/ic_kematian_in.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Data Kematian</font>
                    </a>
                </li>
                
                <li class="for-admin-super">
                        <a href="../iuran" data-ripple-dark >
                            <img class="first-child" src="../img/ic_iuran_out.png" height="25px" style="margin-right: 5px;" />
                            <img class="last-child" src="../img/ic_iuran_in.png" height="25px" style="margin-right: 5px;" />
                            <font color="#8c8c8c" class="text"> Iuran Penduduk</font>
                        </a>
                </li>
                <li class="for-admin-super">
                        <a href="../berita" data-ripple-dark >
                            <img class="first-child" src="../img/ic_berita_out.png" height="25px" style="margin-right: 5px;" />
                            <img class="last-child" src="../img/ic_berita_in.png" height="25px" style="margin-right: 5px;" />
                            <font color="#8c8c8c" class="text"> Berita</font>
                        </a>
                    </li>
                <li>
                        <a href="../laporan" data-ripple-dark >
                            <img class="first-child" src="../img/ic_laporan_out.png" height="25px" style="margin-right: 5px;" />
                            <img class="last-child" src="../img/ic_laporan.png" height="25px" style="margin-right: 5px;" />
                            <font color="#8c8c8c" class="text"> Laporan </font>
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
  
              </div>

            <!-- untuk table -->
            <div id="dataContainer" class="panel" style='padding-left: 20px; padding-right: 20px; margin-top:40px; padding-top: 40px; padding-bottom: 20px;'>
                <div id="data"></div>
            </div>

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

    </script>
</html>