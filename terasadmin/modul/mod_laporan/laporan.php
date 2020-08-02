<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){  
 
  echo "
  <link href='../../css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  <body class='special-page'>
  <div id='container'>
  
  <section id='error-number'>
  <center><div class='gembok'><img src='../../img/lock.png'></div></center>
  <h1>AKSES ILEGAL</h1>
  <p class='maaf'>Untuk mengakses modul, Anda harus login dahulu!</p><br/>
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href=../../index.php><b>LOGIN DISINI</b></a></p>
  </section>
  </div>";}
  
  
  else{
  
  echo "
  <div class='workplace'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>LAPORAN TRANSAKSI</h1>       
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='modul/mod_laporan/pdf_toko_sekarang.php'><span class='isw-plus'></span> Laporan Transaksi</a></li>
  </ul>
  </li>
  </ul>     
  
                         
  <div class='clear'></div>
  </div>
					
  <div class='block'>  
  <form method=POST action='modul/mod_laporan/pdf_toko.php'>

  <h5>Laporan Per Periode</h5>
  	
   
  <div class='row-form2'>
  <div class='span3'>Dari Tanggal</div>";        
  combotgl(1,31,'tgl_mulai',$tgl_skrg);
  combonamabln(1,12,'bln_mulai',$bln_sekarang);
  combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);
  echo "
  <div class='clear'></div>
  </div>    
  
  
  <br/>
  <div class='row-form2'>
  <div class='span3'>s/d Tanggal</div>";        
  combotgl(1,31,'tgl_selesai',$tgl_skrg);
  combonamabln(1,12,'bln_selesai',$bln_sekarang);
  combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

  echo "<div class='clear'></div>
  </div>    
    	
  
  <div class='row-form'>
  <input type='submit' name=TerasKreasi'  class='btn' value='Proses' style='height:30px;'>
  </div>


  </form>
  </div></div></div>";   
   
   
  }
  ?>