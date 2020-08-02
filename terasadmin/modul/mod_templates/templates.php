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



  $aksi="modul/mod_templates/aksi_templates.php";
  switch($_GET[act]){
  
  default:

  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Template Website.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Template Website.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Template Website.
  </div>";}

  
  // PESAN AKTIF
  elseif(isset($_GET['msg']) && $_GET['msg']=='aktif'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-aktifkan Template Website.
  </div>";}


   
  
  echo "
  <div class='workplace'>

  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>TEMPLATE WEBSITE</h1>   
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=templates&act=tambahtemplates'><span class='isw-plus'></span> Tambahkan Template</a></li>
  </ul>
  </li>
  </ul>     
  
                              
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
	         
  
  <thead>
  <tr>
  <th>Nama Template</th>
  <th>Pembuat</th>
  <th>Folder</th>
  <th><center>Aktif</center></th>
  <th><center>Edit</center></th>
  <th><center>Aktif</center></th>
  </tr>
  </thead>";

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM templates ORDER BY id_templates DESC");}
   
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM templates WHERE username='$_SESSION[namauser]'       
  ORDER BY id_templates DESC");}
  
  $no = $posisi+1;
  while ($r=mysqli_fetch_array($tampil)){
	
	
  echo "
  <tr>
  <td>$r[judul]</td>
  <td>$r[pembuat]</td>
  <td>$r[folder]</td>
  <td><center>$r[aktif]</center></td>

  <td width='8%'>
  <a href=?module=templates&act=edittemplates&id=$r[id_templates] >
  <center><img src='img/edit.png' class='tt' title='Edit Template'></center></a>
  </td>
   
  <td width='8%'>
  <a href=$aksi?module=templates&act=aktifkan&id=$r[id_templates] >
  <center><img src='img/ya_rzl.png' class='tt' title='Aktifkan Template'></center></a> 
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
  //TAMBAH TEMPLATE/////////////////////////////////////////////////////////////////////////////////////
  case "tambahtemplates":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Template</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=templates&act=input'>

   
  <div class='row-form'>
  <div class='span3'>Nama Template</div>
  <div class='span9'><input type=text name='judul'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Pembuat</div>
  <div class='span9'><input type=text name='pembuat'></div>
  <div class='clear'></div>
  </div>    
   
   
  
  <div class='row-form'>
  <div class='span3'>Folder</div>
  <div class='span9'><input type=text name='folder' value='templates/'></div>
  <div class='clear'></div>
  </div>    
   
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=templates''>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
    
  

		  
  break;
  //EDIT TEMPLATE WEBSITE//////////////////////////////////////////////////////////////////////////////////
  case "edittemplates":
  $edit=mysqli_query($koneksi,"SELECT * FROM templates WHERE id_templates='$_GET[id]'");
  $r=mysqli_fetch_array($edit);

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Template</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action=$aksi?module=templates&act=update class='editprofileform'>
  <input type=hidden name=id value='$r[id_templates]'>
	 
	 
  <div class='row-form'>
  <div class='span3'>Nama Template</div>
  <div class='span9'><input type=text name='judul' value='$r[judul]'></div>
  <div class='clear'></div>
  </div>    
	 
	  
	  
  <div class='row-form'>
  <div class='span3'>Pembuat</div>
  <div class='span9'> <input type=text name='pembuat' value='$r[pembuat]'></div>
  <div class='clear'></div>
  </div>    
	  
	  
  <div class='row-form'>
  <div class='span3'>Folder</div>
  <div class='span9'><input type=text name='folder' value='$r[folder]'></div>
  <div class='clear'></div>
  </div>    
		 
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=templates''>Batal</a>
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