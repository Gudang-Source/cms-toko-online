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

  $aksi="modul/mod_sambutan/aksi_sambutan.php";
  switch($_GET[act]){
  // Tampil sambutan
  default:
  
	
  // PESAN UPDATE
  if(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Kata Sambutan.
  </div>";}
  
  $sql  = mysqli_query($koneksi,"SELECT * FROM sambutan");
  $r    = mysqli_fetch_array($sql);

  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Kata Sambutan</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             

   
  <form method=POST enctype='multipart/form-data' action=$aksi?module=sambutan&act=update>
  <input type=hidden name=id value=$r[id_sambutan]>
		 
   
  <div class='row-form'>
  <div class='span3'>Judul</div>
  <div class='span9'><input type=text name='judul' value='$r[judul]'></div>
  <div class='clear'></div>
  </div>
  
  
  <div class='row-form'>
  <div class='span3'>Deskripsi</div>
  <div class='span9'><textarea name='isi_sambutan' id='teraskreasi' style='height: 350px;'>$r[isi_sambutan]
  </textarea></div>
  <div class='clear'></div>
  </div>      
	
  <div class='row-form'>
  <div class='span3'>Gambar</div>";
  if ($r[gambar]!=''){
  echo "<div class='span9'>
  <a class='fancybox' rel='group' href='../img_teraskreasi/$r[gambar]'>
  <img src='../img_teraskreasi/small_$r[gambar]' width=200 class='tt' title='Perbesar Gambar'></a></div>
  <div class='clear'></div>
  </div> "; 

	
  echo "
  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>    
  
  
  <div class='row-form'>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>


  </form>
  </div></div></div>";
   
	
  break;}}} 
	
  else {
  echo akses_salah();
  }
  }
  ?>