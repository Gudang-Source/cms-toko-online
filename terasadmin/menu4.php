<?php
include "../config/koneksi.php";


$cek=umenu_akses("?module=iklan_popup",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=iklan_popup'><span class='text'>Iklan PopUp</span></a></li>";}

$cek=umenu_akses("?module=banner",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=banner'><span class='text'>Banner</span></a></li>";}

$cek=umenu_akses("?module=iklan",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=iklan'><span class='text'>Iklan Dalam</span></a></li>";}
?>
