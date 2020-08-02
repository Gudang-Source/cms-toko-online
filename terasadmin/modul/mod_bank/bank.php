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
  
  
  $aksi="modul/mod_bank/aksi_bank.php";
  switch($_GET[act]){
  
  default:
   
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Bank.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Bank.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Bank.
  </div>";}
  
  
  	 
  echo "
  <div class='workplace'>
  <form action='$aksi?module=bank&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>Tambah Rekening Bank</h1>   
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=bank&act=tambahbank'><span class='isw-plus'></span> Tambahkan Bank</a></li>
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
  <th><center>Nama Bank</center></th>
  <th>Nomer Rekening</th>
  <th>Nama Pemilik</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
		  
  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM mod_bank ORDER BY id_bank DESC");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM mod_bank 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_bank DESC");}	
		
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
  $tgl=tgl_indo($r[tgl_posting]);
	  
	  
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_bank]'></center></td>
  <td><center><img src='../img_bank/$r[gambar]' width=60></center></td>
  <td>$r[no_rekening]</td>
  <td>$r[pemilik]</td>
 
  <td width='8%'>
  <a href=?module=bank&act=editbank&id=$r[id_bank]>
  <center><img src='img/edit.png' class='tt' title='Edit Bank'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=bank&act=hapus&id=$r[id_bank]&namafile=$r[gambar]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus Bank'></center></a> 
  </td>
   
  </tr>";
  			 
  $no++; }
  
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";

  break;
  //TAMBAH BANK////////////////////////////////////////////////////////////////////////////////////
  case "tambahbank":
	
	
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Bank Pembayaran</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=bank&act=input' enctype='multipart/form-data'>
		  
   
  <div class='row-form'>
  <div class='span3'>Nama Bank</div>
  <div class='span9'><input type=text name='nama_bank'></div>
  <div class='clear'></div>
  </div>    
  
   
  <div class='row-form'>
  <div class='span3'>No. Rekening</div>
  <div class='span9'><input type=text  name='no_rekening'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Nama Pemilik</div>
  <div class='span9'><input type=text name='pemilik'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>  
	  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=bank'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
	  
	  
	  
  break;
  //EDIT BANK///////////////////////////////////////////////////////////////////////////////////////////// 
  case "editbank":
  $edit = mysqli_query($koneksi,"SELECT * FROM mod_bank WHERE id_bank='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Bank Pembayaran</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST enctype='multipart/form-data' action=$aksi?module=bank&act=update>
  <input type=hidden name=id value=$r[id_bank]>
		
  <div class='row-form'>
  <div class='span3'>Nama Bank</div>
  <div class='span9'><input type=text name='nama_bank' value='$r[nama_bank]'></div>
  <div class='clear'></div>
  </div>    
  
   
  <div class='row-form'>
  <div class='span3'>No. Rekening</div>
  <div class='span9'><input type=text  name='no_rekening' value='$r[no_rekening]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Nama Pemilik</div>
  <div class='span9'><input type=text name='pemilik' value='$r[pemilik]'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'> <img src='../img_bank/$r[gambar]' width=60></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>  
	  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=bank'>Batal</a>
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
