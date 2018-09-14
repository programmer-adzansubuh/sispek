<!DOCTYPE html>
<html>
<head>
	<title>Sispek</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="../js/jquery-3.3.1.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">



<?php 
  $title_data = "Data Penduduk";
?>

<script type="text/javascript">

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


        $('#floating').hide();

        $('.arrow').click(function() {

            $(".icon").toggleClass("p_active");
            $(".icon").toggleClass("p");

		});

        $('.arrow2').click(function() {

            $(".icon2").toggleClass("p_active");
            $(".icon2").toggleClass("p");

        });

		$('#tabelView').hide();
    $('#floating').fadeIn();
    $('#edit_link').hide();
    $('#tambah_link').hide();

		if ($('#tabel').load('view_table.php')) {
			  $('#tabelView').fadeIn(1500);
		}


	});


</script>
</head>

<body>

<div id="navbar-custom">
    <div style=" display:inline-block"  >
        <ul class="navbars">
            <li class="menu">
                <a href="#" data-ripple class="open-menu">
                    <img class="first-child" src="../icon/ic_menu_white.png" height="60" style="width: 60px;  padding :17px;" />
                    <img class="last-child" src="../icon/ic_menu_white_hover.png" height="60" style="width: 60px;  5px; padding : 8px;"/>
                </a>
            </li>
            <li class="menu-mobile">
                <a href="#" data-ripple class="open-menu-mobile">
                    <img class="first-child" src="../icon/ic_menu_white.png" height="60" style="width: 60px;  padding :17px;" />
                    <img class="last-child" src="../icon/ic_menu_white_hover.png" height="60" style="width: 60px; 5px; padding : 8px;"/>
                </a>
            </li>
            <li class="menu-mobile-close">
                <a href="#" data-ripple class="close-menu-mobile" style="margin-top: -20px;">
                    <img class="first-child" src="../icon/ic_close_white.png" height="60" style="width: 60px; padding :17px;" />
                    <img class="last-child" src="../icon/ic_close_white_hover.png" height="60" style="width: 60px; padding : 8px;"/>
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


    <!-- BOX SEARCH -->

    <div style=" display:inline">

        <ul class="bars">

            <li>
                <input class="box-search" type="text" placeholder="Pencarian.."/>
            </li>

            <li>
                <a id="b-search" href="#" data-ripple class="" class="text"> <img src="../icon/ic_search.png" width="26"/></a>
            </li>
            <li>
              <a href="#" data-ripple class="more" style="margin-left: -20px;"  >
                  <img src="../icon/ic_account-circle.png" width="26"/> 
                  <img src="../icon/ic_more.png" width="26"/>
              </a>
            </li>

        </ul>

    </div>

  <!--END BOX SEARCH -->

    </div>

    <!-- END NAVBAR -->

        <div id="drop" class="dropdown-content">
        <a href="#profil">Profil</a>
            <a href="#pengaturan">Pengaturan</a>
            <a href="../logout.php" onclick="return confirm('Yakin ingin Keluar?')">Keluar</a>
        </div>

<div class="wrapper" id="wrap">

<!-- SIDEBAR FOR DESKTOP -->

  <div class="sidebar-wrapper" id="sidebar">
      <div >
      <div align="center" style="display: block; padding-bottom: 10px; vertical-align: top; padding-top: 20px;  background-color: #b5b5b5;">
            <img  style="display: inline-block; " src="../icon/bapptl.png" height="100">
       </div>
            <br>
          <ul class="nav">
            <small style="margin-left: 20px;"><font color="#d1d1d1">NAVIGASI OPSI</font></small>
            <li >
                <a href="../_dashboard" data-ripple-dark >
                    <img class="first-child" src="../icon/ic_dashboard_out.png" height="25px" style="margin-right: 5px;" />
                    <img class="last-child" src="../icon/ic_dashboard.png" height="25px" style="margin-right: 5px;" />
                    <font color="black" class="text"> Dashboard</font>
                </a>
            </li>
            <li>
                <a href="../_hasil" data-ripple-dark >
                    <img class="first-child" src="../icon/ic_hasil_out.png" height="25px" style="margin-right: 5px;" />
                    <img class="last-child" src="../icon/ic_hasil.png" height="25px" style="margin-right: 5px;" />
                    <font color="#8c8c8c" class="text">Hasil Pemeriksaan</font>
                    <input type="text" class="jum" style="display: none;" value="<?php echo $daftar_pesanan ?>">
                    <span class="mybadge-lg mybadge-notif" style="float:right; margin-right: 7px;"><?php echo $daftar_pesanan; ?></span>
                </a>
            </li>
        <li id="for-admin-super">
            <li style="background-color:#f1f1f1;">
                <a href="../_rayon" data-ripple-dark >
                    <img class="first-child" src="../icon/ic_store_out.png" height="25px" style="margin-right: 5px;" />
                    <img class="last-child" src="../icon/ic_store.png" height="25px" style="margin-right: 5px;" />
                    <font color="#8c8c8c" class="text">Unit Rayon</font>
                </a>
            </li>
            <li >
                <a href="../_admin" data-ripple-dark >
                    <img class="first-child" src="../icon/ic_admin_out.png" height="25px" style="margin-right: 5px;" />
                    <img class="last-child" src="../icon/ic_admin_in.png" height="25px" style="margin-right: 5px;" />
                    <font color="#8c8c8c" class="text">Data Admin</font>
                </a>
            </li>
            <li>
                <a href="../_laporan" data-ripple-dark >
                    <img class="first-child" src="../icon/ic_laporan_out.png" height="25px" style="margin-right: 5px;" />
                    <img class="last-child" src="../icon/ic_laporan.png" height="25px" style="margin-right: 5px;" />
                    <font color="#8c8c8c" class="text"> Buat Laporan </font>
                </a>
            </li>
        </li>
            <hr>
            <a href="#"><div style="margin-left: 30px;">&#9432 <small>Bantuan & Tentang</small></div></a>
        </ul>

      </div>
  </div>

<!-- SIDEBAR FOR MOBILE -->

    <div class="sidebar-wrapper-mobile" id="sidebar-mobile">
        <div >
            <img src="../icon/header.png" height="130" style="width: 100%;" />
            <br><br>
            <ul class="nav">
                <small style="margin-left: 20px;"><font color="#d1d1d1">NAVIGASI OPSI</font></small>
                <li>
                  <a href="../_dashboard" data-ripple-dark >
                      <img class="first-child" src="../icon/ic_dashboard_out.png" height="25px" style="margin-right: 5px;" />
                      <img class="last-child" src="../icon/ic_dashboard.png" height="25px" style="margin-right: 5px;" />
                      <font color="black" class="text"> Dashboard</font>
                  </a>
              </li>
                <li>
                    <a href="../_pesanan" data-ripple-dark >
                        <img class="first-child" src="../icon/ic_shoping_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../icon/ic_shoping.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Daftar Pesanan</font>
                        <input type="text" class="jum" style="display: none;" value="<?php echo $daftar_pesanan ?>">
                        <span class="mybadge mybadge-notif" style="float:right; margin-right: 7px;"><?php echo $daftar_pesanan; ?></span>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#coll-mobile" class="arrow">

                        <img class="first-child" src="../icon/ic_store_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../icon/ic_store.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Opsi Produk</font>
                        <img value="on" class="icon" src="../icon/arrow.png" height="25px" style="margin-right: 5px; " align="right" />

                    </a>

                    <ul id="coll-mobile" class="panel-collapse nav-drop">
                        <li>
                          <a data-ripple-dark href="../_produk">
                            <font color="#8c8c8c" class="text" size="2px"> Daftar Produk</font>
                          </a>
                        </li>
                        <li>
                          <a data-ripple-dark href="../_kategori">
                            <font color="#8c8c8c" class="text" size="2px"> Kategori Produk</font>
                          </a>
                        </li>
                        <li>
                          <a data-ripple-dark href="../_spesifikasi">
                            <font color="#8c8c8c" class="text" size="2px"> Spesifkasi produk</font>
                          </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a data-toggle="collapse" href="#coll2-mobile" class="arrow2">

                        <img class="first-child" src="../icon/ic_opsi_app_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../icon/ic_opsi_app.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Opsi Aplikasi</font>
                        <img value="on" class="icon2" src="../icon/arrow.png" height="25px" style="margin-right: 5px; " align="right" />
                    </a>


                    <ul id="coll2-mobile" class="panel-collapse collapse nav-drop">
                        <li>
                          <a data-ripple-dark href="../_header">
                            <font color="#8c8c8c" class="text" size="2px"> Header</font>
                          </a>
                        </li>
                        <li>
                          <a data-ripple-dark href="../_kontak">
                            <font color="#8c8c8c" class="text" size="2px"> Kontak</font>
                          </a>
                        </li>
                        <li>
                          <a data-ripple-dark href="../_kurir">
                            <font color="#8c8c8c" class="text" size="2px"> Kurir Pengiriman</font>
                          </a>
                        </li>
                        <li >
                          <a data-ripple-dark href="../_bank">
                            <font color="#8c8c8c" class="text" size="2px"> Pilihan Bank</font>
                          </a>
                        </li>
                    </ul>
                </li>
                <hr>
                <small style="margin-left:20px;"><font color="#d1d1d1">OPSI LAINNYA</font></small>
                <li>
                    <a href="../_datapelanggan" data-ripple-dark >
                        <img class="first-child" src="../icon/ic_pelanggan_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../icon/ic_pelanggan_in.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Data Pelanggan </font>
                    </a>
                </li>
                 <li style="background-color:#f1f1f1;">
                    <a href="../_datakaryawan" data-ripple-dark >
                        <img class="first-child" src="../icon/ic_pelanggan_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../icon/ic_pelanggan_in.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Data Karyawan </font>
                    </a>
                </li>
                <li>
                    <a href="../_laporan" data-ripple-dark >
                        <img class="first-child" src="../icon/ic_laporan_out.png" height="25px" style="margin-right: 5px;" />
                        <img class="last-child" src="../icon/ic_laporan.png" height="25px" style="margin-right: 5px;" />
                        <font color="#8c8c8c" class="text"> Laporan Transaksi </font>
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
                 <h2><?php echo $title_data; ?></h2>
                  <font size="2px" color="#B1B1B1"><p>> <a href="#">Home</a> /   <a href="#"><?php echo $title_data; ?></a> <a id="edit_link" href="#"> > Lihat & Edit</a> <a id="tambah_link" href="#"> > Tambah</a> </p></font>

                      <div align="right" style="float:right; display:inline-block; margin-right : 70px;" id="floating">
                          <a id="launchModalBtn" data-ripple class="btn-floating btn-large">
                              <img id="floating" src="../icon/ic_add.png" width="15" height="15">
                          </a>
                      </div>
              </div>
              
            <div id="tabelView" class="panel" style='padding-left: 20px; padding-right: 20px; margin-top:40px; padding-top: 40px; padding-bottom: 20px;'>
                <div id="tabel"></div>
            </div>

            <div id="view-data"></div>
            
          </div>
    </div>

</div>

</body>

    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</html>