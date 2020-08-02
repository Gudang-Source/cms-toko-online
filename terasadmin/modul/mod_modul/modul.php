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


  $aksi="modul/mod_modul/aksi_modul.php";
  switch($_GET[act]){
  
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Modul.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Modul.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Modul.
  </div>";}
  

  echo "
  <div class='workplace'>
  <form action='$aksi?module=modul&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>MANAJEMEN MODUL</h1>    
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=modul&act=tambahmodul'><span class='isw-plus'></span> Tambahkan Modul</a></li>
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
  <th><center>Urutan</center></th>
  <th>Nama Modul</th>
  <th>Link</th>
  <th><center>Publish</center></th>
  <th><center>Aktif</center></th>
  <th><center>Status</center></th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
		  

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM modul ORDER BY urutan DESC");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM modul 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY urutan DESC");}
  
  while ($r=mysqli_fetch_array($tampil)){
	
	
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_modul]'></center></td>
  <td><center>$r[urutan]</center></td>
  <td>$r[nama_modul]</td>
  <td><a href=$r[link]>$r[link]</a></td>
  <td><center>$r[publish]</center></td>
  <td><center>$r[aktif]</center></td>
  <td><center>$r[status]</center></td>

  <td width='8%'>
  <a href=?module=modul&act=editmodul&id=$r[id_modul]>
  <center><img src='img/edit.png' class='tt' title='Edit Modul'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=modul&act=hapus&id=$r[id_modul]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus Modul'></center></a> 
  </td>
 
  </tr>";}
	
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";
	
	
  break;
  //TAMBAH MOSUL////////////////////////////////////////////////////////////////////////////////////////
  case "tambahmodul":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Modul</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=modul&act=input'>

   
  <div class='row-form'>
  <div class='span3'>Nama Modul</div>
  <div class='span9'><input type=text name='nama_modul'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Link</div>
  <div class='span9'><input type=text name='link'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Publish</div>
  <div class='span9'>
  <input type=radio name='publish' value='Ya' checked>Ya 
  <input type=radio name='publish' value='Tidak'>Tidak
  </div>
  <div class='clear'></div>
  </div>    

  
  <div class='row-form'>
  <div class='span3'>Aktif</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya' checked>Ya 
  <input type=radio name='aktif' value='Tidak'>Tidak
  </div>
  <div class='clear'></div>
  </div>    
  
  
  <div class='row-form'>
  <div class='span3'>Aktif</div>
  <div class='span9'>
  <input type=radio name='status' value='admin' checked>Admin 
  <input type=radio name='status' value='user'>User
  </div>
  <div class='clear'></div>
  </div>    
  
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=modul'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  


  break;
  //EDIT MODUL////////////////////////////////////////////////////////////////////////////////////////////////////////
  case "editmodul":
  
  $edit = mysqli_query($koneksi,"SELECT * FROM modul WHERE id_modul='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);

  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Modul</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>      
  <form method=POST action=$aksi?module=modul&act=update>
  <input type=hidden name=id value='$r[id_modul]'>
	
  
  <div class='row-form'>
  <div class='span3'>Nama Modul</div>
  <div class='span9'><input type=text name='nama_modul' value='$r[nama_modul]'></div>
  <div class='clear'></div>
  </div>    

  <div class='row-form'>
  <div class='span3'>Link</div>
  <div class='span9'><input type=text name='link'  value='$r[link]'></div>
  <div class='clear'></div>
  </div> ";   
		
		
  if ($r[publish]=='Ya'){
  echo "
  <div class='row-form'>
  <div class='span3'>Publish</div>
  <div class='span9'>
  <input type=radio name='publish' value='Ya' checked>Ya 
  <input type=radio name='publish' value='Tidak'>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Publish</div>
  <div class='span9'>
  <input type=radio name='publish' value='Ya'>Ya 
  <input type=radio name='publish' value='Tidak'  checked>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
	
		
		
  if ($r[aktif]=='Ya'){
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya' checked>Ya
  <input type=radio name='aktif' value='Tidak'>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya'>Ya
  <input type=radio name='aktif' value='Tidak' checked>Tidak 
  </div>
  <div class='clear'></div>
  </div>";}
	
	
	
  if ($r[status]=='user'){
  echo "
  <div class='row-form'>
  <div class='span3'>Status</div>
  <div class='span9'>
  <input type=radio name='status' value='user' checked>User
  <input type=radio name='status' value='admin'>Admin 
  </div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Status</div>
  <div class='span9'>
  <input type=radio name='status' value='user'>User
  <input type=radio name='status' value='admin' checked>Admin 
  </div>
  <div class='clear'></div>
  </div>";}	
	
		
  echo "
  <div class='row-form'>
  <div class='span3'>Urutan</div>
  <div class='span9'><input type=text name='urutan' value='$r[urutan]'></div>
  <div class='clear'></div>
  </div>    

  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=modul'>Batal</a>
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
