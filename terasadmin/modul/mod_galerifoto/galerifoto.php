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


  $aksi="modul/mod_galerifoto/aksi_galerifoto.php";
  switch($_GET[act]){

  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Galeri Foto.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Galeri Foto.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Galeri Foto.
  </div>";}
  
   
  echo "
  <div class='workplace'>
  <form action='$aksi?module=galerifoto&act=hapussemua' method='post'>
  
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>GALERI GAMBAR PRODUK</h1>   
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=galerifoto&act=tambahgalerifoto'><span class='isw-plus'></span> Tambahkan Gambar</a></li>
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
  <th><center>Gambar</center></th>
  <th>Nama Produk</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
  
	
  if ($_SESSION['leveluser']=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM gallery,produk WHERE gallery.id_produk=produk.id_produk ORDER BY id_gallery DESC");}
	
  else{
    
  echo "<span class style=\"color:#FAFAFA;margin-top:-40px;\">$_SESSION[namauser]</span>";
  $tampil = mysqli_query($koneksi,"SELECT * FROM gallery,produk WHERE gallery.id_produk=produk.id_produk AND  
  gallery.username='$_SESSION[namauser]' ORDER BY id_gallery DESC");}
   
   
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
 
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_gallery]'></center></td>
  
  <td width=50><center>
  <a class='fancybox' rel='group' href='../img_galeri/$r[gbr_gallery]'>
  <img src='../img_galeri/kecil_$r[gbr_gallery]' width=50 class='tt' title='Perbesar Gambar'></a>
  </center></td>
  
  <td>$r[nama_produk]</td>
   
  <td width='8%'>
  <a href=?module=galerifoto&act=editgalerifoto&id=$r[id_gallery]>
  <center><img src='img/edit.png' class='tt' title='Edit Foto'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=galerifoto&act=hapus&id=$r[id_gallery]&namafile=$r[gbr_gallery]') >
  <center><img src='img/hapus.png' class='tt' title='Hapus Foto'></center></a> 
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
  //TAMBAH FOTO//////////////////////////////////////////////////////////////////////////////////////////
  case "tambahgalerifoto":
 
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Gambar Produk</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=galerifoto&act=input' enctype='multipart/form-data' >


  <div class='row-form'>
  <div class='span3'>Tambahkan Ke</div>
  <div class='span9'>
  <select name='produk' id='s2_1' >        
  <option value=0 selected>Pilih Produk</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM produk ORDER BY nama_produk");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[id_produk] >$r[nama_produk]</option>";}
 
  echo "</select></div> <div class='clear'></div>
  </div>    


  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=galerifoto'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
	
   
  break;
  // EDIT FOTO //////////////////////////////////////////////////////////////////////////
  case "editgalerifoto":
  $edit = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Gambar</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
	
  <form method=POST enctype='multipart/form-data' action=$aksi?module=galerifoto&act=update class='editprofileform'>
  <input type=hidden name=id value=$r[id_gallery]>
	
	
	   
  <div class='row-form'>
  <div class='span3'>Tambahkan Ke</div>
  <div class='span9'>
  <select name='produk' id='s2_1' >";
  $tampil=mysqli_query($koneksi,"SELECT * FROM produk ORDER BY nama_produk");
  if ($r[id_produk]==0){
  echo "<option value=0 selected>- Pilih Produk -</option>";}   
  while($w=mysqli_fetch_array($tampil)){
  if ($r[id_produk]==$w[id_produk]){
  echo "<option value=$w[id_produk] selected>$w[nama_produk]</option>";}
  else{
  echo "<option value=$w[id_produk]>$w[nama_produk]</option>"; }}
		  
  echo "</select></div> <div class='clear'></div>
  </div>    
	
	
		  
  <div class='row-form'>
  <div class='span3'>Gambar</div>";
  if ($r[gbr_gallery]!=''){
  echo "<div class='span9'>
  <a class='fancybox' rel='group' href='../img_galeri/$r[gbr_gallery]'>
  <img src='../img_galeri/kecil_$r[gbr_gallery]' width=80 class='tt' title='Perbesar Gambar'></a></div>
  <div class='clear'></div>
  </div>";}
  
  
		  
  echo "
  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>
  
	
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=galerifoto'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
	
	  
    break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   }
   ?>

  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>
