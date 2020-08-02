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


  $aksi="modul/mod_ongkoskirim/aksi_ongkoskirim.php";
  switch($_GET[act]){
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Ongkos Kirim.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Ongkos Kirim.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Ongkos Kirim.
  </div>";}

	
  echo "
  <div class='workplace'>
  <form action='$aksi?module=ongkoskirim&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>ONGKOS KIRIM</h1>       
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=ongkoskirim&act=tambahongkoskirim'><span class='isw-plus'></span> Tambah Ongkos Kirim</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
  
                         
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>";
		  
		  
  echo " 
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Nama Kota</th>
  <th><center>Jasa Pengiriman</center></th>
  <th><center>Ongkos Kirim</center></th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
		  
  if ($_SESSION[leveluser]=='admin'){
  $tampil=mysqli_query($koneksi,"SELECT * FROM kota,shop_pengiriman where kota.id_perusahaan=shop_pengiriman.id_perusahaan
  ORDER BY shop_pengiriman.nama_perusahaan,kota.id_kota DESC");}
						   
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM kota,shop_pengiriman where kota.id_perusahaan=shop_pengiriman.id_perusahaan 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY shop_pengiriman.nama_perusahaan,kota.id_kota DESC");}
	
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
  $ongkos  =  number_format(($r[ongkos_kirim]),0,",",".");
	   
			 
  echo "
  <tr class=gradeX>
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_kota]'></center></td>
  <td>$r[nama_kota]</td>
  <td><center>$r[nama_perusahaan]</center></td>
  <td><center>$ongkos</center></td>
  
  <td width='8%'>
  <a href=?module=ongkoskirim&act=editongkoskirim&id=$r[id_kota]>
  <center><img src='img/edit.png' class='tt' title='Edit Ongkos Kirim'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=ongkoskirim&act=hapus&id=$r[id_kota]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus Ongkos Kirim'></center></a> 
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
  //Tambah Ongkos Kirim///////////////////////////////////////////////////////////////////////////////////////////
  case "tambahongkoskirim":
	
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Ongkos Kirim</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=ongkoskirim&act=input'>
 		  
   	   
  <div class='row-form'>
  <div class='span3'>Nama Kota</div>
  <div class='span9'><input type=text name='nama_kota'></div>
  <div class='clear'></div>
  </div>    
	   
	   
  <div class='row-form'>
  <div class='span3'>Ongkos Kirim</div>
  <div class='span9'><input type=text name='ongkos_kirim'></div>
  <div class='clear'></div>
  </div>    
	   
  <div class='row-form'>
  <div class='span3'>Jasa Pengiriman</div>
  <div class='span9'>        
  <select name='perusahaan' id='s2_1'>
  <option value=0 selected>Pilih Jasa Pengiriman</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[id_perusahaan]>$r[nama_perusahaan]</option>"; }
  echo "</select>  </div><div class='clear'></div>
  </div>";
	
	
  echo "
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=ongkoskirim'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
   


  break;
  //Form Edit Ongkos Kirim//////////////////////////////////////////////////////////////////////////////////////////
  case "editongkoskirim":
  
  $edit=mysqli_query($koneksi,"SELECT * FROM kota,shop_pengiriman where kota.id_perusahaan=shop_pengiriman.id_perusahaan 
  AND kota.id_kota='$_GET[id]'");
  $r=mysqli_fetch_array($edit);

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Ongkos Kirim</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action=$aksi?module=ongkoskirim&act=update>
  <input type=hidden name=id value='$r[id_kota]'>
   
   
  <div class='row-form'>
  <div class='span3'>Nama Kota</div>
  <div class='span9'><input type=text name='nama_kota' value='$r[nama_kota]'></div>
  <div class='clear'></div>
  </div>    
	   
	  
  <div class='row-form'>
  <div class='span3'>Ongkos Kirim</div>
  <div class='span9'><input type=text name='ongkos_kirim' value='$r[ongkos_kirim]' ></div>
  <div class='clear'></div>
  </div>    
	  
	  
  <div class='row-form'>
  <div class='span3'>Jasa Pengiriman</div>
  <div class='span9'>        
  <select name='perusahaan' id='s2_1'>
  <option value='' value=$r[id_perusahaan]>$r[nama_perusahaan]</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[id_perusahaan]>$r[nama_perusahaan]</option>"; }
  echo "</select>  </div><div class='clear'></div>
  </div>";
	  
	
  echo "
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=ongkoskirim'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
   
  break; }
   
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
