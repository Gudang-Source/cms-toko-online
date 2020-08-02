	
  <div id="content">
  <div class="inner"> 

  <!--================= IKLAN POPUP ========================-->
  <?php
  $iklan_popup=mysqli_query($koneksi,"SELECT * FROM iklan_popup WHERE aktif='Ya'
  ORDER BY rand() DESC");
  while($b=mysqli_fetch_array($iklan_popup )){
  echo "
  <div id='lightbox-banner' style='display: none'>
  <a href='$b[url]'' target='_blank'><img src='img_popup/$b[gambar]' 
  border=0 width=100%></a>
  </div>
  <script src='$f[folder]/js3/jquery.simplemodal.js' type='text/javascript'></script>
  <script type='text/javascript'>
  jQuery(function ($) {
  $('#lightbox-banner').modal();});
  </script>";}
  ?>
  <!--================= AKHIR IKLAN POPUP ========================-->
	
	
  <!--========= HEADER SLIDER ========================-->
  <div class="slideshow">
  <div class="flexslider">
  <ul class="slides">
  <?php
  $header=mysqli_query($koneksi,"SELECT * FROM header INNER JOIN kategori ON header.id_kategori=kategori.id_kategori
  ORDER BY id_header DESC LIMIT 12");
  while($b=mysqli_fetch_array($header)){

  echo "
  <li>
  <a href='kategori-$b[id_kategori]-$b[kategori_seo].html'>
  <img width=960 height=350 src='img_header/$b[gambar]'/></a> 
  <div class='flex-caption'>
  <h2>$b[judul]</h2>
  <div class style=\"margin-bottom:20px;\">$b[keterangan_gambar]</div>
  <a href='kategori-$b[id_kategori]-$b[kategori_seo].html' title='Lihat' class='button button-orange'>See More</a> 
  </div>
  </li>";}
  ?>			  
  </ul>
  </div>
  </div>
  
  <script type="text/javascript">
  $(window).load(function() {
  $('.slideshow .flexslider').flexslider({
  animation: "slide",
  pauseOnHover: true,
  touch: true,
  animationSpeed: 1300,
  slideshowSpeed: 5000,
  smoothHeight: true,
  controlNav: false,
  directionNav: true
  });
  });
  </script> 
  <!--========= AKHIR HEADER SLIDER ========================-->
	  
	  
  <!--========= SAMBUTAN ========================-->
  <?php
  $sambutan=mysqli_query($koneksi,"SELECT * FROM sambutan ORDER BY id_sambutan DESC");
  while($zal=mysqli_fetch_array($sambutan)){
  
  echo "
  <div class='box box-common fixed'>
  <h2 class='heading-title'>$zal[judul]</span></h2>";
  
  if ($zal[gambar]!=''){
  echo "<div class='zalimage2'><img src='img_teraskreasi/small_$zal[gambar]' width=200  border=0 class='zalimage'>
  <span class='prolog'>$zal[isi_sambutan]</span></div>";}
  
  else{						
  echo "<div class='zalimage2'>
  <span class='prolog'>$zal[isi_sambutan]</span></div>";}
	
  echo "
  <div class='clear'></div>
  </div>";}?>
  <!--========= AKHIR SAMBUTAN ========================-->	  
	  
	  
	  
	  
   <!--========= PRODUK TERBARU ================================-->
   <?php 
   $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
   echo "
   <div class='box box-orange fixed'>
   <h2 class='heading-title'>New Product <span class='text-orange'>$iden[nama_website]</span></h2>";
   $sql=mysqli_query($koneksi,"SELECT * FROM produk WHERE headline='Y'  ORDER BY id_produk DESC LIMIT 6");
   while ($r=mysqli_fetch_array($sql)){
   include "harga/diskon_stok.php";
   $harga = number_format($r[harga],0,",",".");

   echo "
   <div class='box-products'> 
   <div class='prod_hold'> 
   <span class='image'> 
   <a href='produk-$r[id_produk]-$r[produk_seo].html'>
   <img src='img_produk/small_$r[gambar]' width=200 height=250 alt='$r[nama_produk]' style=\"border:4px solid #ccc;\"/> </a> 
   </span> 

   <a class='wrap_link' href='produk-$r[id_produk]-$r[produk_seo].html'>
   <span class='name'>$r[nama_produk]</span></a>
   <div class='gallery clearfix'>
   
   <a href='produk-$r[id_produk]-$r[produk_seo].html' class='lihat'>
   Product Detail </a>   
   
   <a href='img_produk/$r[gambar]'  rel='prettyPhoto'  
   title='$r[nama_produk]<br/><span class style=\"color:#DD430E;font-size:13px;\"><!--Rp. $hargadisc ---->' class='go_to_prod_link'>
   Product Detail</a>
   </div>  
  
  
   <!-------------<div class='price_hold'> ///////////tidak perlu harga
   $divharga
   </div>
   $tombol ///////////------------>
   
   
   </div></div>";}
   echo "
   </div>";
   ?>
   <!--========= AKHIR PRODUK TERBARU ================================-->
        
	  
	  
	  
	  
   <!--========= PRODUK TERLARIS ================================-->
   <?php 
   $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
   echo "
   <div class='box box-orange fixed'>
   <h2 class='heading-title'>Best Seller Product <span class='text-orange'>$iden[nama_website]</span></h2>";
   $best=mysqli_query($koneksi,"SELECT * FROM produk ORDER BY dibeli DESC LIMIT 4");
   while($r=mysqli_fetch_array($best)){
   include "harga/diskon_stok.php";
   $harga = number_format($r[harga],0,",",".");

   echo "
   <div class='box-products'> 
   <div class='prod_hold'> 
   <span class='image'> 
   <a href='produk-$r[id_produk]-$r[produk_seo].html'>
   <img src='img_produk/small_$r[gambar]' width=200 height=250 alt='$r[nama_produk]' style=\"border:4px solid #ccc;\"/> </a> 
   </span> 

   <a class='wrap_link' href='produk-$r[id_produk]-$r[produk_seo].html'>
   <span class='name'>$r[nama_produk]</span></a>
   <div class='gallery clearfix'>
   
   
   <a href='produk-$r[id_produk]-$r[produk_seo].html' class='lihat'>
   Product Detail</a>   
   
   <a href='img_produk/$r[gambar]'  rel='prettyPhoto'  
   title='$r[nama_produk]<br/><span class style=\"color:#DD430E;font-size:13px;\"><!--Rp. $hargadisc ----> ' class='go_to_prod_link'>
   Product Detail</a>
   </div>  
   
   <!------<div class='price_hold'>
   $divharga
   </div>
   $tombol ---------------Tidak perlu harga---------->
   </div></div>";}
   echo "
   </div>";
   ?>
   <!--========= AKHIR PRODUK TERLARIS ================================-->	  
	  
   <!--========= BANNER ================================-->
   <div class="box box-common box-carousel">
   <div class="flexslider">
  
   <ul class="slides">
  
  <?php
  $banner=mysqli_query($koneksi,"SELECT * FROM banner WHERE aktif='Ya' ORDER BY id_banner DESC LIMIT 20");

  while($b=mysqli_fetch_array($banner)){
  echo " <li class style=\"margin-right:10px;margin-top:10px;\">
  <a href='$b[url]' 'target='_blank' title='$b[judul]'>
   <div class='marginslide'><img src='img_banner/$b[gambar]' height='60'  border='0'></div></a> </li>";}
  ?>   
   
   </ul>
   </div> 
   </div>
	  
   <script type="text/javascript">
   $(window).load(function() {
   $('.box-carousel .flexslider').flexslider({
   animation: "slide",
   animationLoop: true,
   controlNav: false,
   directionNav: true,
   touch: true,
   itemWidth: 100,
   itemMargin:0,
   minItems:4,
   maxItems:4
   });
   });
   </script> 
   <!--========= AKHIR BANNER ================================-->
   
   
  </div>
  </div>