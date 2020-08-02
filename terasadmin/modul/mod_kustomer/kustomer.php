<?php

  $aksi="modul/mod_kustomer/aksi_kustomer.php";
  switch($_GET[act]){
  // Tampil User
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
	
  $warnaGenap='#a0ffa4';
  $warnaGanjil='#e7ffe8';
	
  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM kustomer ORDER BY id_kustomer");
	  
	  
  echo "  <div class='workplace'>
  <form action='$aksi?module=kustomer&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>Kustomer</h1>   
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=kustomer&act=tambahuser'><span class='isw-plus'></span> Tambahkan Kustomer</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
                              
  <div class='clear'></div>
  </div>
  <div class='block-fluid table-sorting'>";}
	

  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM kustomer 
  WHERE id_kustomer='$_SESSION[namauser]'");
  echo " <h1>Kustomer</h1>";}
    
	
  echo "
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>

  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th><center>Username</center></th>
  <th>Email</th>
  <th>No.Telp/HP</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
				   
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
  $usr=base64_encode($r[id_kustomer]);
  if ($no % 2 == 0){
  $warna = $warnaGenap;}
  else{
  $warna = $warnaGanjil;}
		
		
  echo "  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='&usr=$usr&sid=$r[id_session]'></center></td>
  <td>$r[nama_lengkap]</td>
  <td><a href=mailto:$r[email]>$r[email]</a></td>
  <td>$r[no_telp]</td>

				 
  <td width='8%'>
  <a href=?module=kustomer&act=edituser&usr=$usr&sid=$r[id_session]>
  <center><img src='img/edit.png' class='tt' title='Edit Kustomer'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=kustomer&act=delete&usr=$usr&sid=$r[id_session]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus Kustomer'></center></a> 
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
  //TAMBAH USER/////////////////////////////////////////////////////////////////////////////
  case "tambahuser":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Kostumer</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=kustomer&act=input'>
		  
		  
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
  <div class='span3'>Alamat Lengkap</div>
  <div class='span9'><input type=text name='alamat'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Kode Pos</div>
  <div class='span9'><input type=text name='kode_pos'></div>
  <div class='clear'></div>
  </div>    
		  
		  
  <div class='row-form'>
  <div class='span3'>Propinsi</div>
  <div class='span9'> <input type=text name='propinsi'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Kota</div>
  <div class='span9'><input type=text name='kota'></div>
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
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=kustomer'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";

		  
  break;
  //EDIT USER/////////////////////////////////////////////////////////////////////////////
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
  <h1>Edit Kostumer</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>            	
  <form method=POST action='$aksi?module=kustomer&act=update&usr=$usre&id=$r[id_session]'>
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
  <div class='span9'><input type=text name='kota' value='$r[kota]'></div>
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
		  
	
  if ($_SESSION[leveluser]=='admin'){
  if ($r[blokir]=='N'){
  
  echo "
  <div class='row-form'>
  <div class='span3'>Blokir</div>
  <div class='span9'>
  <input type=radio name='blokir' value='Y'> Y   
  <input type=radio name='blokir' value='N' checked> N 
  </div>
  <div class='clear'></div>
  </div>";}	  
	  
	  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Blokir</div>
  <div class='span9'>
  <input type=radio name='blokir' value='Y' checked> Y  
  <input type=radio name='blokir' value='N'> N
  </div>
  <div class='clear'></div>
  </div>";}}
	
  else{
  echo"<input type=hidden name='blokir' value='N'>";}
	
	
	
  echo " <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=kustomer'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
		  
  break; }

  ?>
  
  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus ini?")) {
  document.location = delUrl;}}
  </script>