<?php
if (isset($_GET['id'])){
    $sql = mysqli_query($koneksi,"select nama_produk from produk where id_produk='$_GET[id]'");
    $j   = mysqli_fetch_array($sql);
    if ($j) {
        echo "$j[nama_produk]";
    } else{
      $sql2 = mysqli_query($koneksi,"select nama_website from identitas LIMIT 1");
      $j2   = mysqli_fetch_array($sql2);
		  echo "$j2[nama_website]";
  }
}
else{
      $sql2 = mysqli_query($koneksi,"select nama_website from identitas LIMIT 1");
      $j2   = mysqli_fetch_array($sql2);
		  echo "$j2[nama_website]";
}
?>
