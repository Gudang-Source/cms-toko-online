  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>


<?php    
session_start();
  //Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
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


  $aksi="modul/mod_newsletter/aksi_newsletter.php";
  switch($_GET[act]){
  
  default:
   
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Pelanggan Newsletter.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Pelanggan Newsletter.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Pelanggan Newsletter.
  </div>";}
   
  
  echo "
  <div class='workplace'>
  <form action='$aksi?module=newsletter&act=hapussemua'  method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>Pelanggan Newsletter</h1>     
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=newsletter&act=tambahnewsletter'><span class='isw-plus'></span> Tambahkan Pelanggan</a></li>
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
  <th><center>No.</center></th>
  <th>Email</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
	 	 		  
				  
  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query("SELECT * FROM newsletter ORDER BY id DESC");}
  
  else{
  $tampil=mysqli_query("SELECT * FROM newsletter 
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id DESC");}	
  
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
	
			 
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id]'></center></td>
  <td width='5%'>$no</center></td>
  <td>$r[email]</td>
  
  <td width='8%'>
  <a href=?module=newsletter&act=editnewsletter&id=$r[id]>
  <center><img src='img/edit.png' class='tt' title='Edit User newsletter'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=newsletter&act=hapus&id=$r[id]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus User newsletter'></center></a> 
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
  //TAMBAH newsletter//////////////////////////////////////////////////////////////////////////////////////////////////////
  case "tambahnewsletter":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Pelanggan Newsletter</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=newsletter&act=input'>
		  
   
  <div class='row-form'>
  <div class='span3'>Email</div>
  <div class='span9'><input type=text name='email'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'><b>NEWSLETTER</b></div>
  <div class='span9'><input type='checkbox' name='kirimnewsletter' value='ya'>Kirimkan Newsletter </div>
  <div class='clear'></div>
  </div>    
   
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form  href='?module=newsletter'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
  
	  
  break;
  //EDIT USER newsletter/////////////////////////////////////////////////////////////////////////////////////////////////////
  case "editnewsletter":
  $edit=mysqli_query("SELECT * FROM newsletter WHERE id='$_GET[id]'");
  $r=mysqli_fetch_array($edit);


  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Email Pelanggan</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>      
  <form method=POST action=$aksi?module=newsletter&act=update>
  <input type=hidden name=id value='$r[id]'>
		  
		
  <div class='row-form'>
  <div class='span3'>Email</div>
  <div class='span9'><input type=text name='email' value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'><b>NEWSLETTER</b></div>
  <div class='span9'><input type='checkbox' name='kirimnewsletter' value='ya'>Kirimkan Newsletter </div>
  <div class='clear'></div>
  </div>    
  
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form  href='?module=newsletter'>Batal</a>
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


