<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){  
 
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

  $aksi="modul/mod_perbaikan/aksi_perbaikan.php";
  switch($_GET[act]){
  
  
  default:
  
	
  // PESAN UPDATE
  if(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Perbaikan Website.
  </div>";}
  
  
  $sql  = mysqli_query($koneksi,"SELECT * FROM perbaikan LIMIT 1");
  $r    = mysqli_fetch_array($sql);


  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Maintenance Website</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  
  <form method=POST enctype='multipart/form-data' action=$aksi?module=perbaikan&act=update class='editprofileform'>
  <input type=hidden name=id value=$r[id_perbaikan]>
		  
 		
		
  <div class='row-form'>
  <div class='span3'>Setting Waktu</div>
  <div class='span9'><input type=text name='tanggal' value='$r[tanggal]'>
  <p class style=\"font-size:12px;margin-bottom:-5px;\">Format: Tahun,Bulan,Tanggal. 
  contoh: <span class style=\"color:#245689;font-size:12px;\">2013,03,13</span></p></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Template</div>
  <div class='span9'><input type=text name='warna' class='input-xlarge' value='$r[warna]'>
  <img src='../terasadmin/img/plih_theme.jpg'></div>
  <div class='clear'></div>
  </div>    
		
  <div class='row-form'>
  <div class='span3'>Judul Perbaikan</div>
  <div class='span9'><input type=text name='judul_perbaikan' value='$r[judul_perbaikan]'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Deskripsi</div>
  <div class='span9'><textarea id='teraskreasi'  name='kuota' style='height: 200px;'>$r[kuota]</textarea></div>
  <div class='clear'></div>
  </div>    
	
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



  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>
