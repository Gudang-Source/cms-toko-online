	
	
  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  



  <!--========= PROFIL ========================-->  
  <?php
  $profil=mysqli_query($koneksi,"SELECT * FROM profil ORDER BY id_profil DESC");
  while($zal=mysqli_fetch_array($profil)){
  echo "
  <h1 class='cat_big_title'><img src='img_teraskreasi/$zal[gambar]'/><span>$zal[judul]</span></h1>
  ";}
  ?>

   	
  <?php
  $profil=mysqli_query($koneksi,"SELECT * FROM profil ORDER BY id_profil DESC");
  while($zal=mysqli_fetch_array($profil)){
  
			
  echo "
  <div id='main' class='fixed box box-common'>
  <div class='full_width'> ";
			
  if ($zal[gambar]!=''){
  echo "
  <p>$zal[isi_profil]</p>";}
        
  else{						
  echo " <p>$zal[isi_profil]</p>";}

			
  echo "
  </div>
  </div>
  <div class='clear'></div>";}
  ?>
  <!--========= AKHIR PROFIL ========================-->  
            
  </div>
  </div>