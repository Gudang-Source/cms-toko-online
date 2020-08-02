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


  $base_url = $_SERVER['HTTP_HOST'];
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));


  $aksi="modul/mod_hubungi/aksi_hubungi.php";
  switch($_GET[act]){
  
  default:
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Pesan Masuk.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Pesan Masuk.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Pesan Masuk.
  </div>";}




  echo "
  <div class='workplace'>
  <form action='$aksi?module=hubungi&act=hapussemua' method='post'>

   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>PESAN MASUK</h1>    
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
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
  <th>Nama</th>
  <th>Email</th>
  <th>Subjek</th>
  <th>Tanggal</th>
  <th><center>Baca</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";

  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  $tampil=mysqli_query($koneksi,"SELECT * FROM hubungi ORDER BY id_hubungi DESC");

  $no = $posisi+1;
  while ($r=mysqli_fetch_array($tampil)){
  $tgl=tgl_indo($r[tanggal]);
  if($r[dibaca]=='N'){
  
  
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_hubungi]'></center></td>
  <td><b><blink>$r[nama]</blink></b></td>
  <td><b><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]><blink>$r[email]</blink></a></b></td>
  <td><b><blink>$r[subjek]</blink></b></td>
  <td><b><blink>$tgl</blink></b></td>
  
  <td width='8%'>
  <a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>
  <center><img src='img/edit.png' class='tt' title='Baca Pesan'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]') >
  <center><img src='img/hapus.png' class='tt' title='Hapus Pesan'></center></a> 
  </td>
  
  </tr>";} 
  
  
  else {
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_hubungi]'></center></td>
  <td>$r[nama]</td>
  <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
  <td>$r[subjek]</td>
  <td>$tgl</td>

  <td width='8%'>
  <a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>
  <center><img src='img/edit.png' class='tt' title='Baca Pesan'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]') >
  <center><img src='img/hapus.png' class='tt' title='Hapus Pesan'></center></a> 
  </td>
  
  </tr>";}
  
  $no++;}
	
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";

	
  $jmldata=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hubungi"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

  break;

  case "balasemail":
  $tampil = mysqli_query($koneksi,"SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
  $r      = mysqli_fetch_array($tampil);
  mysqli_query("UPDATE hubungi SET dibaca='Y' WHERE id_hubungi='$_GET[id]'");


  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Baca Pesan Masuk</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>     
  <form method=POST action='?module=hubungi&act=kirimemail'>
  
  
  <div class='row-form'>
  <div class='span3'>Kepada</div>
  <div class='span9'><input type=text name='email'  value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Subjek</div>
  <div class='span9'><input type=text name='subjek' value='Re: $r[subjek]'></div>
  <div class='clear'></div>
  </div>    
   
	 
  <div class='row-form'>
  <div class='span3'>Pesan</div>
  <div class='span9'> <textarea id='teraskreasi' name='pesan' style='height: 300px;'>
  <br><br><br><br>     
  <hr></hr>
  $r[pesan]</textarea></div>
  <div class='clear'></div>
  </div>    
   
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=hubungi'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Kirim Email' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
	  		  
  break;
	 
  case "kirimemail":
  $dari = "From: $iden[nama_website] <".$iden[email].">\n" . 
  "MIME-Version: 1.0\n" . 
  "Content-type: text/html; charset=iso-8859-1";

  mail($_POST[email],$_POST[subjek],$_POST[pesan],$dari);
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Status Email</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'> 
     
  <div class='row-form'>
  <h5>Email telah sukses terkirim ke tujuan.</h5>
  </div> 
  
  
  <div class='row-form'>
  <a class='btn' id=reset-validate-form href='?module=hubungi'>Kembali</a>
  </div>

  </form>
  </div></div></div>";
  
   break;  
   }
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