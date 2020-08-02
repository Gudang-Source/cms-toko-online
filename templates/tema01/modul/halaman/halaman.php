

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  

		
  <!--=========  DETAIL HALAMAN ========================-->
  <?php			
  $detail=mysqli_query($koneksi,"SELECT * FROM halamanstatis,users WHERE judul_seo='$_GET[judul]'");
  $d   = mysqli_fetch_array($detail);
  $tgl_posting   = tgl_indo($d[tgl_posting]);
  $baca = $d[dibaca]+1;
  
  mysqli_query($koneksi,"UPDATE halamanstatis SET dibaca='$baca' WHERE judul_seo='$_GET[judul]'");
	
  echo " 
  <div id='main' class='fixed box box-common'>
  <h2 class='heading-title'>$d[judul]</h2>";	
  
  echo "	
  <div class='meta'>
  <span class='posted_in'>Posted by: $d[nama_lengkap] | 
  <span class='posted_by'>$d[hari], $tgl_posting - $d[jam] WIB</span> 
  <span class='count_comments'>Read: $baca visitor</span> 
  </div>";
  
  
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  
  if ($d[gambar]!=''){
  
  echo "
  <div class='full_width'>
  <img src='img_statis/$d[gambar]' width=350 alt='$d[judul]' class='image-align-left2' />";}
	
  echo "
  <p>$d[isi_halaman]</p>
  
  <!--<div class='share'> 
  <div class='fb-like' data-href='$iden[url]/$iden[url]/hal-$d[judul_seo].html' data-send='false' 
  data-width='600' data-show-faces='false' data-colorscheme='light'></div>
  <div class='marginshare'> 
  <div class='addthis_toolbox addthis_default_style '>
  <a class='addthis_button_preferred_1'></a>
  <a class='addthis_button_preferred_2'></a>
  <a class='addthis_button_preferred_3'></a>
  <a class='addthis_button_preferred_4'></a>
  <a class='addthis_button_compact'></a>
  <a class='addthis_counter addthis_bubble_style'></a>
  </div> </div>
  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-504c13fd103cdd62'></script>  
  </div>------->
  </div>
  </div>";	 
  ?>  
  <!--=========  AKHIR DETAIL HALAMAN ========================-->
  
  </div>
  </div>