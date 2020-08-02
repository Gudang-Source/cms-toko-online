
  <?php 
  error_reporting(0);
  $theme=mysqli_fetch_array(mysqli_query("SELECT * FROM perbaikan"));
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  
  <HEAD>
  
  <title><?php include "terasconfig/teraskreasi_titel.php"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow">
  <meta name="description" content="<?php include "terasconfig/teraskreasi1.php"; ?>">
  <meta name="keywords" content="<?php include "terasconfig/teraskreasi2.php"; ?>">
  <meta http-equiv="Copyright" content="Simri Nubatonis" "simri_n@yahoo.com">
  <meta name="author" content="Simri Nubatonis" "http://simriresto.com">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Betawi-Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
  <link rel="shortcut icon" href="favicon.png" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
   
   
		
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/style.css" ?>" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/bootstrap-responsive.css" ?>" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/bootstrap.css" ?>" />
  <link rel="stylesheet" href="<?php echo "$f[folder]/css/$theme[warna].css" ?>" />
		
		
		
  </head>
  <body>		
  <div id="bgstyle"></div>
  <div id="top"></div>
  <div id="content" class="container pagination-centered" >
  <div class="container pagination-centered">
		
		
			
  <div id="logo">
  <?php
  $logo=mysqli_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
  while($b=mysqli_fetch_array($logo)){
  echo "<a href='index.php'><img src='logo/$b[gambar]'/></a>";}
  ?>      			
  </div>
				
				
  <h2 class="headline"><?php echo "$theme[judul_perbaikan]" ?></h2>
  <div class="estimasi">dengan estimasi waktu:</div>
  <div id="countdownblock">	
  <div id="countdown"></div>
  <div class="clearfix"></div>
  </div>
				
	
				
  <center><?php echo "$theme[kuota]" ?></center>


  <br/><br/>


  <div id="bottom">
  <ul class="socialicons bw margin-center">
  <li><a class="facebook" target="_blank" href="http://www.facebook.com/share.php?u=<?php include "terasconfig/url.php";?>">
  </a></li>
  <li><a class="twitter" target="_blank" href="http://twitter.com/home?status=<?php include "terasconfig/url.php";?>">
  </a></li>
  </ul>
  </div>
  </div>

		
  <script src="<?php echo "$f[folder]/js/jquery.min.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/bootstrap.min.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/jquery.countdown.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/styleswitch.js" ?>" type="text/javascript"></script>
  <script src="<?php echo "$f[folder]/js/scripts.js" ?>" type="text/javascript"></script>
  <script type="text/javascript">countdown(<?php echo "$theme[tanggal]" ?>,0,0,0);</script>
		
  </body>
  </html>