     
  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  



  <!--========= carabeli ========================-->  
  <?php
  $carabeli=mysqli_query($koneksi,"SELECT * FROM carabeli ORDER BY id_carabeli DESC");
  while($zal=mysqli_fetch_array($carabeli)){
  echo "
  <h1 class='cat_big_title'><img src='img_teraskreasi/$zal[gambar]'/><span>$zal[judul]</span></h1>
  ";}
  ?>

   	
  <?php
  $carabeli=mysqli_query($koneksi,"SELECT * FROM carabeli ORDER BY id_carabeli DESC");
  while($zal=mysqli_fetch_array($carabeli)){
  
			
  echo "
  <div id='main' class='fixed box box-common'>
  <div class='full_width'> ";
			
  if ($zal[gambar]!=''){
  echo "
  <p>$zal[isi_carabeli]</p>";}
        
  else{						
  echo " <p>$zal[isi_carabeli]</p>";}

			
  echo "
  </div>
  </div>
  <div class='clear'></div>";}
  ?>
  <!--========= AKHIR carabeli ========================-->  
            
	  
  </div>
  </div>