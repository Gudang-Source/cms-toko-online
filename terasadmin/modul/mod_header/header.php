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

  $aksi="modul/mod_header/aksi_header.php";
  switch($_GET[act]){
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Header Website.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Header Website.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Header Website.
  </div>";}
	 
	 
	 
	 
  echo "
  <div class='workplace'>
  <form action='$aksi?module=header&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>HEADER WEBSITE</h1>
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=header&act=tambahheader' ><span class='isw-plus'></span> Tambahkan Header</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
                              
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
		  
		  
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Judul</th>
  <th>Link Header</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
		 
		  
  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM header INNER JOIN kategori ON header.id_kategori=kategori.id_kategori 
  ORDER BY id_header DESC");}
	  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM header INNER JOIN kategori ON header.id_kategori=kategori.id_kategori
  WHERE username='$_SESSION[namauser]'       
  ORDER BY header DESC");}		
	
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
  $tgl=tgl_indo($r[tgl_posting]);
	  
				
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_header]'></center></td>
  <td>$r[judul]</td>
  <td>Kategori: $r[nama_kategori]</td>
 
  <td width='8%'>
  <a href=?module=header&act=editheader&id=$r[id_header]>
  <center><img src='img/edit.png' class='tt' title='Edit Header'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=header&act=hapus&id=$r[id_header]&namafile=$r[gambar]') >
  <center><img src='img/hapus.png' class='tt' title='Hapus Header'></center></a> 
  </td>
   
  </tr>";
				
  $no++;}
  
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";
  
  
  
  break;
  //TAMBAHKAN HEADER////////////////////////////////////////////////////////////////////////////////////////////////////
  case "tambahheader":
  
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Header</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=header&act=input' enctype='multipart/form-data'>
		  
		  
  <div class='row-form'>
  <div class='span3'>Link Header</div>
  <div class='span9'>        
  <select name='kategori'>
  <option value=0 selected>Pilih Link</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY nama_kategori");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>"; }
  echo "</select>  </div><div class='clear'></div>
  </div>";
  
  echo "
  <div class='row-form'>
  <div class='span3'>Judul</div>
  <div class='span9'><input type=text name='judul'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>  
   
   
  <div class='row-form'>
  <div class='span3'>Keterangan Gambar</div>
  <div class='span9'><textarea id='teraskreasi' name='keterangan_gambar'  style='height: 350px;'></textarea></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=header'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
	  
	  
  break;
  //EDIT HEADER/////////////////////////////////////////////////////////////////////////////////////////////////// 
  case "editheader":
  $edit = mysqli_query($koneksi,"SELECT * FROM header WHERE id_header='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Header</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST enctype='multipart/form-data' action=$aksi?module=header&act=update>
  <input type=hidden name=id value=$r[id_header]>
  
  
  <div class='row-form'>
  <div class='span3'>Link Header</div>
  <div class='span9'>        
  <select name='kategori'>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY nama_kategori");
  if ($r[id_kategori]==0){
  echo "<option value=0 selected>Pilih Link</option>"; }   

  while($w=mysqli_fetch_array($tampil)){
  if ($r[id_kategori]==$w[id_kategori]){
  echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";}
  else{
  echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";}}

  echo "</select> </div><div class='clear'></div>
  </div>";

  
  echo "
  <div class='row-form'>
  <div class='span3'>Judul</div>
  <div class='span9'><input type=text name='judul' value='$r[judul]'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><a class='fancybox' rel='group' href='../img_header/$r[gambar]'>
  <img width=500 src='../img_header/$r[gambar]' width=200 class='tt' title='Perbesar Gambar'></a></div>
  <div class='clear'></div>
  </div>    
	  
  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>

   
  <div class='row-form'>
  <div class='span3'>Keterangan Gambar</div>
  <div class='span9'><textarea id='teraskreasi' name='keterangan_gambar' 
  style='height: 200px;'>$r[keterangan_gambar]</textarea></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=header'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  	  
  break; }
	
  } else {
  echo akses_salah();
  }
  }
  ?>

  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus ini?")) {
  document.location = delUrl;}}
  </script>
