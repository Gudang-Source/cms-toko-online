<?php
include "../config/koneksi.php";
$sql2 = mysqli_query($koneksi,"select url from identitas LIMIT 1");
$j2   = mysqli_fetch_array($sql2);
echo "$j2[url]"; 
?>
