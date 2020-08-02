 <?php
include "../config/koneksi.php";
$a=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'"));
echo "<img width=50 height=50 src='../img_user/$a[foto]' class='img-polaroid'>"; 
?>