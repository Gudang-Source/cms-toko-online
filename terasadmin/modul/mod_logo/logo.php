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


  $aksi="modul/mod_logo/aksi_logo.php";
  switch($_GET[act]){
  
  
  default:
      
  // PESAN UPDATE
  if(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Logo Website.
  </div>";}
	 
	 
	  
  echo "
  <div class='workplace'>
  
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>LOGO WEBSITE</h1>                               
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
	         
  
  <thead>
  <tr>
  <th>Logo Terpasang</th>
  <th><center>Edit</center></th>
  </thead>
  <tbody>";
   
  $tampil=mysqli_query($koneksi,"SELECT * FROM logo ORDER BY id_logo DESC");
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
  $tgl=tgl_indo($r[tgl_posting]);
	  
	  
  echo "<tr class=gradeX> 
  
  <td align=left>
  <a class='fancybox' rel='group' href='../img_logo/$r[gambar]'>
  <img width='100' src='../img_logo/$r[gambar]' class='tt' title='Perbesar Gambar'></a>
  </td>
  
  <td width='8%'>
  <a href=?module=logo&act=editlogo&id=$r[id_logo] ><center>
  <img src='img/edit.png' class='tt' title='Edit Logo'></center></a>
  </td>

  </td></tr>";

  $no++;}
	
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";
  

  break;
  case "editlogo":
  //EDIT LOGO////////////////////////////////////////////////////////////////////////////////////////////////////
  $edit = mysqli_query($koneksi,"SELECT * FROM logo WHERE id_logo='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Logo Website</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
	
  <form method=POST enctype='multipart/form-data' action=$aksi?module=logo&act=update>
  <input type=hidden name=id value=$r[id_logo]>

   
  <div class='row-form'>
  <div class='span3'>Logo Terpasang</div>
  <div class='span9'>
  <a class='fancybox' rel='group' href='../img_logo/$r[gambar]'>
  <img src='../img_logo/$r[gambar]' width=100 class='tt' title='Perbesar Gambar'></a>
  </div>
  <div class='clear'></div>
  </div>   
   
   
  <div class='row-form'>
  <div class='span3'>Ganti Logo</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>

  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=logo'>Batal</a>
  <input type='submit' name=TerasKreasi' class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
  

  break;}} 
  else {
  echo akses_salah();}}
  ?>

  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>