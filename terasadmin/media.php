<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
$r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'"));

  //fungsi cek akses user
  function user_akses($mod,$id){
  $link = "?module=".$mod;
  $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul 
  AND   users_modul.id_session='$id' AND modul.link='$link'"));
  return $cek;}
  
  //fungsi cek akses menu
  function umenu_akses($link,$id){
  $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul 
  AND users_modul.id_session='$id' AND modul.link='$link'"));
  return $cek;}
  
  //fungsi redirect
  function akses_salah(){
  $pesan = "<link href='style.css' rel='stylesheet' type='text/css'>
  <center>Maaf Anda tidak berhak mengakses halaman ini</center>";
  $pesan.= "<meta http-equiv='refresh' content='2;url=media.php?module=home'>";
  return $pesan;}
  

  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "
  <link href='css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <center><div class='gembok'><img src='img/lock.png'></div></center>
  <h1>AKSES ILEGAL</h1>
  
  <p class='maaf'>
  Maaf, untuk masuk Halaman Administrator
  anda harus Login dahulu!</p><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href='index.php'>&nbsp;&nbsp; <b>LOGIN DI SINI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";}
  
  else{
  ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>.:: HALAMAN ADMINISTRATOR ::.</title>
    <link rel="shortcut icon" href="../favicon.png" />
	
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' type='text/css' href='css/fullcalendar.print.css' media='print' />
    
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery.mousewheel.min.js'></script>
    <script type='text/javascript' src='js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>
    <script type='text/javascript' src='js/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='js/plugins/uniform/uniform.js'></script>
    <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='js/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
    <script type='text/javascript' src='js/plugins/dataTables/jquery.dataTables.min.js'></script>    
    <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>
    <script type='text/javascript' src='js/cookies.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script> 
	
    <script src="../editor/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
    <script src="../editor/jscripts/tiny_mce/tiny_teraskreasi.js" type="text/javascript"></script>


    </head>
    <body>
    
    <div class="header">
    <a class="logo" href='?module=home'>
    <img src="img/logo.png" alt="TerasKreasi" title="TerasKreasi"/></a>
    <ul class="header_menu">
    <li class="list_icon"><a href="#">&nbsp;</a></li>
    </ul>    
    </div>
    
    <div class="menu">                
        
    <div class="breadLine">  
    <div class="arrow"></div>
			
    <div class="adminControl active">
    <SCRIPT language=JavaScript>var d = new Date();
    var h = d.getHours();
    if (h < 11) { document.write('Selamat pagi,'); }
    else { if (h < 15) { document.write('Selamat siang,'); }
    else { if (h < 19) { document.write('Selamat sore,'); }
    else { if (h <= 23) { document.write('Selamat malam,'); }
    }}}</SCRIPT> <b><?php include "nama.php"; ?></b>
    </div>
    </div>
        
		
    <div class="admin">
    <div class="image">
    <a href="media.php?module=user&act=edituser&id=<?php echo $r['id_session'];?>"><?php include "foto.php"; ?></a>
    </div>
    <ul class="control"> 
    <?php
    $jumHub=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hubungi WHERE dibaca='N'"));
    echo "
    <li><span class='icon-comment'></span> <a href='?module=hubungi'>Pesan Masuk</a> 
	<a href='?module=hubungi' class='caption red'>$jumHub</a></li>";
    ?>
    <li><span class="icon-cog"></span>  
	<a href="media.php?module=user&act=edituser&id=<?php echo $r['id_session'];?>">Edit Profil</a></li>
    <li><span class="icon-share-alt"></span> <a href="logout.php">Keluar</a></li>
    </ul>
    </div>
        
		
    <!--========= MENU UTAMA ========================-->
    <ul class="navigation">            
           
    <li class="openable">
    <a href="#">
    <span class="isw-list"></span><span class="text">Menu Utama</span>
    </a>
    <ul><?php include "menu1.php"; ?></ul>   
    </li>  
		
	
    <li class="openable">
    <a href="#">
    <span class="isw-list"></span><span class="text">Modul Produk</span>
    </a>
    <ul><?php include "menu2.php"; ?></ul>   
    </li>  
	
    <li class="openable">
    <a href="#">
    <span class="isw-list"></span><span class="text">Modul Blog</span>
    </a>
    <ul><?php include "menu3.php"; ?></ul>   
    </li>  
	
    <li class="openable">
    <a href="#">
    <span class="isw-list"></span><span class="text">Modul Iklan</span>
    </a>
    <ul><?php include "menu4.php"; ?></ul>   
    </li>  
	
	
    <li class="openable">
    <a href="#">
    <span class="isw-list"></span><span class="text">Modul Web</span>
    </a>
    <ul><?php include "menu5.php"; ?></ul>   
    </li>  
	
	
    <li class="openable">
    <a href="#">
    <span class="isw-list"></span><span class="text">Modul User</span>
    </a>
    <ul><?php include "menu6.php"; ?></ul>   
    </li>  
		
			
    </ul>
    <!--========= AKHIR MENU UTAMA ========================-->
       
    <!--========= KALENDER ========================-->
    <div class="dr"><span></span></div>
    <div class="widget-fluid">
    <div id="menuDatepicker"></div>
    </div>	   
    <!--========= AKHIR KALENDER ========================-->
	
    </div>        
    </div>
	
        
    <div class="content">
    <div class="breadLine">
            
    <ul class="breadcrumb">
    <?php include "breadcrumb.php"; ?>	
    </ul>
	
    <ul class="buttons">
    <li>
    <a target="_blank" href="<?php include "url.php"; ?>"><span class="icon-search"></span><span class="text">Lihat Web</span></a>
    </li>
    </ul>
	
    </div>
        
		
    <!--========= KONTEN ===================================-->
    <?php include "content.php"; ?>
    <!--========= AKHIR KONTEN ===============================-->
	
		
		
    </div>
    </div>   
    
    </body>
    </html>


    <?php
    }
    ?>
