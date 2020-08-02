


  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
  


  <!--========= KIRIM PASSWORD ==================================-->
  
  <?php
  
  echo"
  <div class='box box-common'>
  <h2 class='heading-title'>Permintaan Password Baru</h2>
  <div class='content'>";          
	  
	  
  // Cek email kustomer di database
  $cek_email=mysqli_num_rows(mysqli_query($koneksi,"SELECT email FROM kustomer WHERE email='$_POST[email]'"));
  // Kalau email tidak ditemukan
  if ($cek_email == 0){
  
  echo "
  
  <div class='error-message'><h5>Email $_POST[email] tidak terdaftar pada database kami.</h5></div>
  <a href=javascript:history.go(-1)> <input type='submit' class='button button-orange' value='Ulangi Lagi' name='submit'/></a>
  </div></div>";}
  
  else{
  $password_baru = substr(md5(uniqid(rand(),1)),3,10);

  // ganti password kustomer dengan password yang baru (reset password)
  $query=mysqli_query($koneksi,"update kustomer set password=md5('$password_baru') where email='$_POST[email]'");

  // dapatkan email_pengelola dari database
  $sql2 = mysqli_query($koneksi,"select email_pengelola from modul where id_modul='43'");
  $j2   = mysqli_fetch_array($sql2);
  $teraskreasi=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
 
  $subjek="Password Baru $teraskreasi[email]";
  $pesan="Password Anda yang baru adalah <b>$password_baru</b>";
  // Kirim email dalam format HTML
  $dari = "Dari: $teraskreasi[email]\r\n";
  $dari .= "Content-type: text/html\r\n";

  // Kirim password ke email kustomer
  mail($_POST[email],$subjek,$pesan,$dari);
  
  echo " 
  <h1 class='cat_big_title'>
  <img height=200 src='img_header/header_daftar.jpg'/>
  <span class style=\"color:#FFF;\">Password Telah Terkirim</span>
  </h1>
  <h4>Silahkan cek email Anda. Selanjutnya Anda dapat login menggunakan password baru.</h4>
  </div></div>";} 
  ?>
  <!--========= AKHIR KIRIM PASSWORD  =======================================-->
  </div></div>