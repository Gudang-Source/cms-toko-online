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


  $aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
  switch($_GET[act]){

  
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Halaman.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Halaman.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Halaman.
  </div>";}

   echo "
   <div class='workplace'>
   <form action='$aksi?module=halamanstatis&act=hapussemua' method='post'>
   
   <div class='row-fluid'>
   <div class='span12'>                    
   <div class='head'>
   <div class='isw-grid'></div>
   <h1>HALAMAN BARU</h1>   
   
   <ul class='buttons'>
   <li class='ttLC' title='Control Panel'>
   <a href='#' class='isw-settings'></a>
   <ul class='dd-list'>
   <li><a href='?module=halamanstatis&act=tambahhalamanstatis'><span class='isw-plus'></span> Tambahkan Halaman</a></li>
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
  <th>Judul</th> 
  <th>Link</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  
  </tr>
  </thead>";


  $p      = new Paging;
  $batas  = 15;
  $posisi = $p->cariPosisi($batas);

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM halamanstatis ORDER BY id_halaman DESC LIMIT $posisi,$batas");}
	
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM halamanstatis 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_halaman DESC LIMIT $posisi,$batas");}
  
  
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
  $tgl_posting=tgl_indo($r[tgl_posting]);
	
  echo " 
  <tr> 
	  
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_halaman]'></center></td>
  <td>$r[judul]</td> 
  <td>hal-$r[judul_seo].html</td>
  
  <td width='8%'>
  <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]>
  <center><img src='img/edit.png' class='ttLC' title='Edit Halaman'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]')>
  <center><img src='img/hapus.png' class='ttLC' title='Hapus Halaman'></center></a> 
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


  if ($_SESSION[leveluser]=='admin'){
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM halamanstatis"));}
  
  else{
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM halamanstatis WHERE username='$_SESSION[namauser]'"));}  
  
  break; }
  
  else{
  
  echo "
  <thead>
  <tr>
  
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Judul</th> 
  <th>Link</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  
  </tr>
  </thead>";

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM halamanstatis WHERE judul LIKE '%$_GET[kata]%' 
  ORDER BY id_halaman DESC LIMIT $posisi,$batas");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM halamanstatis 
  WHERE username='$_SESSION[namauser]'
  AND judul LIKE '%$_GET[kata]%'       
  ORDER BY id_halaman DESC LIMIT $posisi,$batas");}
  
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
	  
	  
  echo " 
  <tr> 
	  
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_halaman]'></center></td>
  <td>$r[judul]</td> 
  <td>hal-$r[judul_seo].html</td>
  
  <td width='8%'>
  <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]>
  <center><img src='img/edit.png' class='ttLC' title='Edit Halaman'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]')>
  <center><img src='img/hapus.png' class='ttLC' title='Hapus Halaman'></center></a> 
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
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM halamanstatis WHERE judul LIKE '%$_GET[kata]%'"));}

  else{
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM halamanstatis 
  WHERE username='$_SESSION[namauser]' AND judul LIKE '%$_GET[kata]%'"));}  
  
  
  break;}
  ////TAMBAH HALAMAN///////////////////////////////////////////////////////////////////////////
  case "tambahhalamanstatis":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Halaman</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>    	
  <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data' >
		  
	
  <div class='row-form'>
  <div class='span3'>Judul</div>
  <div class='span9'><input type=text name='judul'></div>
  <div class='clear'></div>
  </div>    
	

  <div class='row-form'>
  <div class='span3'>Isi Halaman</div>
  <div class='span9'> <textarea id='teraskreasi'  name='isi_halaman' style='height: 250px;'></textarea></div>
  <div class='clear'></div>
  </div>    
	

  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>    
		   	  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
	
	  
	  
  break;
  //EDIT HALAMAN//////////////////////////////////////////////////////////////////////////////////////////
  case "edithalamanstatis":
  $edit = mysqli_query($koneksi,"SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]' AND username='$_SESSION[namauser]'");
  $r    = mysqli_fetch_array($edit);
   
   
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Halaman</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>    	

  <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
  <input type=hidden name=id value=$r[id_halaman]>

  <div class='row-form'>
  <div class='span3'>Judul</div>
  <div class='span9'> <input type=text name='judul' value='$r[judul]'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Isi Halaman</div>
  <div class='span9'><textarea id='teraskreasi' name='isi_halaman' style='height: 350px;'>$r[isi_halaman]</textarea></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><a class='fancybox' rel='group' href='../img_statis/$r[gambar]'>
  <img src='../img_statis/$r[gambar]' width=200 class='tt' title='Perbesar Gambar'></a></div>
  <div class='clear'></div>
  </div>    

  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>   

  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
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

