<?php
//Mencegah direct akses
$pathfile='../config/authentication_kustomer.php';
if (!file_exists($pathfile)){
	//echo"<meta http-equiv='refresh' content='0;url=www.domainanda.com/index.php'>";
	include "index.php";
}

  $aksi="modul/mod_profil/aksi_profil.php";
  switch($_GET[act]){
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Kustomer.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Kustomer.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Kustomer.
  </div>";}
  
  $tampil=mysqli_query($koneksi,"SELECT * FROM kustomer 
                           WHERE id_kustomer='$_SESSION[namauser]'");
  $r=mysqli_fetch_array($tampil);
  $usr=base64_encode($r[id_kustomer]);
	  
	  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>Kustomer</h1>   
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href=?module=profil&act=edituser&usr=$usr&sid=$r[id_session]><span class='isw-plus'></span> Edit Profil</a></li>
  <li><a href=$aksi?module=profil&act=delete&usr=$usr&sid=$r[id_session]><span class='isw-plus'></span>Hapus Profil</a></li>
  </ul>
  </li>
  </ul>     
    
	                          
  <div class='clear'></div>
  </div>
  <div class='block-fluid table-sorting'>";		   
		   
		   
  echo"
  
  <div class='row-form'>
  <div class='span3'>Username</div>
  <div class='span9'>: $r[id_kustomer]</div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'>Nama Lengkap</div>
  <div class='span9'>: $r[nama_lengkap]</div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'>Alamat</div>
  <div class='span9'>: $r[alamat]</div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Kode Pos</div>
  <div class='span9'>: $r[kode_pos]</div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Propinsi</div>
  <div class='span9'>: $r[propinsi]</div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Kota</div>
  <div class='span9'>: $r[kota]</div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Email</div>
  <div class='span9'>: $r[email]</div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>No Telepon/HP</div>
  <div class='span9'>: $r[no_telp]</div>
  <div class='clear'></div>
  </div>";
       
  
  break;
  //EDIT PROFIL////////////////////////////////////////////////////////////////////////////////////////////////
  case "edituser":
  $usr=base64_decode($_GET[usr]);
  $edit=mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer='$usr' AND id_session='$_GET[sid]'");
  $r=mysqli_fetch_array($edit);
  $usre=base64_encode($r[id_kustomer]);
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Profil</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>            	
  <form method=POST action='$aksi?module=profil&act=update&usr=$usre&id=$r[id_session]'>
  <input type=hidden name=id value='$r[id_kustomer]'>
  
  
  
  <div class='row-form'>
  <div class='span3'>Username</div>
  <div class='span9'><input type=text name='username' value='$r[id_kustomer]' disabled></div>
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
  <div class='span3'>Alamat Lengkap</div>
  <div class='span9'><input type=text name='alamat' value='$r[alamat]'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Kode Pos</div>
  <div class='span9'><input type=text name='kode_pos' value='$r[kode_pos]'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Propinsi</div>
  <div class='span9'><input type=text name='propinsi' value='$r[propinsi]'></div>
  <div class='clear'></div>
  </div>    

	
  <div class='row-form'>
  <div class='span3'>Kota</div>
  <div class='span9'>        
  <select name='kota'>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kota ORDER BY nama_kota");
  while($s=mysqli_fetch_array($tampil)){
  echo "<option value=$s[nama_kota]>$s[nama_kota]</option>";}
  
  $cekkotaquery=mysqli_query($koneksi,"SELECT * FROM kota WHERE nama_kota='$r[kota]'");
  $cekkota=mysqli_num_rows($cekkotaquery);
  
  if ($cekkota == 0){
  echo "<option value='lainnya' selected>- Lainnya -</option>";
  $isikota=$r[kota];}
  
  else{
  echo "<option value=$r[kota] selected>$r[kota]</option>
  <option value='lainnya'>- Lainnya -</option>";
  $isikota='';}
  echo "</select> </div><div class='clear'></div>
  </div>
	
		  
  <div class='row-form'>
  <div class='span3'>Kota Lainnya</div>
  <div class='span9'><input type=text name='kotalain' value='$isikota'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>E-mail</div>
  <div class='span9'><input type=text name='email' size=30 value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>No.Telp/HP</div>
  <div class='span9'><input type=text name='no_telp'  value='$r[no_telp]'></div>
  <div class='clear'></div>
  </div>";
  
  echo " <div class='row-form'><input type=hidden name='blokir' value='N'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=profil'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>
	
  </form>
  </div></div></div>
		  
		  
  <div class='notes'>&bull; Username tidak dapat diubah.<br>
  &bull; Apabila Password tidak diubah, dikosongkan saja. </div>";
		  
		  
  break; }

  ?>
  
  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus ini?")) {
  document.location = delUrl;}}
  </script>
