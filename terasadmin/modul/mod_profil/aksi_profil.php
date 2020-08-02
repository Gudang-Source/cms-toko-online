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
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";
include "../../../config/fungsi_newsletter.php";



$module=$_GET['module'];
$act=$_GET['act'];

// Hapus profil
if ($module=='profil' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM profil WHERE id_profil='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi,"DELETE FROM profil WHERE id_profil='$_GET[id]'");
     unlink("../../../img_teraskreasi/$_GET[namafile]");   
     unlink("../../../img_teraskreasi/small_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi,"DELETE FROM profil WHERE id_profil='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}




// Hapus terpilih
elseif($module=='profil' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM profil WHERE id_profil=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_teraskreasi/$data[gambar]");   
     unlink("../../../img_teraskreasi/small_$data[gambar]");  
} 
mysqli_query($koneksi,"DELETE FROM profil WHERE id_profil=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}



// Input profil
elseif ($module=='profil' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tag=implode(',',$tag_seo);
  }
  $judul_seo      = seo_title($_POST['judul']);



  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=profil)</script>";
    }
    else{
    UploadPic($nama_file_unik);

    mysqli_query($koneksi,"INSERT INTO profil(judul,
                                    judul_seo,
                                    username,
                                    isi_profil,
                                    jam,
                                    tanggal,
                                    hari,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_profil]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$nama_file_unik')");
								   
								   
 if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		getNewsletter($id);
		 }
  header('location:../../media.php?module='.$module.'&msg=insert');
 }
  }
  else{
    mysqli_query($koneksi,"INSERT INTO profil(judul,
                                    judul_seo, 
                                    username,
                                    isi_profil,
                                    jam,
                                    tanggal,
                                    hari) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_profil]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini')");
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		getNewsletter($id);
		}
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  
  $jml=count($tag_seo);
  for($i=0;$i<$jml;$i++){
    mysqli_query($koneksi,"UPDATE tag SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
  }
}

// Update profil
elseif ($module=='profil' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tag=implode(',',$tag_seo);
  }

  $judul_seo = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  mysqli_query($koneksi,"UPDATE profil SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   isi_profil  = '$_POST[isi_profil]'  
                             WHERE id_profil   = '$_POST[id]'");
							 
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		}
  header('location:../../media.php?module='.$module.'&msg=update');
    }
    else{
	
    $data_gambar = mysqli_query($koneksi,"SELECT gambar FROM profil WHERE id_profil='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_teraskreasi/'.$r['gambar']);
	@unlink('../../../img_teraskreasi/'.'small_'.$r['gambar']);
    UploadPic($nama_file_unik,'../../../img_teraskreasi/',300,120);

 mysqli_query($koneksi,"UPDATE profil SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   isi_profil  = '$_POST[isi_profil]', 
								         gambar      = '$nama_file_unik'   
                             WHERE id_profil   = '$_POST[id]'");
							 
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		}
   header('location:../../media.php?module='.$module.'&msg=update');
   }
  }
}
?>