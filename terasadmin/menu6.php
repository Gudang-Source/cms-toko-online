<?php
include "../config/koneksi.php";


$cek=umenu_akses("?module=user",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=user'><span class='text'>Manajemen User</span></a></li>";}

$cek=umenu_akses("?module=kustomer",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=kustomer'><span class='text'>Manajemen Kustomer</span></a></li>";}


$cek=umenu_akses("?module=modul",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=modul'><span class='text'>Manajemen Modul</span></a></li>";}

?>
