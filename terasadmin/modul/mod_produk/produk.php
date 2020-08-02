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

  $aksi="modul/mod_produk/aksi_produk.php";
  switch($_GET[act]){

  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Produk.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Produk.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Produk.
  </div>";}
  
  
  echo "
  <div class='workplace'>
  <form action='$aksi?module=produk&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>PRODUK</h1>       
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=produk&act=tambahproduk'><span class='isw-plus'></span> Tambahkan Produk</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
  
                         
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>";
   

  if (empty($_GET['kata'])){	
	
  echo " 
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Nama Produk</th>
  <th><center>Berat/kg</center></th>
  <th><center>Harga</center></th>
  <th><center>Diskon</center></th>
  <th><center>Stok</center></th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
   
  $p      = new Paging;
  $batas  = 40;
  $posisi = $p->cariPosisi($batas);

  if ($_SESSION[leveluser]=='admin'){
  $tampil=mysqli_query($koneksi,"SELECT * FROM produk       
  ORDER BY id_produk DESC");}
						   
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM produk  
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_produk DESC");}
						     
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
  $tanggal=tgl_indo($r[tgl_masuk]);
  $harga       =  number_format(($r[harga]),0,",",".");
		
				
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_produk]'></center></td>
  <td>$r[nama_produk]</td>
  <td><center>$r[berat]</center></td>
  <td><center>$harga</center></td>
  <td><center>$r[diskon]</center></td>
  <td><center>$r[stok]</center></td>
		
  <td width='8%'>
  <a href=?module=produk&act=editproduk&id=$r[id_produk]>
  <center><img src='img/edit.png' class='tt' title='Edit Produk'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=produk&act=hapus&id=$r[id_produk]&namafile=$r[gambar]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus Produk'></center></a> 
  </td>
  
  </tr>";
				
  $no++;}
	  
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";


  if ($_SESSION[leveluser]=='admin'){
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM produk"));}  
   
  else{
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM produk WHERE username='$_SESSION[namauser]'"));}  
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

  break; }
  else{
	
  echo "
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Nama Produk</th>
  <th><center>Berat/kg</center></th>
  <th><center>Harga</center></th>
  <th><center>Diskon</center></th>
  <th><center>Stok</center></th>
  <th><center>Edit</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";

  $p      = new Paging;
  $batas  = 40;
  $posisi = $p->cariPosisi($batas);

  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[kata]%' 
  ORDER BY id_produk DESC LIMIT $posisi,$batas");}

  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM produk  
  WHERE username='$_SESSION[namauser]'
  AND nama_produk LIKE '%$_GET[kata]%'       
  ORDER BY id_produk DESC LIMIT $posisi,$batas");}
  
  $no = $posisi+1;
  while($r=mysqli_fetch_array($tampil)){
  $tanggal=tgl_indo($r[tgl_masuk]);
  $harga       =  number_format(($r[harga]),0,",",".");
	
	
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_produk]'></center></td>
  <td>$r[nama_produk]</td>
  <td><center>$r[berat]</center></td>
  <td><center>$harga</center></td>
  <td><center>$r[diskon]</center></td>
  <td><center>$r[stok]</center></td>
		
  <td width='8%'>
  <a href=?module=produk&act=editproduk&id=$r[id_produk]>
  <center><img src='img/edit.png' class='tt' title='Edit Produk'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=produk&act=hapus&id=$r[id_produk]&namafile=$r[gambar]')>
  <center><img src='img/hapus.png' class='tt' title='Hapus Produk'></center></a> 
  </td>
  
  </tr>";

  $no++;}
	
	
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";


  if ($_SESSION[leveluser]=='admin'){
  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[kata]%'"));}  
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

 
  break; }
  //TAMBAH PRODUK/////////////////////////////////////////////////////////////////////////////////////////
  case "tambahproduk":
 
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Produk</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
		  

  <div class='row-form'>
  <div class='span3'>Nama Produk</div>
  <div class='span9'><input type=text name='nama_produk'></div>
  <div class='clear'></div>
  </div>    

  <div class='row-form'>
  <div class='span3'>Kategori</div>
  <div class='span9'>        
  <select name='kategori' id='s2_2'> 
  <option value=0 selected>Pilih Kategori</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY nama_kategori");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>"; }
  echo "</select>  </div><div class='clear'></div>
  </div>";
	
  
  if ($r[headline]=='Y'){
  echo "
  <div class='row-form'>
  <div class='span3'>Terbaru</div>
  <div class='span9'>
  <input type=radio name='headline' value='Y' checked>Ya  
  <input type=radio name='headline' value='N'>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
   
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Terbaru</div>
  <div class='span9'>
  <input type=radio name='headline' value='Y'>Ya  
  <input type=radio name='headline' value='N' checked>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
   
   
  echo "
  <div class='row-form'>
  <div class='span3'>Berat</div>
  <div class='span9'><input type=text name='berat'></div>
  <div class='clear'></div>
  </div>    
	  
  <div class='row-form'>
  <div class='span3'>Harga</div>
  <div class='span9'><input type=text name='harga'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Diskon</div>
  <div class='span9'><input type=text name='diskon'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Stok</div>
  <div class='span9'><input type=text name='stok'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Deskripsi</div>
  <div class='span9'><textarea  id='teraskreasi' style='height: 350px;' name='deskripsi'></textarea></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>
  
  
  <div class='row-form'>
  <div class='span3'><b>NEWSLETTER</b></div>
  <div class='span9'><input type='checkbox' name='kirimnewsletter' value='ya'>Kirimkan Newsletter</div>
  <div class='clear'></div>
  </div>    
  
  
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=produk'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>


  </form>
  </div></div></div>";   
   
   
	  
  break;
  //EDIT PRODUK//////////////////////////////////////////////////////////////////////////////////////////////////////
  case "editproduk":
  $edit = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Produk</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
  <input type=hidden name=id value=$r[id_produk]>
		  
   
  <div class='row-form'>
  <div class='span3'>Nama Produk</div>
  <div class='span9'><input type=text name='nama_produk' value='$r[nama_produk]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Kategori</div>
  <div class='span9'>        
  <select name='kategori' id='s2_2'>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY nama_kategori");
  if ($r[id_kategori]==0){
  echo "<option value=0 selected>Pilih Kategori</option>"; }   
  while($w=mysqli_fetch_array($tampil)){
  if ($r[id_kategori]==$w[id_kategori]){
  echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";}
  else{
  echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";}}
  echo "</select> </div><div class='clear'></div>
  </div>";

  
  if ($r[headline]=='Y'){
  echo "
  <div class='row-form'>
  <div class='span3'>Terbaru</div>
  <div class='span9'>
  <input type=radio name='headline' value='Y' checked>Ya  
  <input type=radio name='headline' value='N'>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
   
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Terbaru</div>
  <div class='span9'>
  <input type=radio name='headline' value='Y'>Ya  
  <input type=radio name='headline' value='N' checked>Tidak
  </div>
  <div class='clear'></div>
  </div>";}
	
	
  echo "
  <div class='row-form'>
  <div class='span3'>Berat</div>
  <div class='span9'><input type=text name='berat' value='$r[berat]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Harga</div>
  <div class='span9'><input type=text name='harga' value='$r[harga]' ></div>
  <div class='clear'></div>
  </div>    
	 
  <div class='row-form'>
  <div class='span3'>Diskon</div>
  <div class='span9'><input type=text name='diskon' value='$r[diskon]'></div>
  <div class='clear'></div>
  </div>    
		  
  <div class='row-form'>
  <div class='span3'>Stok</div>
  <div class='span9'><input type=text name='stok' value='$r[stok]'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Deskripsi</div>
  <div class='span9'><textarea  id='teraskreasi' style='height: 350px;' name='deskripsi'>$r[deskripsi]</textarea></div>
  <div class='clear'></div>
  </div>    
   
	  
  <div class='row-form'>
  <div class='span3'>Gambar</div>";
  if ($r[gambar]!=''){
  echo "<div class='span9'>
  <a class='fancybox' rel='group' href='../img_produk/$r[gambar]'>
  <img src='../img_produk/small_$r[gambar]' width=150 class='tt' title='Perbesar Gambar'></a></div>
  <div class='clear'></div>
  </div>";}    
   
	
  echo "
  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>
  
   
  <div class='row-form'>
  <div class='span3'><b>NEWSLETTER</b></div>
  <div class='span9'><input type='checkbox' name='kirimnewsletter' value='ya'>Kirimkan Newsletter</div>
  <div class='clear'></div>
  </div>  
  
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=produk'>Batal</a>
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
