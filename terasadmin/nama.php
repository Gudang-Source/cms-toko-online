<?php
include "../config/koneksi.php";
$a=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'"));
echo "$a[nama_lengkap]"; 

?>
