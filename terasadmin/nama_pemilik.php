<?php
include "../config/koneksi.php";
$sql2 = mysqli_query($koneksi,"select nama_lengkap  from users LIMIT 1");
$j2   = mysqli_fetch_array($sql2);
echo "$j2[nama_lengkap]"; 
?>
