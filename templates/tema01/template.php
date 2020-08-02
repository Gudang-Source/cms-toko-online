  <?php 
  error_reporting(0);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  
  <HEAD>
  
  <!--========= Facebook ========================-->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
  <!--========= Akhir Facebook ========================-->


  <title><?php include "terasconfig/teraskreasi_titel.php"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="robots" content="index, follow">
  <meta name="description" content="<?php include "terasconfig/teraskreasi_meta1.php"; ?>">
  <meta name="keywords" content="<?php include "terasconfig/teraskreasi_meta2.php"; ?>">
  <meta http-equiv="Copyright" content="Rizal Faizal" "rizal_fz@yahoo.com">
  <meta name="author" content="Rizal Fizal" "http://teraskreasi.com">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Bali-Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">

   <!--=========FAVICON ========================-->
   <link rel="shortcut icon" href="favicon.png" />
   
   
   <!--========= CSS ========================-->
   <link rel="stylesheet" href="<?php echo "$f[folder]/stylesheet/stylesheet.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/js/tipsy/css.tipsy.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/js/cloud-zoom.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/js/supersized/css/supersized.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/js/flex/flexslider.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/js/colorbox/colorbox.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/css/prettyPhoto.css" ?>" type="text/css" />
   <link rel="stylesheet" href="<?php echo "$f[folder]/css/paging.css" ?>" type="text/css" />
   <!--========= AKHIR CSS ======================================================================================-->


   <!--========= JS =========================================================================================-->
   <script src="<?php echo "$f[folder]/js/jquery.min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/jquery-1.7.1.min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/custom_scripts.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/tipsy/jquery.tipsy.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/twitter.feed.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/cloud-zoom.1.0.2.min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/supersized/js/supersized.3.2.7.min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/supersized/js/jquery.easing.min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/tabs.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/flex/jquery.flexslider.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/jquery.accordion.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/colorbox/jquery.colorbox-min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/jquery.roundabout.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js/jquery.easing.min.js" ?>" type="text/javascript"></script>
   <script src="<?php echo "$f[folder]/js2/jquery.prettyPhoto.js" ?>" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo "$f[folder]/js2/selectnav.min.js" ?>"></script>
   <!--========= AKHIR JS ==========================================================================================-->


  <script type="text/JavaScript">
  $(document).ready(function() {
  $('#twitter-feed-1').dcTwitterFeed({
  id: '#<?php include "terasconfig/tw.php";?>', 
  tweetId: '<?php include "terasconfig/tw.php";?>'
  });});
  </script>


  <script type="text/javascript">
  function captcha()
  {
  var c_currentTime = new Date();
  var c_miliseconds = c_currentTime.getTime();

  document.getElementById('captcha').src = 'terasconfig/captcha.php?x='+ c_miliseconds;
  }
  </script>



  <div class="teraskreasipage" >
  
   <!--========= Script website translate google ========================-->
   
    <!--========= taruh scriptnya disini mas ========================-->
   
   
  </head>


  <!--========= BACKGROUND================================-->
  <?php
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM background"));
  echo "<body style='background: url($r[gambar]) white top center no-repeat;'>";
  ?>
  <!--========= AKHIR BACKGROUND================================-->
  
  
  <div id="container"> 
  <div id="header">
  <div id="header_top">
  <div class="inner">
	  
	  
   <!--========= LOGO ========================-->
   <!--<div id="logo"> 
   <a href="index-2.html" title="teraskreasi_logo">
   <?php
   //$logo=mysqli_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
  // while($b=mysqli_fetch_array($logo)){
  // $iden=mysqli_fetch_array(mysqli_query("SELECT * FROM identitas"));
  // echo "<a href='$iden[url]'><img src='img_logo/$b[gambar]'/></a>";}
   ?>
   </a> 
   </div>
   <!--========= AKHIR LOGO ========================-->
   
   
   <!--========= PENCARIAN ========================-->
   
	<div id="search">
   <form method="POST" action="hasil-pencarian.html">	
   <input type="text" onkeydown="this.style.color = '#f1f1f1';" value="pencarian enter" name="kata" />
   <div class="button-search"></div>
   </form>
   </div>
   <!--========= AKHIR PENCARIAN ========================-->


  <!--========= NOTIFASI LOGIN ========================-->
  <div id="welcome">
  <?php 
  if (($_SESSION[namauser] != '') AND ($_SESSION[leveluser] == 'kustomer')){
  $sql=mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer='$_SESSION[namauser]'");
  $r=mysqli_fetch_array($sql);
	
  $sql2=mysqli_query($koneksi,"SELECT * FROM orders WHERE id_kustomer='$_SESSION[namauser]' 
  AND status_order='Baru' ORDER BY id_orders DESC LIMIT 2");
  $count=mysqli_num_rows($sql);
	
  echo"<script src='$f[folder]/js/selamat.js' type='text/javascript'></script>
  <span class style=\"color:#FFCC00;\"><b>$r[nama_lengkap]</b></span> | 
  <a href=member/media.php?module=profil>Your Account</a> | ";
  if ($count > 0){
  echo "<a href=lihat-order.html>Lihat Order</a> | ";}
  echo"<a href=logout.php>Logout</a>";}
  
  else{
  echo"<a href='login.html'>Login</a> | <a href='daftar.html'>Register</a>";}  
  ?>  
  
  </div>
  <!--========= AKHIR NOTIFASI LOGIN ========================-->

	
   
  </div>
  </div>
  <div id="header_bottom">
  <div class="inner">
	  
	  
  <!--========= MENU UTAMA ========================-->
  <div id="main-menu">
  <ul class="menu" id="main_nav">
  <?php
  function get_menu($data, $parent = 0) {
  static $i = 1;
  $tab = str_repeat(" ", $i);
  if ($data[$parent]) {
  $html = "$tab<li>";
  $i++;
  foreach ($data[$parent] as $v) {
  $child = get_menu($data, $v->id_menu);
  $html .= "$tab<li class='menu-item'>";
  $html .= '<a class="'.$css.'" href="'.$v->link.'">'.$v->nama_menu.'</a>';
  if ($child) {
  $i--;
  $html .= "<ul class='sub-menu'>$child";
  $html .= "$tab</ul>";}
  $html .= '</li>';}
  $html .= "$tab</li>";
  return $html;}
  else {
  return false;}}
  
  $result = mysqli_query($koneksi,"SELECT * FROM menu WHERE aktif='Ya' ORDER BY id_menu");
  while ($row = mysqli_fetch_object($result)) {
  $data[$row->id_parent][] = $row; }
  $menu = get_menu($data);
  echo "$menu";
  ?>
  </ul>
  </div>
  <!--========= AKHIR MENU UTAMA ========================-->
		
		
		<!--========= LOGO ========================-->
   <div id="logo"> 
   <a href="index-2.html" title="teraskreasi_logo">
   <?php
   $logo=mysqli_query($koneksi,"SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
   while($b=mysqli_fetch_array($logo)){
   $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
   echo "<a href='$iden[url]'><img src='img_logo/$b[gambar]'/></a>";}
   ?>
   </a> 
   </div>
   <!--========= AKHIR LOGO ========================-->
		
		
   <!--========= KATEGORI========================-->
   <div id="menu"> 
          
   <!-- KERANJANG BELANJA -->
   <div id="cart-module"> 
   <a href="keranjang-belanja.html" title="Keranjang Belanja"> <span class="cart-heading">Keranjang Belanja</span> 
   <?php require_once "terasconfig/item.php";?></a> </div>
   <!-- AKHIR KERANJANG BELANJA -->
        
		  
   <ul id="topnav2">
   <?php               
   $kategori=mysqli_query($koneksi,"select nama_kategori, kategori.id_kategori, kategori_seo,  
                         count(produk.id_kategori) as jml 
                         from kategori left join produk 
                         on produk.id_kategori=kategori.id_kategori 
                         group by nama_kategori
						 order by rand() ");
						 
   while($k=mysqli_fetch_array($kategori)){
   
   echo "
   <li>
   <a href='kategori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori] <span class='jumprod'>($k[jml])</span></a>
   </li>";}
   ?>
   
   </ul>
   </div>
   <div class="clear"></div> 
   <!--========= AKHIR KATEGORI========================-->
		
       
   </div>
   </div>
   </div>


   <!--========= KONTEN ========================-->
   <?php include "konten.php";?>
   <!--========= AKHIR KONTEN =================-->
	  
  
  
   <!--========= FOOTER ================================-->
   
   
  <div id="slide_footer"> <a href="#" class="toggler" id="toggle_switch" title="Open/Close">Slide toggle</a>
  <div id="togglerone" class="inner">
	
	
  <!--=========  TESTIMONI  ========================-->
  <div class="one_fourth">
  <h3><a href="testimoni.html">Testimony</a></h3>
  <ul id="ticker_03" class="ticker">
		
  <?php
  $testi=mysqli_query($koneksi,"SELECT *  FROM testimoni WHERE dibaca='Y' ORDER BY id_testimoni DESC LIMIT 8");
  while($t=mysqli_fetch_array($testi)){
  $tgl = tgl_indo($t[tanggal]); 
  $grav_url = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( $t[email] ) ) ) . '?d=' . urlencode( $default ) . '&s=' .
  $size;;

  if ($t[email]!=''){
  echo " <li>";
  echo " <img src='$grav_url' height='35' class='image-align-zal'>";}   

  else{
  echo " 
  <img src='$f[folder]/images/nopic.jpg' height='435' class='image-align-left'>";}   

  echo "<div class='teksti'><span class='text-orange'>$t[nama]</span> $t[pesan]&nbsp;
  <span class style=\"color:#999;font-size:11px;\">($t[kota])</span></div>";
  
  echo "</li>";}
  ?>		
		
  </ul>	
  </div>
  <!--========= AKHIR TESTIMONI  ========================-->
  
		
   <!--========= FANPAGE ========================-->  
   <div class="one_fourth">
   <h3>Join Our Facebook</h3>
  
   <div class="fb-container ">
   <div class="fb-like-box"
   data-width="240" data-height="300"
   data-href="<?php include "terasconfig/fb.php";?>"
   data-border-color="white" data-show-faces="true"
   data-colorscheme="light"
   data-stream="false" data-header="false">
   </div>
   </div>
  
   </div>
   <!--========= AKHIR FANPAGE ========================-->  
	
	  
   <!--========= TWITTER ========================-->  
   <div class="one_fourth">
   <h3>Twitter feed</h3>
   <ul id="ticker_02" class="ticker">
   <div id="twitter-feed-1"><li></div></li>
   </ul>
   </div>	  
   <!--========= AKHIR TWITTER ========================-->  
	  
	  
   <!--========= KONTAK ========================-->  
   <?php
   $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
   echo "
   <div class='one_fourth last'>
   <h3><a href='hubungi-kami.html'>Any Question ?</a></h3>
   <span class='footer_time'>Working Days: $iden[hari_kerja]<br/>Time: $iden[jam_kerja]</span> 
   <span class='footer_address'>$iden[alamat]</span><br/>
   <span class='footer_phone'>$iden[no_telp]</span> 
   <span class='footer_mail'>$iden[email]</span> </div>
   <div class='clear'></div>
   </div>";  
   ?>
   <!--========= AKHIR KONTAK ========================-->  
   </div>



  <!--========= FOOTER ========================-->  
  <div id="footer">
  <div class="inner">
	
	
  <div class="one_fourth">
  <h3> Online Services </h3>
   <?php 
  $ym=mysqli_query($koneksi,"select * from mod_ym order by id desc");
  while($t=mysqli_fetch_array($ym)){
  echo "<div class='userym2'>$t[nama] :</div> 
  <div class='ymikon'>
  <a href='ymsgr:sendIM?$t[username]'>
  <img src='http://opi.yahoo.com/online?u=$t[username]&amp;m=g&amp;t=1' border='0' height='16' width='64'></a>
  </div>";}
  ?>  
  <br/>
  <?php include "hits.php";?>
  </div>
	
	
	
	
  <!--========= KATEGORI PRODUK ========================-->
  <div class="one_fourth">
  <h3>Product Category</h3>
  <ul class="footer_links">
  <?php
  $kategori=mysqli_query($koneksi,"select nama_kategori, kategori.id_kategori, kategori_seo,  
  count(produk.id_produk) as jml 
  from kategori left join produk 
  on produk.id_kategori=kategori.id_kategori 
  group by nama_kategori");
  $no=1;
  while($k=mysqli_fetch_array($kategori)){

  if(($no % 2)==0){
  echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";}
 
  else{
  echo "<li class='ganjil'><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";}

  $no++;}
  ?>
  </ul>
  </div>
  <!--========= AKHIR KATEGORI PRODUK ========================-->

	 
	 
  <!--========= DAFTAR NEWSLETTER ========UNTUK NEWS LETTER APAKAH BISA DGN SEMUA EMAIL BUKAN CUMA yahoo,rocketmail dll================-->
  <div class="one_fourth">
  <h3>Newsletter</h3>
  
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $email=htmlspecialchars($_POST['email']);
  $mail=explode("@",$email);
  $akun=$mail[1];
  $cek=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM newsletter WHERE email='$email'"));
  $array = array("yahoo.com","ymail.com","yahoo.co.id","rocketmail.com","gmail.com");

  if($cek>0){
  echo "
  <p class style=\"color:#FFCC00;\">Sorry, this email address is used by other member</p><br/>
  <a href='javascript:history.go(-1);'><input type='button' value='ulangi' class='tombol tombol-orange'/></a>";}
  
  elseif(!in_array($akun, $array)){
  echo "<p class style=\"color:#FFCC00;\">Sorry, your email is invalid.</p><br>
  <a href='javascript:history.go(-1);'><input type='button' value='Back' class='tombol tombol-orange'/></a>";} 
  
  else {
  mysqli_query($koneksi,"INSERT INTO newsletter SET email='$email'");
  echo "<p class style=\"color:#FFCC00;\">Thanks for being the part of our company</p>";}} 
  
  else {
  echo "
  Join our newsletter to have our updated products and our new info  
  <form method='post' action='' >
  <br/><br/><input style='height:16px;' type='text' name='email' 
  style='font-size:10px; padding-top:2px; padding-bottom:2px;' placeholder='your email'/>
  <div class='newsltr'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Sign Up' class='tombol tombol-orange' /></div>
  </form>";}
  ?>  

  </div>
  <!--========= AKHIR NEWSLETTER ========================-->
	  
	  
  <!--========= BANK PEMBAYARAN ========================-->  
  <div class="one_fourth last">
  <h3>We Give Solution For</h3>
  <?php
  $bank=mysqli_query($koneksi,"SELECT * FROM mod_bank ORDER BY nama_bank ASC");
  while($b=mysqli_fetch_array($bank)){
  echo "<div class='bank'>
 <img src='img_bank/$b[gambar]' width='51' height='32' border='0'><br/>
 $a[nama_bank]
 $b[nama_bank] No. Rek : $b[no_rekening]<br/>
  an. $b[pemilik]</div>";}?>
  </div>
  <!--========= AKHIR BANK PEMBAYARAN ========================-->  
	  
	  
	  
  <div class="clear"></div>
  </div>
  </div>

  
  <!--========= COPYRIGHT========================-->  
  <div id="powered">
  <div class="inner">
  <div align="center" class="author_credits">Copyrights <?=date("Y")?> - <?php include "terasconfig/nama_web.php";?>
  | Developed By Nama Sayah ma
  </div>
  </div>
  </div>
  <!--========= AKHIR COPYRIGHT========================-->  

  
  </div>
  </div><!--end kreasipage-->

  <!--========= KE ATAS ======================== -->
  <div id="back-top">
  <a href="#top"><img src=<?php echo "$f[folder]/images/balikatas.png" ?> width="20" height="20" title="go to top"/>
  </a>
  </div>
  <!--========= AKHIR KE ATAS ========================-->  
	
		
		
		
		
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>		
			
			
   </body>
   </html>
   
    <script>
	function tick(){
	$('#ticker_01 li:first').slideUp( function () { $(this).appendTo($('#ticker_01')).slideDown(); });}
	setInterval(function(){ tick () }, 5000);


	function tick2(){
	$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });}
	setInterval(function(){ tick2 () }, 5000);


	function tick3(){
	$('#ticker_03 li:first').animate({'opacity':0}, 200, function () { $(this).appendTo($('#ticker_03')).css('opacity', 3); });}
	setInterval(function(){ tick3 () }, 4000);	

	function tick4(){
	$('#ticker_04 li:first').slideUp( function () { $(this).appendTo($('#ticker_04')).slideDown(); });}

	$.ajax ({
    url: 'http://search.twitter.com/search.json',
	data: 'q=%23javascript',
	dataType: 'jsonp',
	timeout: 10000,
	success: function(data){
	if (!data.results){
	return false;}

	for( var i in data.results){
	var result = data.results[i];
	var $res = $("<li />");
	$res.append('<img src="' + result.profile_image_url + '" />');
	$res.append(result.text);

	console.log(data.results[i]);
	$res.appendTo($('#ticker_04'));}
	setInterval(function(){ tick4 () }, 4000);	

	$('#example_4').show(); }});
    </script>
	
    <script>
    selectnav('main_nav', {
  	label: ' MENU UTAMA ',
  	nested: true,
	activeclass: 'current-menu-item',
  	indent: '-'
	});
    </script>
	
	
    <!--========= Copyright © 2013. Depeloved by: Simri Nubatonis  ========================-->		  
