<?php
session_start();
ob_start();
error_reporting(0);
include "config/koneksi.php";
include "config/library.php";

$module=$_GET[module];
$act=$_GET[act];
$linkfrom=$_GET[lf];
$sid = session_id();

if ($module=='keranjang' AND $act=='tambah'){

	$sql2 = mysqli_query($koneksi,"SELECT stok FROM produk WHERE id_produk='$_GET[id]'");
	$r=mysqli_fetch_array($sql2);
	$stok=$r[stok];
  
  if ($stok == 0){
      echo "<b>Maaf, stok sudah habis. Silahkan pilih produk yang lain.</b>";
  }
  else{
	// check if the product is already
	// in cart table for this session
	$sql = mysqli_query($koneksi,"SELECT id_produk FROM orders_temp
			WHERE id_produk='$_GET[id]' AND id_session='$sid'");
	$ketemu=mysqli_num_rows($sql);
	if ($ketemu==0){
		// put the product in cart table
		mysqli_query($koneksi,"INSERT INTO orders_temp (id_produk, jumlah, id_session, tgl_order_temp, jam_order_temp, stok_temp)
				VALUES ('$_GET[id]', 1, '$sid', '$tgl_sekarang', '$jam_sekarang', '$stok')");
	} else {
		// update product quantity in cart table
		mysqli_query($koneksi,"UPDATE orders_temp 
		        SET jumlah = jumlah + 1
				WHERE id_session ='$sid' AND id_produk='$_GET[id]'");		
	}	
	deleteAbandonedCart();
	header('Location:keranjang-belanja.html');
  }				
}

elseif ($module=='keranjang' AND $act=='hapus'){
	mysqli_query($koneksi,"DELETE FROM orders_temp WHERE id_orders_temp='$_GET[id]'");
	header('Location:keranjang-belanja.html');				
}

elseif ($module=='keranjang' AND $act=='update'){
  $id       = $_POST[id];
  $jml_data = count($id);
  $jumlah   = $_POST[jml]; // quantity
  for ($i=1; $i <= $jml_data; $i++){
	$sql2 = mysqli_query($koneksi,"SELECT stok_temp FROM orders_temp	WHERE id_orders_temp='".$id[$i]."'");
	while($r=mysqli_fetch_array($sql2)){
if ($jumlah[$i] > $r[stok_temp]){
echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada');
window.location=('keranjang-belanja.html')</script>";
}
elseif($jumlah[$i] == 0){
echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');
window.location=('keranjang-belanja.html')</script>";
}
// tambahan update ada disini
else{
mysqli_query($koneksi,"UPDATE orders_temp SET jumlah = '".$jumlah[$i]."'
WHERE id_orders_temp = '".$id[$i]."'");
header('Location:keranjang-belanja.html');
    }
  }
 }
}

//modul simpan transaksi
elseif ($act=='simpantransaksi'){
	$idreferal=$_COOKIE[idreferal];
	// fungsi untuk mendapatkan isi keranjang belanja
	function isi_keranjang(){
		$isikeranjang = array();
		$sid = session_id();
		$sql = mysqli_query($koneksi,"SELECT * FROM orders_temp WHERE id_session='$sid'");
		
		while ($r=mysqli_fetch_array($sql)) {
			$isikeranjang[] = $r;
		}
		return $isikeranjang;
	}


	$tgl_skrg = date("Ymd");
	$jam_skrg = date("H:i:s");

	// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
	$isikeranjang = isi_keranjang();
	$jml          = count($isikeranjang);

	//memastikan keranjang tidak kosong
	if ($jml > 0){
		if (empty($_POST[shipping])){
			// simpan data pemesanan 
			mysqli_query($koneksi,"INSERT INTO orders(id_kustomer, tgl_order, jam_order) 
						 VALUES('$_SESSION[namauser]','$tgl_skrg','$jam_skrg')");
		}  
		else{
			if ($_POST[kota]=='kotalain'){
				$kota=$_POST[kotalain];
			}else{
				$kota=$_POST[kota];}
			mysqli_query($koneksi,"INSERT INTO orders(id_kustomer, alamat_kirim, kode_pos_kirim, propinsi_kirim, kota_kirim, tgl_order, jam_order,shipping) 
					 VALUES('$_SESSION[namauser]','$_POST[alamat]','$_POST[kode_pos]','$_POST[propinsi]','$kota','$tgl_skrg','$jam_skrg','$_POST[shipping]')");
		}
				
		//dapatkan no orders untuk detail order dan afiliasi
		$sql=mysqli_query($koneksi,"SELECT * FROM orders WHERE id_kustomer='$_SESSION[namauser]' AND status_order='Baru' ORDER BY id_orders DESC");
		$r=mysqli_fetch_array($sql);
		
		// simpan data detail pemesanan  
		for ($i = 0; $i < $jml; $i++){
		  mysqli_query($koneksi,"INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
					   VALUES('$r[id_orders]',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
		}
		  
		// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara
		for ($i = 0; $i < $jml; $i++) {
		  mysqli_query($koneksi,"DELETE FROM orders_temp
						 WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
		}
		
		
		
		//Rekam hasil referal
		if (isset($idreferal) AND $_SESSION[namauser] != $idreferal){
			mysqli_query($koneksi,"INSERT INTO afiliasi(id_kustomer, id_orders,afiliasi_session) 
						 VALUES('$idreferal','$r[id_orders]','$sid')");
		}
		
	}
	//Kirim email informasi order ke kustomer 
	//include "kirim-email-order.php";
	header('Location:lihat-order.html');
	
}

// Pendaftaran Kustomer
if ($act=='daftarkustomer'){
  $kar1=strstr($_POST[email], "@");
  $kar2=strstr($_POST[email], ".");

  if (empty($_POST[username]) || empty($_POST[username]) || empty($_POST[nama_lengkap]) || empty($_POST[email]) || empty($_POST[alamat]) || empty($_POST[kode_pos]) || empty($_POST[no_telp]) || empty($_POST[kota])){
	echo "<script>alert('Data yang Anda isikan belum lengkap')</script>
			<script>document.location.href='javascript:history.go(-1)'</script>";
  }
   elseif ($_POST[password] != $_POST[password2]){
	echo "<script>alert('Pengulangan password tidak sama.')</script>
		<script>document.location.href='javascript:history.go(-1)'</script>";
  }
  elseif (!ereg("[a-z|A-Z]","$_POST[nama_lengkap]")){
	echo "<script>alert('Nama tidak boleh diisi dengan angka atau simbol.')</script>
		<script>document.location.href='javascript:history.go(-1)'</script>";
  }
  elseif (strlen($kar1)==0 OR strlen($kar2)==0){
	echo "<script>alert('Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.')</script>
		<script>document.location.href='javascript:history.go(-1)'</script>";
  }
  else{
	
  $sidnow=session_id();
  $pass=md5($_POST[password]);
  //cek apakah username sudah digunakan
  $cek = mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer = '$_POST[username]'");
  $tampil = mysqli_num_rows($cek);
    
  if ($tampil > 0){
	echo"<script>alert('Username sudah digunakan. Gunakan username lain.')</script>";
	echo"<script>document.location.href='javascript:history.go(-1)'</script>";
  }
  else{
  if ($_POST[kota]=='lainnya'){							
		$kota="$_POST[kotalain]";
	}
	else{
		$kota="$_POST[kota]";
	}
  $query="INSERT INTO kustomer(id_kustomer,
                                 password,
                                 nama_lengkap,
								 alamat,
								 kode_pos,
								 propinsi,
								 kota,
                                 email, 
                                 no_telp,
								 level,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
								'$_POST[alamat]',
								'$_POST[kode_pos]',
								'$_POST[propinsi]',
								'$kota',
								'$_POST[email]',
                                '$_POST[no_telp]',
								'kustomer',
                                '$sidnow')";
								
	mysqli_query($query);
	  		  
		  $cek = mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer = '$_POST[username]'")or die(mysqli_error());
		  $r = mysqli_fetch_array($cek);
		  if ($linkfrom == 'daftar'){
			  $_SESSION[namauser]     = $r[id_kustomer];
			  $_SESSION[namalengkap]  = $r[nama_lengkap];
			  $_SESSION[passuser]     = $r[password];
			  $_SESSION[leveluser]    = $r[level];
			header('location:index.php');
		  }
		  elseif($linkfrom == 'selesaibelanja'){
			  $_SESSION[namauser]     = $r[id_kustomer];
			  $_SESSION[namalengkap]  = $r[nama_lengkap];
			  $_SESSION[passuser]     = $r[password];
			  $_SESSION[leveluser]    = $r[level];
			header('location:selesai-belanja.html');
		  }
  }
  }
}


function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysqli_query($koneksi,"DELETE FROM orders_temp 
	        WHERE tgl_order_temp < '$kemarin'");
}
?>
