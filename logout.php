<?php
  session_start();
  session_destroy();
  
  session_start();
  session_regenerate_id(); 
  
  echo"<script>alert('ANDA TELAH LOGOUT!')</script>";
  //echo"<script>document.location.href='home';</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
  //header('location:index.php');

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:
//  header('location:http://www.alamatwebsite.com');
?>
