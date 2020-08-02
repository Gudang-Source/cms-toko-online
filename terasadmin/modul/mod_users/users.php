  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>


<?php    
session_start();
  //Deteksi hanya bisa diinclude, tidak dapat langsung dibuka (direct open)
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


  $aksi="modul/mod_users/aksi_users.php";
  switch($_GET[act]){
  
  default:  
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan User Admin.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update User Admin.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus User Admin.
  </div>";}

  if (empty($_GET['kata'])){
	
  
  echo "
  <div class='workplace'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>MANAJEMEN USER ADMIN</h1>  
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=user&act=tambahuser'><span class='isw-plus'></span> Tambahkan User</a></li>
  </ul>
  </li>
  </ul>     
  
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
		  
  <thead>
  <tr>
  <th><center>No</center></th> 
  <th>Username</th> 
  <th>Nama Lengkap</th> 
  <th>Email</th>
  <th><center>Foto</center></th>
  <th>Blokir</th> 
  <th><center>Edit</center></th>
  </tr>
  </thead>";

  $p      = new Paging;
  $batas  = 15;
  $posisi = $p->cariPosisi($batas);

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM users ORDER BY id_session DESC LIMIT $posisi,$batas");}
	
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'");}
  
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
	
	
  echo "
  <tr> 
  <td width='8%'><center>$no</center></td>
  <td>$r[username]</td>
  <td>$r[nama_lengkap]</td>
  <td><a href=mailto:$r[email]>$r[email]</a></td>
  
  <td width=50><center>
  <a class='fancybox' rel='group' href='../img_user/$r[foto]'>
  <img src='../img_user/small_$r[foto]' width=50 class='tt' title='Perbesar Gambar'></a>
  </center></td>
  
  <td><center>$r[blokir]</center></td>
   
  <td width='8%'>
  <a href=?module=user&act=edituser&id=$r[id_session]>
  <center><img src='img/edit.png' class='tt' title='Edit User'></center></a>
  </td>
   
  </tr>";
   
  $no++;}
 
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";


  break;}

  case "tambahuser":
  //TAMBAH USER///////////////////////////////////////////////////////////////////////////////////////////////////
  if ($_SESSION[leveluser]=='admin'){
   
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan User</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=user&act=input' enctype='multipart/form-data' class='editprofileform' >
	 	
		
  <div class='row-form'>
  <div class='span3'>Username</div>
  <div class='span9'><input type=text name='username'></div>
  <div class='clear'></div>
  </div>    
		

  <div class='row-form'>
  <div class='span3'>Password</div>
  <div class='span9'><input type=text name='password'></div>
  <div class='clear'></div>
  </div>    

		  
  <div class='row-form'>
  <div class='span3'>Nama Lengkap</div>
  <div class='span9'><input type=text name='nama_lengkap'></div>
  <div class='clear'></div>
  </div>    
		  
   
  <div class='row-form'>
  <div class='span3'>E-mail</div>
  <div class='span9'><input type=text name='email'></div>
  <div class='clear'></div>
  </div>    
		  
   
  <div class='row-form'>
  <div class='span3'>No.Telp/HP</div>
  <div class='span9'><input type=text name='no_telp'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Foto</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>";
	  

  echo "<br/>
  <div class='span3'><b>Pilih Hak Akses</b></div><div class='span9'>";
  $qrMod = mysqli_query($koneksi,"SELECT * FROM modul WHERE publish='Ya' AND status='user'");
  while($mod=mysqli_fetch_array($qrMod)){
  echo "
  <input name='modul[]' type='checkbox' value='$mod[id_modul]'/>$mod[nama_modul]&nbsp;&nbsp; ";}


  echo " <br/><br/></div>
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=user'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";}
	  
  else{
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Manajemen User Admin</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'> 
     
  <div class='row-form'>
  <h5>Anda dilarang mengakses ini.</h5>
  </div> 

  </div></div></div>";}
	 
	 
	 
  break;
  //EDIT USER/////////////////////////////////////////////////////////////////////////////////////////////////////
  case "edituser":
  $edit=mysqli_query($koneksi,"SELECT * FROM users WHERE id_session='$_GET[id]'");
  $r=mysqli_fetch_array($edit);
  if($_SESSION[leveluser]=='admin'){
	
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit User</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
  <input type=hidden name=id value=$r[id_session]>
  <input type=hidden name=blokir value='$r[blokir]'>
	 
   
  <div class='row-form'>
  <div class='span3'>Username</div>
  <div class='span9'><input type=text name='username' value='$r[username]' disabled></div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'>Password</div>
  <div class='span9'><input type=text name='password'></div>
  <div class='clear'></div>
  </div>    
  
	 
  <div class='row-form'>
  <div class='span3'>Nama Lengkap</div>
  <div class='span9'><input type=text name='nama_lengkap' value='$r[nama_lengkap]'></div>
  <div class='clear'></div>
  </div>    
	 
	 
  <div class='row-form'>
  <div class='span3'>E-mail</div>
  <div class='span9'><input type=text name='email' value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
	 
   
  <div class='row-form'>
  <div class='span3'>No.Telp/HP</div>
  <div class='span9'><input type=text name='no_telp' size=30 value='$r[no_telp]'></div>
  <div class='clear'></div>
  </div>    
	
	
  <div class='row-form'>
  <div class='span3'>Foto</div>
  <div class='span9'>
  <a class='fancybox' rel='group' href='../img_user/$r[foto]'>
  <img src='../img_user/small_$r[foto]' width=100 class='tt' title='Perbesar Gambar'></a>
  </div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Ganti Foto</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div> ";
	
		
  if ($r[blokir]=='Tidak'){
  echo "
  <div class='row-form'>
  <div class='span3'>Blokir</div>
  <div class='span9'>
  <input type=radio name='blokir' value='Ya'>Ya 
  <input type=radio name='blokir' value='Tidak' checked>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='blokir' value='Ya' checked>Ya 
  <input type=radio name='blokir' value='Tidak'>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
							
	
  $qrMod1 = mysqli_query($koneksi,"SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul 
  AND users_modul.id_session='$_GET[id]'");
	
  echo " 
  <div class='row-form'>
  <div class='span3'>Hak Akses</div>
  <div class='span9'>";
  while($mod1=mysqli_fetch_array($qrMod1)){
	
  echo " ( $mod1[nama_modul] -  
  <a href=javascript:confirmdelete('$aksi?module=user&act=hapusmodule&id=$mod1[id_umod]&sessid=$_GET[id]')>
  <img src='img/icn_trash.png' title='Hapus'></a>)";}
  echo "</div> <div class='clear'></div>
  </div>";
	
	
  $qrMod = mysqli_query($koneksi,"SELECT * FROM modul WHERE publish='Ya' AND status='user'");
  echo "<div class='span3'><b>Tambahkan Modul</b></div><div class='span9'>";
  while($mod=mysqli_fetch_array($qrMod)){
  echo "<input name='modul[]' type='checkbox' value='$mod[id_modul]' />$mod[nama_modul]&nbsp;&nbsp;";}
	
    
  echo " <br/><br/><br/><br/></div>
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=user'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>
  
  
  <div class='notes'>&bull; Username tidak dapat diubah.<br>
  &bull; Apabila Password tidak diubah, dikosongkan saja. </div>";}
	
	
	
  else {
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit User</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
  <input type=hidden name=id value=$r[id_session]>
  <input type=hidden name=blokir value='$r[blokir]'>
	 
   
  <div class='row-form'>
  <div class='span3'>Username</div>
  <div class='span9'><input type=text name='username' value='$r[username]' disabled></div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'>Password</div>
  <div class='span9'><input type=text name='password'></div>
  <div class='clear'></div>
  </div>    
  
	 
  <div class='row-form'>
  <div class='span3'>Nama Lengkap</div>
  <div class='span9'><input type=text name='nama_lengkap' value='$r[nama_lengkap]'></div>
  <div class='clear'></div>
  </div>    
	 
	 
  <div class='row-form'>
  <div class='span3'>E-mail</div>
  <div class='span9'><input type=text name='email' value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
	 
   
  <div class='row-form'>
  <div class='span3'>No.Telp/HP</div>
  <div class='span9'><input type=text name='no_telp' size=30 value='$r[no_telp]'></div>
  <div class='clear'></div>
  </div>    
	
	
  <div class='row-form'>
  <div class='span3'>Foto</div>
  <div class='span9'>
  <a class='fancybox' rel='group' href='../img_user/$r[foto]'>
  <img src='../img_user/small_$r[foto]' width=100 class='tt' title='Perbesar Gambar'></a>
  </div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Ganti Foto</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div> ";
   
  echo "<br/><br/><br/><br/>
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=user'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>
  
  <div class='notes'>&bull; Username tidak dapat diubah.<br>
  &bull; Apabila Password tidak diubah, dikosongkan saja. </div>";}
	
  break;}} 
	
  else {
  echo akses_salah();
  }
  }
  ?>