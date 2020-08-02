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



  $aksi="modul/mod_kategoriblog/aksi_kategoriblog.php";
  switch($_GET[act]){

  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Kategori Artikel.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Kategori Artikel.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Kategori Artikel.
  </div>";}
  
  
  echo "
  <div class='workplace'>
  <form action='$aksi?module=kategoriblog&act=hapussemua' method='post'>

  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>KATEGORI BLOG</h1>    
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=kategoriblog&act=tambahkategoriblog'><span class='isw-plus'></span> Tambahkan Kategori</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
                             
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>";

  if (empty($_GET['kata'])){
	
  echo "
  
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Nama Kategori</th>
  <th>Link</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";

  $p      = new Paging;
  $batas  = 15;
  $posisi = $p->cariPosisi($batas);

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM kategoriblog ORDER BY id_kategoriblog DESC");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM kategoriblog 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_kategoriblog DESC");}
  
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){

  echo "
  <tr> 
  <td><center><input type='checkbox' name='cek[]' value='$r[id_kategoriblog]'></center></td>
  <td>$r[nama_kategoriblog]</td>
  <td>kategoriblog-$r[id_kategoriblog]-$r[kategoriblog_seo].html</td>
  
  <td>
  <a href=?module=kategoriblog&act=editkategoriblog&id=$r[id_kategoriblog]>
  <center><img src='img/edit.png' class='ttLC' title='Edit Kategori Artikel'></center></a>
  </td>
   
  <td>
  <a href=javascript:confirmdelete('$aksi?module=kategoriblog&act=hapus&id=$r[id_kategoriblog]') >
  <center><img src='img/hapus.png' class='ttLC' title='Hapus Kategori Artikel'></center></a> 
  </td>
   
  </tr>";
   
  $no++;}
 
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";

  if ($_SESSION[leveluser]=='admin'){
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kategoriblog"));}
  
  else{
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kategoriblog WHERE username='$_SESSION[namauser]'"));} 
   
  break;}
  else{
  
  echo "
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Nama Kategori</th>
  <th>Link</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";


  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM kategoriblog WHERE nama_kategoriblog LIKE '%$_GET[kata]%' 
  ORDER BY id_kategoriblog DESC");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM kategoriblog 
  WHERE username='$_SESSION[namauser]'
  AND nama_kategoriblog LIKE '%$_GET[kata]%'       
  ORDER BY id_kategoriblog DESC");}
  
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
	  

  echo "
  <tr> 
  <td><center><input type='checkbox' name='cek[]' value='$r[id_kategoriblog]'></center></td>
  <td>$r[nama_kategoriblog]</td>
  <td>kategoriblog-$r[id_kategoriblog]-$r[kategoriblog_seo].html</td>
  
  <td>
  <a href=?module=kategoriblog&act=editkategoriblog&id=$r[id_kategoriblog]>
  <center><img src='img/edit.png' class='ttLC' title='Edit Kategori Artikel'></center></a>
  </td>
   
  <td>
  <a href=javascript:confirmdelete('$aksi?module=kategoriblog&act=hapus&id=$r[id_kategoriblog]') >
  <center><img src='img/hapus.png' class='ttLC' title='Hapus Kategori Artikel'></center></a> 
  </td>
   
  </tr>";
			 
  $no++;}
 
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";


  if ($_SESSION[leveluser]=='admin'){
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kategoriblog WHERE nama_kategoriblog LIKE '%$_GET[kata]%'"));}
  
  else{
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kategoriblog WHERE username='$_SESSION[namauser]' 
  AND nama_kategoriblog LIKE '%$_GET[kata]%'"));}  
  
  
  
  break;}
  //TAMBAH KATEGORI///////////////////////////////////////////////////////////////////////////////
  case "tambahkategoriblog":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Kategori Blog</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=kategoriblog&act=input'>
		  
  <div class='row-form'>
  <div class='span3'>Nama Kategori</div>
  <div class='span9'><input type=text name='nama_kategoriblog'></div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=kategoriblog'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
	
	
	
  break;
  //EDIT KATEGORI///////////////////////////////////////////////////////////////////////////////
  case "editkategoriblog":
  $edit=mysqli_query($koneksi,"SELECT * FROM kategoriblog WHERE id_kategoriblog='$_GET[id]'");
  $r=mysqli_fetch_array($edit);

  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Kategori Blog</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action=$aksi?module=kategoriblog&act=update>
  <input type=hidden name=id value='$r[id_kategoriblog]'>
  
  
  <div class='row-form'>
  <div class='span3'>Nama Kategori</div>
  <div class='span9'><input type=text name='nama_kategoriblog' value='$r[nama_kategoriblog]'></div>
  <div class='clear'></div>
  </div> ";   
  
		
  echo "
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=kategoriblog'>Batal</a>
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