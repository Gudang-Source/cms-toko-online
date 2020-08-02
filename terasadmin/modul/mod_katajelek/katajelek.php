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


  $aksi="modul/mod_katajelek/aksi_katajelek.php";
  switch($_GET[act]){

  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Sensor Kata Komentar.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Sensor Kata Komentar.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Sensor Kata Komentar.
  </div>";}
  
   
  echo "
  <div class='workplace'>
  <form action='$aksi?module=katajelek&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>SENSOR KOMENTAR</h1>    
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=katajelek&act=tambahkatajelek'><span class='isw-plus'></span> Tambahkan KataJelek</a></li>
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
  <th><center>No</center></th>
  <th>Kata Jelek</th>
  <th>Ganti</th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
  
   
  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM katajelek ORDER BY id_jelek DESC");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM katajelek
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_jelek DESC");}
	
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
	
	
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_jelek]'></center></td>
  <td width='8%'><center>$no</center></td>
  <td>$r[kata]</td>
  <td>$r[ganti]</td>
  
  <td width='8%'>
  <a href=?module=katajelek&act=editkatajelek&id=$r[id_jelek]><center>
  <img src='img/edit.png' class='tt' title='Edit Sensor Kata'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=katajelek&act=hapus&id=$r[id_jelek]')  >
  <center><img src='img/hapus.png' class='tt' title='Hapus Sensor Kata'></center></a> 
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
  //TAMBAH SENSOR KATA///////////////////////////////////////////////////////
  case "tambahkatajelek":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Sensor Kata</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=katajelek&act=input'>

  <div class='row-form'>
  <div class='span3'>Kata Jelek</div>
  <div class='span9'><input type=text name='kata'></div>
  <div class='clear'></div>
  </div>    
   
  
  <div class='row-form'>
  <div class='span3'>Ganti</div>
  <div class='span9'><input type=text name='ganti'></div>
  <div class='clear'></div>
  </div>    
  
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=katajelek'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
	
		  
  break;
  //EDIT SENSOR KATA//////////////////////////////////////////////////////////////////
  case "editkatajelek":
  $edit=mysqli_query($koneksi,"SELECT * FROM katajelek WHERE id_jelek='$_GET[id]'");
  $r=mysqli_fetch_array($edit);



  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Sensor Kata</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>       	
  <form method=POST action=$aksi?module=katajelek&act=update>
  <input type=hidden name=id value='$r[id_jelek]'>
  
  <div class='row-form'>
  <div class='span3'>Kata Jelek</div>
  <div class='span9'><input type=text name='kata' value='$r[kata]'></div>
  <div class='clear'></div>
  </div>    
  
	
  <div class='row-form'>
  <div class='span3'>Ganti</div>
  <div class='span9'><input type=text name='ganti' value='$r[ganti]'></div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=katajelek'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
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