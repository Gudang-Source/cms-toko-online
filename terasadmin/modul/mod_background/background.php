  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>


<?php    
session_start();
  //Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
  if(count(get_included_files())==1)
  {
  echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
  exit("Direct access not permitted.");}
  
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  /////////////////////////////////////////////////////////////////////////////////////
  
   
  echo "
  <link href='../../css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  <body class='special-page'>
  <div id='container'>
  
  <section id='error-number'>
  <center><div class='gembok'><img src='../../img/lock.png'></div></center>
  <h1>AKSES ILEGAL</h1>
  <p class='maaf'>Untuk mengakses modul, Anda harus login dahulu!</p><br/>
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href=../../index.php><b>LOGIN DISINI</b></a></p>
  </section>
  </div>";}
  
  
  else{
  //cek hak akses user
  $cek=user_akses($_GET[module],$_SESSION[sessid]);
  if($cek==1 OR $_SESSION[leveluser]=='admin'){
  
  
  $aksi="modul/mod_background/aksi_background.php";
  $r=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM background"));
  

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Background Website</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST enctype='multipart/form-data' action=$aksi?module=background&act=update>
  <input type=hidden name=id value=$r[id_background]>
		  
  <div class='row-form'>
  <div class='span3'>Gambar</div>";
  if ($r[gambar]!=''){
  echo "<div class='span9'>
  <a class='fancybox' rel='group' href='../$r[gambar]'>
  <img src='../$r[gambar]' width=300 class='tt' title='Perbesar Gambar'></a>
  </div>
  <div class='clear'></div>
  </div>";

  echo "
  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input name='gambar' type='file' id='gambar'/></div>
  <div class='clear'></div>
  </div> ";   
  
  
  
  echo "	
  <div class='row-form'>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>


  </form>
  </div></div></div>";

	
  break;}} 
	
  else {
  echo akses_salah();
  }
  }
  ?>

