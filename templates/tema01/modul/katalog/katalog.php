  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
  
  
  <!--========= DOWNLOAD KATALOG ========================-->
						
  <?php
  $p      = new Katalog;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
  
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  
  echo "   
  <div id='main' class='fixed box box-common'>
  <h2 class='heading-title'>Download Katalog <span class='text-orange'>$iden[nama_website]</span></h2><ul>";	
  
  
  $sql = mysqli_query($koneksi,"SELECT * FROM download  ORDER BY id_download DESC LIMIT $posisi,$batas");		  
  while($d=mysqli_fetch_array($sql)){
  echo "
  <h3><a href='terasconfig/downlot.php?file=$d[nama_file]'>
  <span class='download3'><li>$d[judul]</a><span class='download2'>  
  <span class style=\"color:#999;font-size:14px;\">( didownload: $d[hits] x )</span></li></h3>";}
							
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM download"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldownload], $jmlhalaman);

  echo "</ul><div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div> </div>";
  ?>
  
  <!--=========  AKHIR DOWNLOAD KATALOG ========================-->
												
  </div>
  </div>	