<?php
include "../config/koneksi.php";


if ($_SESSION[leveluser]=='kustomer' OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=profil'><span class='text'>Profil</span></a></li>";}

if ($_SESSION[leveluser]=='kustomer' OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=tampilorder'><span class='text'>Order Anda</span></a></li>";}

if ($_SESSION[leveluser]=='kustomer' OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='../logout.php'><span class='text'>Log Out</span></a></li>";}

?>
