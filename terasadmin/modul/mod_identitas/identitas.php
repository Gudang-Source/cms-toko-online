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

  $aksi="modul/mod_identitas/aksi_identitas.php";
  switch($_GET[act]){
  // Tampil identitas
  default:
  
	
  // PESAN UPDATE
  if(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Identitas Website.
  </div>";}
  
  $sql  = mysqli_query($koneksi,"SELECT * FROM identitas LIMIT 1");
  $r    = mysqli_fetch_array($sql);

  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Identitas Website</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             

   
  <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
  <input type=hidden name=id value=$r[id_identitas]>
		 
	 
  <div class='row-form'>
  <div class='span3'>Nama Website</div>
  <div class='span9'><input type=text name='nama_website' value='$r[nama_website]'></div>
  <div class='clear'></div>
  </div>    
	 
	  
  <div class='row-form'>
  <div class='span3'>URL</div>
  <div class='span9'><input type=text name='url' value='$r[url]'>
  <p>Apabila di-onlinekan di web hosting, ganti URL dengan URL website anda. </p>
  <p class='ketadmin'>contoh: <span class style=\"color:#245689;font-size:12px;\">http://teraskreasi.com</span></p></div>
  <div class='clear'></div>
  </div>    
	  
	  
  <div class='row-form'>
  <div class='span3'>FB FanPage</div>
  <div class='span9'><input type=text name='facebook' value='$r[facebook]'>
  <p class style=\"color:#245689;font-size:12px;margin-bottom:-5px;\">contoh: https://www.facebook.com/teraskreasi</span></p></div>
  <div class='clear'></div>
  </div>    
	  
	 
  <div class='row-form'>
  <div class='span3'>Twitter</div>
  <div class='span9'><input type=text name='twitter' value='$r[twitter]'>
  <p class style=\"color:#245689;font-size:12px;margin-bottom:-5px;\">isi dengan username twitter anda</span></p></div>
  <div class='clear'></div>
  </div>    
	  
  <div class='row-form'>
  <div class='span3'>Meta Deskripsi</div>
  <div class='span9'><input type=text name='meta_deskripsi' value='$r[meta_deskripsi]'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Meta Keyword</div>
  <div class='span9'><input type=text name='meta_keyword'  value='$r[meta_keyword]'></div>
  <div class='clear'></div>
  </div>    
	  
	  
  <div class='row-form'>
  <div class='span3'>Email</div>
  <div class='span9'><input type=text name='email' value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
	  
	  
  <div class='row-form'>
  <div class='span3'>No. Telp/HP</div>
  <div class='span9'><input type=text name='no_telp' value='$r[no_telp]'></div>
  <div class='clear'></div>
  </div>    
	  
	  
  <div class='row-form'>
  <div class='span3'>No. Rekening</div>
  <div class='span9'><input type=text name='rekening' value='$r[rekening]'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Hari Kerja</div>
  <div class='span9'><input type=text name='hari_kerja' value='$r[hari_kerja]'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Jam Kerja</div>
  <div class='span9'><input type=text name='jam_kerja' value='$r[jam_kerja]'></div>
  <div class='clear'></div>
  </div>    
	
	
  <div class='row-form'>
  <div class='span3'>Alamat</div>
  <div class='span9'><textarea id='teraskreasi'  name='alamat' style='height: 200px;'>$r[alamat]</textarea></div>
  <div class='clear'></div>
  </div>  
  
  <div class='row-form'>
  <div class='span3'>Gambar Favicon</div>";
  echo "<div class='span9'><img src=../$r[favicon] width=30></div>
  <div class='clear'></div>
  </div>"; 

	
  echo "<div class='row-form'>
  <div class='span3'>Ganti Gambar Favicon</div>
  <div class='span9'><input type='file' name='fupload' />
  <p class style=\"color:#245689;font-size:12px;margin-bottom:-5px;\">
  (nama file gambar favicon harus <b>favicon.png)</b></p></div>
  <div class='clear'></div>
  </div>";


   echo "<div class='row-form'>
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


