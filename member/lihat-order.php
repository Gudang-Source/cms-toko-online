 
  <div id="content" class="has-sidebar">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  



  <!--========= LIHAT ORDER ================================================-->
  <?php
  $pathfile='config/authentication_kustomer.php';
  if (file_exists($pathfile)){
  include "$pathfile";}
  else{
  include "../".$pathfile;}

  session_start();
  $warnaGenap='#a0ffa4';
  $warnaGanjil='#e7ffe8';
	
  $sql=mysqli_query($koneksi,"SELECT * FROM orders WHERE id_kustomer='$_SESSION[namauser]' 
  AND status_order='Baru' ORDER BY id_orders DESC LIMIT 2")or die(mysqli_error());
  $count=mysqli_num_rows($sql);
  
  if ($count > 0 ){
  echo "
  <div id='main' class='fixed box box-common'>
  <h3 class='heading-title'>Data order anda sebagai berikut</h3>";	

  while ($r=mysqli_fetch_array($sql)){
  $tgl_order = tgl_indo($r[tgl_order]);
  $tampil=mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer='$r[id_kustomer]'");
  $r2=mysqli_fetch_array($tampil);

  echo"
  <table>
  <tr>			
  <td width='120px'><b>Nomor Order</b></td><td>:&nbsp;&nbsp;<span class='angkapoint'>$r[id_orders]</span> 
  <span class style=\"color:#999;font-size:11px;float:right;\">*(Catat nomor order untuk konfirmasi pembayaran)</span></td>
  </tr>			
  <tr>			
  <td><b>Tanggal Order</b></td><td>: $tgl_order</td>
  </tr>			
  <table><br/>";
			
			
  if ($r[shipping]== 'akun'){
  echo "<h5>Barang dikirim ke alamat :</h5>";
				
  $alamat	= $r2[alamat];
  $kodepos	= $r2[kode_pos];
  $propinsi	= $r2[propinsi];
  $kota		= $r2[kota];}

  else{
  $alamat	 = $r[alamat_kirim];
  $kodepos	= $r[kode_pos_kirim];
  $propinsi	= $r[propinsi_kirim];
  $kota		= $r[kota_kirim];}

  echo "
  <table>
  <tr><td width='120px'><b>Alamat</b></td><td>: $alamat</b></td></tr>
  <tr><td><b>Kode Pos</b></td><td>: $kodepos</td></tr>
  <tr><td><b>Propinsi</b></td><td>: $propinsi</td></tr>
  <tr><td><b>kota</b></td><td>: $kota</td></tr>
  </table>";
  
  $daftarproduk=mysqli_query($koneksi,"SELECT * FROM orders_detail,produk 
  WHERE orders_detail.id_produk=produk.id_produk 
  AND id_orders='$r[id_orders]'");
			
			
  echo "
  <div class='cart-info'>
  <h5>Pesanan Anda:</h5>  
  
  <table>
  <thead>
  <tr>
  
  <td>Nama Produk</td>
  <td>Jumlah</td>  
  <td>Harga</td>       
  <td>Sub Total</td>       
  </tr>
  </thead>
  <tbody>";
			
  $total = '';
  $no=1;
  while ($d=mysqli_fetch_array($daftarproduk)){
  
  // rumus untuk menghitung subtotal dan total		
  $disc        = ($d[diskon]/100)*$d[harga];
  $hargadisc   = number_format(($d[harga]-$disc),0,",","."); 
  $subtotal    = ($d[harga]-$disc) * $d[jumlah];

  $total       = $total + $subtotal;
  $subtotal_rp =  number_format(($subtotal),0,",",".");
  $total_rp    =  number_format(($total),0,",",".");
  $harga       =  number_format(($d[harga]),0,",",".");

  $subtotalberat = $d[berat] * $d[jumlah]; // total berat per item produk 
  $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli
			
  if ($no % 2 == 0){
  $warna = $warnaGenap;}
  else{
  $warna = $warnaGanjil;}	
				
  echo "
  <tr>
  <td><b>$d[nama_produk]</b></td>
  <td align=center>$d[jumlah]</td>
  <td align=right>Rp. $harga</td>
  <td align=right>Rp. $subtotal_rp</td>
  </tr>";
		
			
  $no++;}
			
  $ongkos=mysqli_fetch_array(mysqli_query($koneksi,"SELECT ongkos_kirim FROM kota WHERE nama_kota='$kota'"));
  $ongkoskirim1=$ongkos[ongkos_kirim];
  $ongkoskirim=$ongkoskirim1 * $totalberat;

  $grandtotal    = $total + $ongkoskirim; 
  $ongkoskirim_rp =  number_format(($ongkoskirim),0,",",".");
  $ongkoskirim1_rp =  number_format(($ongkoskirim1),0,",",".");
  $grandtotal_rp  = number_format(($grandtotal),0,",",".");

			
  echo "
  </tbody>
  </table>
			
  <div class='cart-total'>
 		  
  <table>
  <tbody>
  
  <tr>
  <td class='right numbers_total'>Total</td><td class='right numbers_total'>Rp. $total_rp</td>
  </tr>
	
  <tr>
  <td class='right numbers_total'>Ongkos Kirim</td><td class='right numbers_total'>Rp. $ongkoskirim_rp</td>
  </tr>
  
  <tr>
  <td class='right numbers_total'>Total Keseluruhan</td>
  <td class='right numbers_total'>Rp. $grandtotal_rp</td>
  </tr>
  
  </tbody>
  </table>
  </div>";
				  
  echo "<div><ul>
  <li>Barang yang anda pesan akan dikirim setelah anda melakukan konfirmasi pembayaran</li>
  <li>Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka data order Anda akan terhapus (transaksi batal)</li>
  </ul></div> <br/>";
				  
  echo"<a href=member/media.php?module=tampilorder&act=konfirmasi&id=$r[id_orders] class='button button-orange'>
  <blink>KONFIRMASI PEMBAYARAN</blink></a>
   <br/> <br/>
  <br/></div></div>";}}
  
  else{
  echo"<div align=center><b>Tidak ada produk yang anda pesan.</b></div>";}
  
  ?>
  <!--========= AKHIR LIHAT ORDER ================================================-->
  
  </div>
  </div>

