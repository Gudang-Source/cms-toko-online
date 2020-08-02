  

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  



  <!--=========  TESTIMONI  ========================-->
  <?php
  echo "
  <div class='box box-common'>
  <h2 class='heading-title'>Hubungi Kami</h2>
  <div class='contact-info'>
  <div class='content'>";      
       
  $nama=trim($_POST[nama]);
  $email=trim($_POST[email]);
  $pesan=trim($_POST[pesan]);

  $teraskreasi=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));

	   
  if (empty($nama)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan NAMA</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
		  
  elseif (empty($email)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan EMAIL</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
		 
  
  elseif (empty($pesan)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan PESAN</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
  
  else{
  function antiinjection($data){
  $filter_sql = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;}

  $nama = antiinjection($_POST['nama']);
  $email = antiinjection($_POST['email']);
  $pesan = antiinjection($_POST['pesan']);

  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  // Mengatasi input komentar tanpa spasi
  $split_text = explode(" ",$pesan);
  $split_count = count($split_text);
  $max = 57;

  for($i = 0; $i <= $split_count; $i++){
  if(strlen($split_text[$i]) >= $max){
  for($j = 0; $j <= strlen($split_text[$i]); $j++){
  $char[$j] = substr($split_text[$i],$j,1);
  if(($j % $max == 0) && ($j != 0)){
  $v_text .= $char[$j] . ' ';
  }else{
  $v_text .= $char[$j]; }}
  }else{
  $v_text .= " " . $split_text[$i] . " ";}}


  mysqli_query($koneksi,"INSERT INTO testimoni(nama,
                                    email,
                                    pesan,
                                    tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$v_text',
                               '$tgl_sekarang')");
 
  echo "
  <h1 class='cat_big_title'>
  <img src='img_header/header_daftar.jpg'/>
  <span class style=\'color:#FFF;\'>Terima Kasih</span>
  </h1>
  <h5>Atas testimoni anda di $teraskreasi[nama_website], kami segera merespon pesan anda.</h5>";
   
   
   $kepada = "$teraskreasi[email]"; 
   $judul = "Ada Testimoni di $teraskreasi[nama_website]";
   $pesan = "Baru saja ada yang kirim testimoni di $teraskreasi[nama_website]\n"; 
   $pesan .= "Cek Administrator: $teraskreasi[url]/editweb"; 
   mail($kepada,$judul,$pesan,"From: $teraskreasi[email]\n Content-type:text/html\r\n"); }
   
  
  else{
  echo "<br/><div class='error-message'><h5>Kode yang Anda masukkan tidak cocok !</h5></div>
  <a href=javascript:history.go(-1)><input type='submit' class='button' value='Ulangi Lagi' name='submit'/>
  </a></center><br/>";}}
  
  else{
  echo "<span class='new-comment-heading'>Anda belum memasukkan kode</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}}
    
  echo "</div></div></div>
  </div>"; 
		  
  ?>
  <!--=========  AKHIR TESTIMONI  ========================-->
  
  </div>
  </div>