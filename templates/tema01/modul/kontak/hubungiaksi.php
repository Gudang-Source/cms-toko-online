  

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
 
  <?php
  
  echo "

  <div class='box box-common'>
  <h2 class='heading-title'>Hubungi Kami</h2>
  <div class='contact-info'>
  <div class='content'>";          
  
  
  $teraskreasi=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));

  if(!empty($_POST['username'])){
      
  mysqli_query($koneksi,"INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
  echo "
  <h1 class='cat_big_title'>
  <img src='img_header/header_daftar.jpg'/>
  <span class style=\'color:#FFF;\'>Terima Kasih</span>
  </h1>
  <h5>Akun anda telah berhasil dibuat. Silahkan login <a href='login.html'>disini</a></h5>";
   
  }    
  echo "</div></div></div>
  </div>"; 
		  
  ?>
    </div>
    </div>