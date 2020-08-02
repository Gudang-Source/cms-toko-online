<?php
include "../config/koneksi.php";
  $baru=mysqli_query("SELECT * FROM orders WHERE status_order='Baru'");
  $hit=mysqli_num_rows($baru);


$cek=umenu_akses("?module=produk",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=produk'><span class='text'>Produk</span></a></li>";}

$cek=umenu_akses("?module=kategori",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=kategori'><span class='text'>Kategori Produk</span></a></li>";}

$cek=umenu_akses("?module=galerifoto",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=galerifoto'><span class='text'>Galeri Gambar Produk</span></a></li>";}


$cek=umenu_akses("?module=carabeli",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=carabeli'><span class='text'>Cara Pembelian</span></a></li>";}

$cek=umenu_akses("?module=order",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=order'><span class='text'>Order Masuk</span>
<a href='?module=order' class='caption yellow link_navPopMessages'>$hit</a></a></li>";}

$cek=umenu_akses("?module=ongkoskirim",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=ongkoskirim'><span class='text'>Ongkos Kirim</span></a></li>";}

$cek=umenu_akses("?module=jasapengiriman",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=jasapengiriman'><span class='text'>Jasa Pengiriman</span></a></li>";}

$cek=umenu_akses("?module=laporan",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=laporan'><span class='text'>Laporan Penjualan</span></a></li>";}

$cek=umenu_akses("?module=download",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=download'><span class='text'>Download Katalog</span></a></li>";}


$cek=umenu_akses("?module=bank",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=bank'><span class='text'>Bank Pembayaran</span></a></li>";}



?>




