<?php
include "config/authentication_kustomer.php";
include "config/koneksi.php";
include "config/fungsi_rupiah.php";



  $base_url = $_SERVER['HTTP_HOST'];
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  $logo2=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM logo"));
  $url = "$teraskreasi[url]";

  $sql=mysqli_query($koneksi,"SELECT * FROM orders WHERE id_kustomer='$_SESSION[namauser]' 
  AND status_order='Baru' ORDER BY id_orders DESC LIMIT 1");
  $count=mysqli_num_rows($sql);
	
	
	
  if ($count > 0 ){
  $r=mysqli_fetch_array($sql);
		
  $tampil=mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer='$r[id_kustomer]'");
  $r2=mysqli_fetch_array($tampil);
			
  $daftarproduk=mysqli_query($koneksi,"SELECT * FROM orders_detail,produk 
  WHERE orders_detail.id_produk=produk.id_produk 
  AND id_orders='$r[id_orders]'");
											 
  //Informasi Pengiriman
  if ($r[shipping] == 'akun'){
  $alamat		= $r2[alamat];
  $kodepos	    = $r2[kode_pos];
  $propinsi	    = $r2[propinsi];
  $kota		    = $r2[kota];}
  
  else{
  $alamat		= $r[alamat_kirim];
  $kodepos	    = $r[kode_pos_kirim];
  $propinsi	    = $r[propinsi_kirim];
  $kota		    = $r[kota_kirim];}
  
  
			
  //Isi pesan bagian header								 
  $pesan="
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  <tr> 
  <td><a href='$iden[url]'><img src='".$url."/logo/$logo2[gambar]' width='140'/></a></td>
  <td><span style='font-family: Arial, Helvetica, sans-serif;font-size: 14px;color: #FFFFFF;text-align: 
  left;color:#996600;'> $iden[nama_website]</span><br/>
  $iden[alamat]
  </td>
  </tr>
  </tbody>
  </table>
  <br/>
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  
  
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  <tr>
  <td colspan='2'><a href='$base_url' target='_blank'><img width=520 src='$base_url/img_header/banner_order.jpg'><a/></td>
  </tr>
  </tbody>
  </table>
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  
  <tr bgcolor='#FF9900'>
  <td  height='30' style='font-size: 13px; color:#FFFFFF; text-align:left; padding-left:10px;'>
  <b>Pemesanan Online $iden[nama_website]</b></td>
  </tr>
  
  </tbody>
  </table>
  		
  <table border='0' cellpadding='0' cellspacing='0' width='520' style='font-size:13px; color: #000000; 
  background-color:#FFFFFF; margin-top:2px; margin-bottom:2px;'>
  <tbody>
	
  <tr bgcolor='#f0f0f0'>
  <td style='text-align:left; padding-left:10px;'>No. Order</td>
  <td width='350' height='20'>: $r[id_orders]</td>
  </tr>
		
		
  <tr bgcolor='#ffffff'>
  <td style='text-align:left; padding-left:10px;'>Tgl. Order</td>
  <td width='350' height='20'>: $r[tgl_order]</td>
  </tr>
		
		
  <tr bgcolor='#f0f0f0'>
  <td style='text-align:left; padding-left:10px;'>Nama</td>
  <td width='350' height='20'>: $r2[nama_lengkap] </td>
  </tr>
		
  <tr bgcolor='#ffffff'>
  <td style='text-align:left; padding-left:10px;'>Alamat</td>
  <td width='350' height='20'>: $alamat</td>
  </tr>
	
	
  <tr bgcolor='#f0f0f0'>
  <td style='text-align:left; padding-left:10px;'>Kode Pos</td>
  <td width='350' height='20'>: $kodepos</td>
  </tr>
	
	
  <tr bgcolor='#ffffff'>
  <td style='text-align:left; padding-left:10px;'>Propinsi</td>
  <td width='350' height='20'>: $propinsi</td>
  </tr>
	
	
  <tr bgcolor='#f0f0f0'>
  <td style='text-align:left; padding-left:10px;'>Kota</td>
  <td width='350' height='20'>: $kota</td>
  </tr>

  
  </tbody>
  </table>
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  
  <tr bgcolor='#FF9900'>
  <td  height='30' style='font-size: 13px; color:#FFFFFF; text-align:left; padding-left:10px;'>
  Data order Anda adalah sebagai berikut:</td>
  </tr>
  
  </tbody>
  </table>				
				
				  
  <table width='520' border='1' shadow='0' border-color='#f0f0f0' cellpadding='0' cellspacing='0'>
  
  <thead>
  <tr height='20' bgcolor='#f0f0f0' style='padding-top:5px; padding-bottom:5px;'>
  
  <th width='40'>Item</th> 
  <th width='160'>Nama Produk</th>
  <th width='160'>Harga</th>       
  <th width='160'>Sub Total</th>       
  </tr>
  </thead>
  
  </table>";
  
  /////////////////////////////////////////////////////////////////////////////////////
         
  $no=1;
  while ($d=mysqli_fetch_array($daftarproduk)){
  $disc        = ($d[diskon]/100)*$d[harga];
  $hargadisc   = number_format(($d[harga]-$disc),0,",","."); 
  $subtotal    = ($d[harga]-$disc) * $d[jumlah];

  $subtotalberat = $d[berat] * $d[jumlah]; 
  $totalberat  = $totalberat + $subtotalberat; 

  $total       = $total + $subtotal;
  $subtotal_rp = format_rupiah($subtotal);    
  $total_rp    = format_rupiah($total);    
  $harga       = format_rupiah($d[harga]);

   
  echo " 
  <tr>
  <td>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>
  <td class='product-name'>$d[nama_produk]</td>
  <td>$d[berat]</td>
  <td>$d[jumlah]</td>
  <td>$hargadisc</td>
  <td>$subtotal_rp</td>
  </tr>";

  // BUAT KIRIM EMAIL (2) /////////////////////////////////////////////////////////////////
  
  $pesan.="
  <table width='520' border='1' border-color='#f0f0f0' cellpadding='0' cellspacing='0'>
  
  <tr>
  <td width='40'><center>$d[jumlah]</center></td>
  <td width='160'><center>$d[nama_produk]</center></td>
  <td width='160'><center>Rp. $harga </center></td>
  <td width='160'><center>Rp. $subtotal_rp</center></td>   
  </tr>
  
  </table>";
  
  //////////////////////////////////////////////////////////////////////////////////////////////
  
  $no++;}

  $ongkos=mysqli_fetch_array(mysqli_query($koneksi,"SELECT ongkos_kirim FROM kota WHERE nama_kota='$kota'"));
  $ongkoskirim1=$ongkos[ongkos_kirim];
  $ongkoskirim=$ongkoskirim1 * $totalberat;

  $grandtotal    = $total + $ongkoskirim; 
  $ongkoskirim_rp =  number_format(($ongkoskirim),0,",",".");
  $ongkoskirim1_rp =  number_format(($ongkoskirim1),0,",",".");
  $grandtotal_rp  = number_format(($grandtotal),0,",",".");

  //=====================================================================================================
  
  // BUAT KIRIM EMAIL (3) /////////////////////////////////////////////////////////////////
  $pesan.="
  
  <table border='0' cellpadding='0' cellspacing='0' width='520' style='font-size:14px; color: #000000; 
  background-color:#FFFFFF; margin-top:2px; margin-bottom:2px;'>
  <tbody>
	
  <tr bgcolor='#f0f0f0'>
  <td td colspan=5 align=right>Total: </td>
  <td td align=right style='text-align:right; padding-right:10px;' height='20'><b>Rp. $total_rp</b></td>
  </tr>
		
  <tr bgcolor='#ffffff'>
  <td td colspan=5 align=right>Ongkos Kirim: </td>
  <td td align=right style='text-align:right; padding-right:10px;' height='20'><b>Rp. $ongkoskirim1_rp/Kg</b></td>
  </tr>
		
  <tr bgcolor='#f0f0f0'>
  <td td colspan=5 align=right>Total Berat: </td>
  <td td align=right style='text-align:right; padding-right:10px;' height='20'><b>$totalberat Kg</b></td>
  </tr>
		
  <tr bgcolor='#ffffff'>
  <td td colspan=5 align=right>Total Ongkos Kirim: </td>
  <td td align=right style='text-align:right; padding-right:10px;' height='20'><b>Rp. $ongkoskirim_rp</b></td>
  </tr> 
  
  <tr bgcolor='#f0f0f0'>
  <td td colspan=5 align=right>Grand Total: </td>
  <td td align=right style='text-align:right; padding-right:10px;' height='20'><b>Rp. $grandtotal_rp</b></td>
  </tr>
		
  </tbody>
  </table>
  
  <p style='padding-left: 20px;' >Silahkan lakukan pembayaran sebanyak Grand Total yang tercantum, <br/>
  ke: <b>$iden[rekening]</b>.<p>
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>

   <td style='font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #FFFFFF;text-align: 
   left;background-color:#996600; padding-top: 5px;padding-right: 10px;padding-bottom: 
   5px;padding-left: 25px;' bgcolor='#191919'>
   
   <p align='center'>
   Email ini dikirim dari $iden[nama_website] -  <a href='mailto:rizal_fzl@yahoo.com?subject=Order Web' 
   style='color:#FFFFFF;' color='#FFFFFF'>$iden[email]</a></p>
   <p align='center'>.::$iden[nama_website]::. - $iden[meta_deskripsi]</p>
   </td></tr>
   
  </tbody>
  </table>";

  //////////////////////////////////////////////////////////////////////////////////////////////////////

  $subjek=".:: Pemesanan Online $iden[nama_website]";

  // Kirim email dalam format HTML
  $dari = "From:  noreply@commercialkitchen.co.id \n";
  $dari .= "Content-type: text/html \r\n";
  
  
	$kustomer = mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer = '$r[id_kustomer]'");
	$rkustomer = mysqli_fetch_array($kustomer);
  
	// Kirim email ke kustomer
	mail($rkustomer['email'],$subjek,$pesan,$dari);

  // Kirim email ke pengelola toko online
  mail("$iden[email]",$subjek,$pesan,$dari);

  echo "
  <tr>
  <td colspan='4' class='unit-price'></td>
  <td class='riztable'><span class='summary'>Total: </span></td>
  <td class='totalharga'><span class='summary'>Rp. $total_rp</span></td>
  </tr>
  
  <tr>
  <td colspan='4' class='unit-price'></td>
  <td class='riztable'><span class='summary'>Ongkos Kirim: </span></td>
  <td class='totalharga'><span class='summary'>Rp. $ongkoskirim1_rp</span></td>
  </tr>
  
  <tr>
  <td colspan='4' class='unit-price'></td>
  <td class='riztable'><span class='summary'>Total Berat: </span></td>
  <td class='totalharga'><span class='summary'>$totalberat Kg</span></td>
  </tr>
			
  <tr>
  <td colspan='4' class='unit-price'></td>
  <td class='riztable'><span class='summary'>Total Ongkos Kirim: </span></td>
  <td class='totalharga'><span class='summary'>Rp. $ongkoskirim_rp</span></td>
  </tr>
		
  <tr>
  <td colspan='4' class='unit-price'></td>
  <td class='riztable'><span class='summary'>Grand Total: </span></td>
  <td class='totalharga'><span class='summary'>Rp. $grandtotal_rp</span></td>
  </tr></table>";


  echo "<div class='catatan2'>&bull; Data order dan nomor rekening transfer sudah terkirim ke email Anda. <br />
  &bull; Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka data order Anda akan terhapus (transaksi batal)</div>
  
  </div>
  <br class='clear'/></div>"; }
  
  

?>