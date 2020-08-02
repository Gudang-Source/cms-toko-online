  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
  

  <!--========= BANNER DAFTAR========================-->  
  <h1 class='cat_big_title'>
  <img src='img_header/header_daftar.jpg'/>
  <span class style=\"color:#FFF;\">Permintaan Password Baru</span>
  </h1>
  <!--========= AKHIR BANNER DAFTAR ========================-->  



  <!--========= LUPA PASSWORD================================-->
  <?php
  echo"
  <div class='box box-common'>";  
  	  
  echo "  
  <div class='contact-form'>
  <form name=form3 action=kirim-password.html method=POST>
  
  <br/><div class='content'> <span><h5>Masukan Email Anda:</h5></span>
  <input required type='text' size='100%' name='email' id='email'>
  </div>
	  
  <input type='submit' class='button button-orange' value='Kirim Permintaan' name='submit' />
  </form>
  
  </div></div>";	 	
  ?>
  <!--========= AKHIR  LUPA PASSWORD ==========================-->
  </div>
  </div>