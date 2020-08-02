   
   <?php
   include "../config/koneksi.php";
   include "../config/library.php";
   include "../config/fungsi_indotgl.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";


  $isi_komentar=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM komentar WHERE dibaca='N'"));
  $jumHub=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hubungi WHERE dibaca='N'"));
  $hit=mysqli_num_rows($baru);

   // Bagian Home
   if ($_GET['module']=='home'){
   if ($_SESSION['leveluser']=='admin'){
   echo "
  
   <div class='workplace'>
   <div class='row-fluid'>
   <div class='span12'>
   <div class='contentinner content-dashboard'>
  
   <div class='alert alert-success'>
   <strong>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda atau pilih ikon-ikon pada  
   Control Panel di bawah ini:
   </div>
                
   <div class='widgetButtons'>   					
					
   <div class='bb'>
   <a href=media.php?module=identitas>
   <img src='img/www.png'/></a>
   <div class='caption'>Identitas Website</div>   
   </div>
   
   <div class='bb'>
   <a href=media.php?module=menu><img src='img/modul.png'/></a>
   <div class='caption'>Menu Website</div>
   </div>
   
   
   
   <div class='bb'>
   <a href=media.php?module=produk>
   <img src='img/produk.png'/></a>
   <div class='caption'>Produk</div>
   </div>   
   
   
   <div class='bb'>
   <a href=media.php?module=kategori>
   <img src='img/kategori.png'/></a>
   <div class='caption'>Kategori Produk</div>
   </div>
   
   <div class='bb'>
   <a href=media.php?module=order>
   <img src='img/lihatorder.png'/></a>
   <div class='caption'>Order Masuk</div>
   </div>
   
   <div class='bb'>
   <a href=media.php?module=jasapengiriman>
   <img src='img/jasakirim.png'/></a>
   <div class='caption'>Jasa Pengiriman</div>
   </div>
   
   <div class='bb'>
   <a href=media.php?module=ongkoskirim>
   <img src='img/ongkoskirim.png'/></a>
   <div class='caption'>Ongkos Pengiriman</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=download>
   <img src='img/katalog.png'/></a>
   <div class='caption'>Katalog Produk</div>
   </div>

   
   <div class='bb'>
   <a href=media.php?module=blog>
   <img src='img/berita.png'/></a>
   <div class='caption'>Blog</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=kategoriblog>
   <img src='img/kategoriblog.png'/></a>
   <div class='caption'>Kategori Blog</div>
   </div>
   
   
   
   <div class='bb'>
   <a href=media.php?module=komentar><img src='img/komentar.png'/></a>
   <div class='caption'>Komentar Blog</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=katajelek><img src='img/sensor.png'/></a>
   <div class='caption'>Sensor Kata</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=hubungi><img src='img/hubungi.png'/></a>
   <div class='caption'>Pesan Masuk</div>
   </div>
   
   <div class='bb'>
   <a href=media.php?module=testimoni><img src='img/testimoni.png'/></a>
   <div class='caption'>Testimoni</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=logo><img src='img/gantilogo.png'/></a>
   <div class='caption'>Logo Website</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=templates><img src='img/template.png'/></a>
   <div class='caption'>Template</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=background><img src='img/background.png'/></a>
   <div class='caption'>Background</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=halamanstatis><img src='img/add_page.png'/></a>
   <div class='caption'>Halaman Baru</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=peta><img src='img/peta.png'/></a>
   <div class='caption'>Peta Lokasi</div>
   </div>
  
   
   <div class='bb'>
   <a href=media.php?module=ym><img src='img/ym.png'/></a>
   <div class='caption'>Modul YM</div>
   </div>
  
   
   <div class='bb'>
   <a href=media.php?module=user><img src='img/user.png'/></a>
   <div class='caption'>User Admin</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=kustomer><img src='img/kustomer.png'/></a>
   <div class='caption'>Kustomer</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=iklan><img src='img/iklan.png'/></a>
   <div class='caption'>Pasang Iklan</div>
   </div>
   
   
   <div class='bb'>
   <a href=media.php?module=perbaikan><img src='img/perbaikan.png'/></a>
   <div class='caption'>Maintenance Web</div>
   </div>


  <br/><br/>
  <div class='block-fluid2'>
  <table cellpadding='0' cellspacing='0' width='55%' class='table'>  
  <tr>
  <td width='150px'>Waktu Login</td>
  <td>$hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " - "; 
  echo date("H:i:s");
  echo " WIB</td></tr> ";
  
  
  
  
  
  // STATISTIK //////////////////////////////////////////////////////////////
  
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  $s = mysqli_query($koneksi,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  
  if(mysqli_num_rows($s) == 0){
  mysqli_query($koneksi,"INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");} 
  
  else{
  mysqli_query($koneksi,"UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");}

  $pengunjung       = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysqli_result(mysqli_query($koneksi,"SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(hits) as hitstoday FROM statistik 
  WHERE tanggal='$tanggal' GROUP BY  tanggal")); 
  $totalhits        = mysqli_result(mysqli_query($koneksi,"SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysqli_result(mysqli_query($koneksi,"SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
  $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);}

  echo "
  <tr>
  <td class='width30'>Pengunjung Website</td><td class='width70'>$pengunjungonline</td>
  </tr>
  <tr>
  <td class='width30'>Hits Hari Ini</td><td class='width70'>$hits[hitstoday]</td>
  </tr>";
 
  echo " 
  </table>
  </div>
  </div></div>
  </div></div>";} 
   
   
   
   
   else {
   echo "    <div class='workplace'>
   <div class='row-fluid'>
   <div class='span12'>
   <div class='contentinner content-dashboard'>
  
   <div class='alert alert-info'>
   <strong>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda.
   </div>


  <div class='block-fluid2'>
  <table cellpadding='0' cellspacing='0' width='55%' class='table'>  
  <tr>
  <td width='150px'>Waktu Login</td>
  <td>$hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " - "; 
  echo date("H:i:s");
  echo " WIB</td></tr> ";
  
  
  
  // STATISTIK //////////////////////////////////////////////////////////////
  
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  $s = mysqli_query($koneksi,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  
  if(mysqli_num_rows($s) == 0){
  mysqli_query($koneksi,"INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");} 
  
  else{
  mysqli_query($koneksi,"UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");}

  $pengunjung       = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysqli_result(mysqli_query($koneksi,"SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(hits) as hitstoday FROM statistik 
  WHERE tanggal='$tanggal' GROUP BY  tanggal")); 
  $totalhits        = mysqli_result(mysqli_query($koneksi,"SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysqli_result(mysqli_query($koneksi,"SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
  $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);}

  echo "
  <tr>
  <td class='width30'>Pengunjung Website</td><td class='width70'>$pengunjungonline</td>
  </tr>
  <tr>
  <td class='width30'>Hits Hari Ini</td><td class='width70'>$hits[hitstoday]</td>
  </tr>";
 
  echo " 
  </table>
  </div>
  </div></div>
  </div></div>";}} 
   


  //============= MENU UTAMA ==================================================->
  // Bagian Identitas 
  elseif ($_GET['module']=='identitas'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_identitas/identitas.php";}}

  // Bagian Pofil
  elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_profil/profil.php";}}
  
  // Bagian Sambutan
  elseif ($_GET['module']=='sambutan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_sambutan/sambutan.php";}}

  // Bagian Menu 
  elseif ($_GET['module']=='menu'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_menu/menu.php";}}

  // Bagian Halaman Statis
  elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_halamanstatis/halamanstatis.php";}}
  
  //====================================================================->


  //============= BERITA/ARTIKEL ==================================================->
  // Bagian Berita
  elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_berita/berita.php"; }}
  
  // Bagian Kategori
  elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_kategori/kategori.php";}}
  
  // Bagian Tag
  elseif ($_GET['module']=='tag'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_tag/tag.php"; }}

  // Bagian Komentar Berita
  elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_komentar/komentar.php";}}
  
  // Bagian Kata Jelek
  elseif ($_GET['module']=='katajelek'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_katajelek/katajelek.php";}}
  
  //======================================================================->


  //============= ALBUM FOTO/GALERI ==================================================->
  // Bagian Album
  elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_album/album.php";}}

  // Bagian Galeri Foto
  elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_galerifoto/galerifoto.php";}}
  
  //============= BERITA/ARTIKEL ==================================================->


  //======================== VIDEO =============================->

  // Bagian Playlist
  elseif ($_GET['module']=='playlist'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_playlist/playlist.php";}}

  // Bagian Video
  elseif ($_GET['module']=='video'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_video/video.php";}}

  // Bagian KomentarVideo 
  elseif ($_GET['module']=='komentarvid'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_komentarvid/komentarvid.php";}}

  // Bagian Tag Video
  elseif ($_GET['module']=='tagvid'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_tagvid/tagvid.php";}}

  //=====================================================================->


  //========================IKLAN =============================->

  // Bagian Iklan PopUp
  elseif ($_GET['module']=='iklan_popup'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_iklan_popup/iklan_popup.php";}}

 // Bagian Banner
  elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_banner/banner.php";}}
  
  
 // Bagian Iklan
  elseif ($_GET['module']=='iklan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_iklan/iklan.php";}}
  
  //=====================================================================->

  
  
  //======================== PRODUK =============================->
  // Bagian Produk
  elseif ($_GET[module]=='produk'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_produk/produk.php";}}   
  
  // Bagian Order
  elseif ($_GET[module]=='order'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_order/order.php";}}
  
  // Bagian Cara Pembelian
  elseif ($_GET[module]=='carabeli'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_carabeli/carabeli.php";}}
  
  // Bagian Kota/Ongkos Kirim
  elseif ($_GET[module]=='ongkoskirim'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_ongkoskirim/ongkoskirim.php";}}
  
  
  // Bagian Jasa Kirim
  elseif ($_GET['module']=='jasapengiriman'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  require_once "modul/mod_pengiriman/pengiriman.php";}}


  // Bagian Laporan
  elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_laporan/laporan.php";}}
  
  // Bagian Download
  elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_download/download.php";}}


  // Bagian Bank
  elseif ($_GET['module']=='bank'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_bank/bank.php";}}


  //====================================================================->

  
  
  //======================== BLOG =============================->

  // Bagian Blog
  elseif ($_GET['module']=='blog'){
  if ($_SESSION['leveluser']=='admin'){
  include "modul/mod_blog/blog.php";}}

  // Bagian KategoriBlog
  elseif ($_GET[module]=='kategoriblog'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_kategoriblog/kategoriblog.php";}}

  //====================================================================->



  //======================== MODUL WEB	 =============================->
  
  // Bagian Logo
  elseif ($_GET[module]=='logo'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_logo/logo.php";}}

  // Bagian Templates
  elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_templates/templates.php";}}


  //  Bagian Header
  elseif ($_GET[module]=='header'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_header/header.php";}}


  // Bagian Perbaikan Website
  elseif ($_GET['module']=='perbaikan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_perbaikan/perbaikan.php";}}


  // Bagian Background
  elseif ($_GET[module]=='background'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_background/background.php";}}   
  

  // Bagian Hubungi Kami
  elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_hubungi/hubungi.php";}}


  // Bagian Testimoni
  elseif ($_GET[module]=='testimoni'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_testimoni/testimoni.php";}}


   // Bagian Peta
  elseif ($_GET['module']=='peta'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_peta/peta.php";}}


  // Bagian YM
  elseif ($_GET[module]=='ym'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_ym/ym.php";}}


  // Bagian Newsletter
  elseif ($_GET['module']=='newsletter'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_newsletter/newsletter.php";}}





  // Bagian Agenda
  elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
   include "modul/mod_agenda/agenda.php";}}


  // Bagian Poling
  elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_poling/poling.php";}}


  // Bagian Sekilas Info
  elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_sekilasinfo/sekilasinfo.php";}}
  
  // Bagian Klien
  elseif ($_GET[module]=='klien'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_klien/klien.php";}}   

	
  //=================================================================================->
  


  //======================== MODUL USER =============================->
  
  // Bagian User
  elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_users/users.php"; }}

  // Bagian Kustmoer
  elseif ($_GET[module]=='kustomer'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_kustomer/kustomer.php";}}  

  // Bagian Modul
  elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "modul/mod_modul/modul.php";}}
  
  //=========================================================================->


  
  
  // Apabila modul tidak ditemukan
  else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";}


  ?>
