<?php
include "../config/koneksi.php";
  $baru=mysqli_query("SELECT * FROM orders WHERE status_order='Baru'");
  $hit=mysqli_num_rows($baru);
$isi_komentar=mysqli_num_rows(mysqli_query("SELECT * FROM komentar WHERE dibaca='N'"));

$cek=umenu_akses("?module=blog",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=blog'><span class='text'>Blog</span></a></li>";}

$cek=umenu_akses("?module=kategoriblog",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=kategoriblog'><span class='text'>Kategori Blog</span></a></li>";}

$cek=umenu_akses("?module=tag",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=tag'><span class='text'>Tag Blog</span></a></li>";}

$cek=umenu_akses("?module=komentar",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=komentar'><span class='text'>Komentar Blog</span>
<a href='?module=komentar' class='caption yellow link_navPopMessages'>$isi_komentar</a></a></li>";}

$cek=umenu_akses("?module=katajelek",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=katajelek'><span class='text'>Sensor Kata Komentar</span></a></li>";}

?>
