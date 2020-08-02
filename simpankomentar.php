<?php
session_start();
include "config/koneksi.php";
include "config/library.php";

$nama=trim($_POST['nama_komentar']);
$komentar=trim($_POST['isi_komentar']);

  $teraskreasi=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  

if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($komentar)){
  echo "Anda belum mengisikan KOMENTAR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (strlen($_POST['isi_komentar']) > 1000) {
  echo "KOMENTAR Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian.<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
function antiinjection($data){
  $filter_sql = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$nama_komentar = antiinjection($_POST['nama_komentar']);
$url = antiinjection($_POST['url']);
$isi_komentar = antiinjection($_POST['isi_komentar']);

	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){

// Mengatasi input komentar tanpa spasi
$split_text = explode(" ",$isi_komentar);
$split_count = count($split_text);
$max = 57;

for($i = 0; $i <= $split_count; $i++){
if(strlen($split_text[$i]) >= $max){
for($j = 0; $j <= strlen($split_text[$i]); $j++){
$char[$j] = substr($split_text[$i],$j,1);
if(($j % $max == 0) && ($j != 0)){
  $v_text .= $char[$j] . ' ';
}else{
  $v_text .= $char[$j];
}
}
}else{
  $v_text .= " " . $split_text[$i] . " ";
}
}

    $sql = mysqli_query($koneksi,"INSERT INTO komentar(nama_komentar,url,isi_komentar,id_blog,tgl,jam_komentar) 
                        VALUES('$nama_komentar','$url','$v_text','$_POST[id]','$tgl_sekarang','$jam_sekarang')");

    $row=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM blog WHERE id_blog=$_POST[id]"));
    echo "<meta http-equiv='refresh' content='0; url=blog-$_POST[id]-$row[judul_seo].html'>";
	
	
	
   $kepada = "$teraskreasi[email]"; 
   $judul = "Ada komentar di $teraskreasi[nama_website]";
   $pesan = "Baru saja ada yang kirim komentar di $teraskreasi[nama_website]\n"; 
   $pesan .= "Cek Komentar: $teraskreasi[url]/blog-$_POST[id]-$row[judul_seo].html"; 
   mail($kepada,$judul,$pesan,"From: $teraskreasi[email]\n Content-type:text/html\r\n"); }

	
	
		else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}
?>
