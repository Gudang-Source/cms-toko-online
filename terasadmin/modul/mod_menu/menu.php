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


  $aksi="modul/mod_menu/aksi_menu.php";
  switch($_GET[act]){
  
  // Tampil Menu Utama/////////////////////////////////////////////////////////////////////
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Menu.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Menu.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Menu.
  </div>";}
  

  echo "
  <div class='workplace'>
  <form action='$aksi?module=menu&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>ARTIKEL</h1>  
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=menu&act=tambahmenu'><span class='isw-plus'></span> Tambahkan Menu</a></li>
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
  <th>Menu</th>
  <th>Level Menu</th>
  <th>Link</th>
  <th><center>Aktif</center></th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
		  
  $tampil=mysqli_query($koneksi,"SELECT * FROM menu");
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
	
  echo "
  <tr class=gradeX> 
   
  <td><center><input type='checkbox' name='cek[]' value='$r[id_menu]'></center></td>
  <td>$r[nama_menu]</td>";
            
  $parent=mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu=$r[id_parent]");
  $jml=mysqli_num_rows($parent);
  if ($jml > 0){
  while($s=mysqli_fetch_array($parent)){
  
  echo"<td>$s[nama_menu]</td>"; }}
  
  else {
  echo"<td>Menu Utama</td>";}
  
  echo"<td>$r[link]</td>
  <td><center>$r[aktif]</center></td>
  
  <td>
  <a href=?module=menu&act=editmenu&id=$r[id_menu]>
  <center><img src='img/edit.png' class='ttLC' title='Edit Menu'></center></a>
  </td>
   
  <td>
  <a href=javascript:confirmdelete('$aksi?module=menu&act=hapus&id=$r[id_menu]') >
  <center><img src='img/hapus.png' class='ttLC' title='Hapus Menu'></center></a> 
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
  ///TAMBAH MENU ////////////////////////////////////////////////////////////////////////////////////////
  case "tambahmenu":
  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Menu</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=menu&act=input'>
   
	 
  <div class='row-form'>
  <div class='span3'>Nama Menu</div>
  <div class='span9'><input type=text name='nama_menu'></div>
  <div class='clear'></div>
  </div>    
	 
	 
  <div class='row-form'>
  <div class='span3'>Level Menu</div>
  <div class='span9'>        
  <select name='id_parent' id='s2_1' >  
  <option value=0 selected>Menu Utama</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[id_menu]>$r[nama_menu]</option>";}
   
  echo "</select></div><div class='clear'></div>
  </div> 
		
  <div class='row-form'>
  <div class='span3'>Link Menu</div>
  <div class='span9'>  <input type=text name='link'></div>
  <div class='clear'></div>
  </div>    
    
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=menu'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
	
	 
  break;
  ///EDIT MENU ////////////////////////////////////////////////////////////////////////////////////////
  case "editmenu":
  $edit = mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);

		  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Menu</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
   
  <form method=POST action=$aksi?module=menu&act=update>
  <input type=hidden name=id value=$r[id_menu]>
		  
   
  <div class='row-form'>
  <div class='span3'>Nama Menu</div>
  <div class='span9'>  <input type=text name='nama_menu' value='$r[nama_menu]'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Level Menu</div>
  <div class='span9'>        
  <select name='id_parent' id='s2_1'>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu");
  if ($r[parent_id]==0){
  echo "<option value=0 selected>Menu Utama</option>";}
  else {
  echo "<option value=0>Menu Utama</option>";}

  while($w=mysqli_fetch_array($tampil)){
  if ($r[id_parent]==$w[id_menu]){
  echo "<option value=$w[id_menu] selected>$w[nama_menu]</option>";}
  else{
  if ($w[id_menu]==$r[id_menu]){
  echo "<option value=0>Tanpa Level</option>";}
  else{
  echo "<option value=$w[id_menu]>$w[nama_menu]</option>";}}}
           
  echo "</select></div><div class='clear'></div>
  </div>";
	
   									 
  if ($r[aktif]=='Ya'){
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya' checked>Ya
  <input type=radio name='aktif' value='Tidak'>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya'>Ya
  <input type=radio name='aktif' value='Tidak' checked>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
									  
	
  echo "
  <div class='row-form'>
  <div class='span3'>Link Menu</div>
  <div class='span9'><input type=text name='link' value='$r[link]'></div>
  <div class='clear'></div>
  </div>    
    
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=menu'>Batal</a>
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


  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>
