<?php
include "../config/koneksi.php";
 $jumHub=mysqli_num_rows(mysqli_query("SELECT * FROM hubungi WHERE dibaca='N'"));
$pesan=mysqli_num_rows(mysqli_query("SELECT * FROM testimoni WHERE dibaca='N'"));

$cek=umenu_akses("?module=newsletter",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=newsletter'><span class='text'>Newsletter</a></li>";}

$cek=umenu_akses("?module=logo",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=logo'><span class='text'>Logo Website</a></li>";}

$cek=umenu_akses("?module=templates",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=templates'><span class='text'>Template Website</a></li>";}

$cek=umenu_akses("?module=header",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=header'><span class='text'>Header Website</a></li>";}


$cek=umenu_akses("?module=perbaikan",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=perbaikan'><span class='text'>Maintenance Website</span></a></li>";}


$cek=umenu_akses("?module=background",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=background'><span class='text'>Background Website</span></a></li>";}

$cek=umenu_akses("?module=hubungi",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=hubungi'><span class='text'>Pesan Masuk</span>
<a href='?module=hubungi' class='caption yellow link_navPopMessages'>$jumHub</a></a></li>";}


$cek=umenu_akses("?module=testimoni",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=testimoni'><span class='text'>Testimoni Pelanggan</span>
<a href='?module=hubungi' class='caption yellow link_navPopMessages'>$pesan</a></a></li>";}


$cek=umenu_akses("?module=peta",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=peta'><span class='text'>Peta Lokasi</span></a></li>";}





?>
