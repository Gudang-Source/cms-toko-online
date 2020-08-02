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



  $aksi="modul/mod_pengiriman/aksi_pengiriman.php";
  $module=$_GET['module'];

  switch($_GET['act']){
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Jasa Pengiriman.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Jasa Pengiriman.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Jasa Pengiriman.
  </div>";}
  

	
  echo "
  <div class='workplace'>
  <form action='$aksi?module=jasapengiriman&act=hapussemua' method='post'>
  
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>JASA PENGIRIMAN</h1>       
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=$module&act=tambahperusahaan'><span class='isw-plus'></span> Tambah Jasa Kirim</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
  
                         
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>";
	
	
  if ($_SESSION[leveluser]=='admin'){
  $tampil2=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman");}
						   
  else{
  $tampil2=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman 
  WHERE username='$_SESSION[namauser]' ");}
						     	
	
  $r2=mysqli_fetch_array($tampil2);
  if($r2['id_perusahaan']==0){
  echo"";}
  else{
		
			  
  echo " 
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th><center>No</center></th>
  <th>Nama Perusahaan</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
			  
			  
  if ($_SESSION[leveluser]=='admin'){
  $tampil=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman      
  ORDER BY id_perusahaan DESC");}
						   
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_perusahaan DESC");}
						     		
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
            
  if(($no%2)==0){
  $warna="ganjil";
  }else{
  $warna="genap";}
			
				 
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_perusahaan]'></center></td>
  <td><center>$no</center></td>
  <td>$r[nama_perusahaan]</td>
 
  <td width='8%'>
  <a href=?module=$module&act=editperusahaan&id=$r[id_perusahaan]>
  <center><img src='img/edit.png' class='tt' title='Edit Jasa Pengiriman'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=$module&act=hapus&id=$r[id_perusahaan]') >
  <center><img src='img/hapus.png' class='tt' title='Hapus Jasa Pengiriman'></center></a> 
  </td>
   
  </tr>";
			 				 
  $no++; }
   
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>"; }
   
   
   
  break;
  // Tambah Perusahaan Pengiriman////////////////////////////////////////////////////////////
  case "tambahperusahaan":
    
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>TAMBAH JASA PENGIRIMAN</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=$module&act=input' enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
  

  <div class='row-form'>
  <div class='span3'>Nama JasaKirim</div>
  <div class='span9'><input type=text name='nama_perusahaan'></div>
  <div class='clear'></div>
  </div>    

   
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=jasapengiriman'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>


  </form>
  </div></div></div>";   
   
   
   
  break;
  //  Edit Perusahaan Pengiriman  ///////////////////////////////////////////////////////////////////////////////////////////
  case "editperusahaan":
  $edit=mysqli_query($koneksi,"SELECT * FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
  $r=mysqli_fetch_array($edit);

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>EDIT JASA PENGIRIMAN</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>  	
  <form method=POST action=$aksi?module=$module&act=update enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
  <input type=hidden name=id value='$r[id_perusahaan]'>
      
   
  <div class='row-form'>
  <div class='span3'>Nama JasaKirim</div>
  <div class='span9'><input type=text name='nama_perusahaan' value='$r[nama_perusahaan]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=jasapengiriman'>Batal</a>
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
