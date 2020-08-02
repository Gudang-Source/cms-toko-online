<?php
  include "config/koneksi.php";
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  header("location: $iden[url]"); 
?>
