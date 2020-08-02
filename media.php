<?php 
 ob_start ('ob_gzhandler');
  session_start();
  // Panggil semua fungsi yang dibutuhkan (semuanya ada di folder config)
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/class_paging.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_badword.php";
  include "config/fungsi_rupiah.php";
 
  // Memilih template yang aktif saat ini
  $pilih_template=mysqli_query($koneksi,"SELECT folder FROM templates WHERE aktif='Ya'");
  $f=mysqli_fetch_array($pilih_template);
  include "$f[folder]/template.php"; 
?>
