<?php
include "../../../config/authentication_users.php";
session_start();
include "../../../config/koneksi.php";

$module	= $_GET[module];
$act	= $_GET[act];
$id		= $_POST[id];
$status	= $_POST[status_order];

// Update status order
if ($module=='order' AND $act=='update'){
  // Baca status order
  $cek = mysqli_query($koneksi,"SELECT * FROM orders WHERE id_orders = '$id'");
  $rcek = mysqli_fetch_array($cek);
  $rstatus = $rcek[status_order];
  
  $query=mysqli_query($koneksi,"UPDATE orders SET status_order='$status' where id_orders='$id'");
  if (!$query){
	echo "Update Status gagal!<br/>";
	echo "<a href=javascript:history.go(-1)>Kembali</a>";
  }else{
	//Update Jmlh beli dan stok produk dimana status awal = baru dan isi post status <> baru
	if ($rstatus == 'Baru' && $status != 'Baru'){
		//Menghitung Jumlah beli di order detail
		$sql = mysqli_query($koneksi,"SELECT * FROM orders_detail WHERE id_orders='$id'");
		
		while($r=mysqli_fetch_array($sql)){
			$jumlah = '';
			$jmlhbeli	= '';
			$stok		= '';
			$jumlah = $r[jumlah];
			
			//Tampil produk
			$sql2=mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$r[id_produk]'");
			$r2=mysqli_fetch_array($sql2);
			
			$jmlhbeli = $r2[dibeli] + $jumlah;
			if ($r2[stok] > 0){
				$stok = $r2[stok] - $jumlah;
			}
			else{
				$stok = 0;}
				
			// Update Jmlh beli dan stok produk	
			$query2=mysqli_query($koneksi,"UPDATE produk SET stok = '$stok',
											  dibeli 	= '$jmlhbeli'
										WHERE id_produk = '$r2[id_produk]'");
		}
		if (!$query2){
			echo "Update Jmlh beli dan stok produk gagal!<br/>";
			echo "<a href=javascript:history.go(-1)>Kembali</a>";}
		else{
			header('location:../../media.php?module='.$module);
		}
		
	}else{
		header('location:../../media.php?module='.$module);
	}
  }
}
 
// Hapus terpilih //////////////////////////////////////////////////////
elseif($module=='order' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM orders WHERE id_orders=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
}
?>