<?php
//Authentication
include "../../../config/authentication_kustomer.php";

session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Update status order
if ($module=='konfirmasi' AND $act=='update'){
	$pembayaran='No Order : '.$_POST[noorder].'<br>Pembayaran Ke : '.$_POST[rekeningtujuan].'<br> Pada Tanggal : '.$_POST[tglbayar].'<br>Sebesar : '.$_POST[besarbayar].'<br>Dari : '.$_POST[namabank].'<br>No Rekening : '.$_POST[norekening].' Atas Nama : '.$_POST[nama];
	mysqli_query($koneksi,"UPDATE orders SET pembayaran='$pembayaran' where id_orders='$_POST[noorder]'");
	header('location:../../media.php?module=tampilorder');
	
   $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
   $kepada = "$iden[email]"; 
   $judul = "Baru saja ada Konfirmasi Order di $iden[nama_website]";
   $pesan = "Baru saja ada Konfirmasi Order di $iden[nama_website]\n"; 
   $pesan .= "Cek Order di Administrator: $iden[url]/terasadmin"; 
   mail($kepada,$judul,$pesan,"From: $iden[email]\n Content-type:text/html\r\n");  
	
	
}
?>
