
  <!--========= SIMPAN TRANSAKSI =====================================================================-->
  <?php
  echo "<div class='main-content-left'>";
  
  $base_url = $_SERVER['HTTP_HOST'];
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  $header=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM header WHERE id_header=21"));
  
  $kar1=strstr($_POST[email], "@");
  $kar2=strstr($_POST[email], ".");

  if (empty($_POST[nama]) || empty($_POST[alamat]) || empty($_POST[telpon]) || empty($_POST[email]) || empty($_POST[kota])){
  
  echo " </div><div class='peringatan'>
  <p>Data yang Anda isikan belum lengkap.</p>
  <a href=javascript:history.go(-1)><input type='submit' class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>
  </div><br class='clear'/> </div>";}

  elseif (!ereg("[a-z|A-Z]","$_POST[nama]")){
  echo "</div><div class='peringatan'><p>Nama tidak boleh diisi dengan angka atau simbol.</p>
  <a href=javascript:history.go(-1)><input type='submit' class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>
   </div><br class='clear'/> </div>";}


  elseif (strlen($kar1)==0 OR strlen($kar2)==0){
  echo "
  </div><div class='peringatan'><p>Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.</p>
  <a href=javascript:history.go(-1)><input type='submit' class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>
  </div><br class='clear'/> </div>";}


  else{
  // fungsi untuk mendapatkan isi keranjang belanja
  function isi_keranjang(){
  $isikeranjang = array();
  $sid = session_id();
  $sql = mysqli_query($koneksi,"SELECT * FROM orders_temp WHERE id_session='$sid'");
	
  while ($r=mysqli_fetch_array($sql)) 
  {$isikeranjang[] = $r;}
  return $isikeranjang;}
  $tgl_skrg = date("Ymd");
  $jam_skrg = date("H:i:s");

  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  /* INI ASLINYA
  function antiinjection($data){
  $filter_sql = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;}
  *****/
  function anti_injection($data){
  global $koneksi;
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;  
}

  
  $nama   = antiinjection($_POST['nama']);
  $alamat = antiinjection($_POST['alamat']);
  $telpon = antiinjection($_POST['telpon']);
  //=====================================================================================================


  // PROSES TRANSAKSI SELESAI

  // simpan data pemesanan 
  mysqli_query($koneksi,"INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota) 
  VALUES('$_POST[nama]','$_POST[alamat]','$_POST[telpon]','$_POST[email]','$tgl_skrg','$jam_skrg','$_POST[kota]')");
  
  // mendapatkan nomor orders
  $id_orders=mysqli_insert_id();

  // panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
  $isikeranjang = isi_keranjang();
  $jml          = count($isikeranjang);

  // simpan data detail pemesanan  
  for ($i = 0; $i < $jml; $i++){
  mysqli_query($koneksi,"INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
  VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");}
  
  // setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
  for ($i = 0; $i < $jml; $i++) {
  mysqli_query($koneksi,"DELETE FROM orders_temp WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");}
  
  
  

  echo "<h3>Proses Transaksi Selesai</h3><br />";

  echo "
  Data pemesan dan order anda adalah sebagai berikut:
  <table>
  <tr><td>No. Order</td><td>:             $id_orders</td></tr>
  <tr><td>Nama</td><td>:                  $_POST[nama]</td></tr>
  <tr><td>Alamat Lengkap</td><td>:        $_POST[alamat]</td></tr>
  <tr><td>Telpon</td><td>:                $_POST[telpon]</td></tr>
  <tr><td>E-mail</td><td>:                $_POST[email]</td></tr></table>";

  $daftarproduk=mysqli_query($koneksi,"SELECT * FROM orders_detail,produk 
  WHERE orders_detail.id_produk=produk.id_produk 
  AND id_orders='$id_orders'");
  
  echo "<h3>Produk yang telah diorder</h3>";

  echo "
  
  
  <table class='rizal'>
  <thead>
  <tr>
       

  <th>No</th> 
  <th>Nama Produk</th>
  <th>Berat/Kg</th>  
  <th>Quantity</th>       
  <th>Harga</th>       
  <th>Sub Total</th>       

  </tr>
  </thead>"; 
  
  // BUAT KIRIM EMAIL (1) /////////////////////////////////////////////////////////////////
  $pesan="
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  <tr>
  <td colspan='2'><a href='$base_url' target='_blank'><img width=520 src='$base_url/img_header/banner_order.jpg'><a/></td>
  </tr>
  </tbody>
  </table>
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  
  <tr bgcolor='#CE5D86'>
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
		
		
  <tr bgcolor='#f0f0f0'>
  <td style='text-align:left; padding-left:10px;'>Tgl. Order</td>
  <td width='350' height='20'>: $r[id_orders]</td>
  </tr>
		
		
  <tr bgcolor='#ffffff'>
  <td style='text-align:left; padding-left:10px;'>Nama</td>
  <td width='350' height='20'>: $r[id_kustomer]</td>
  </tr>
		
  <tr bgcolor='#f0f0f0'>
  <td style='text-align:left; padding-left:10px;'>Alamat</td>
  <td width='350' height='20'>: $_POST[alamat]</td>
  </tr>
		
  <tr bgcolor='#ffffff'>
  <td style='text-align:left; padding-left:10px;'>Telpon/HP</td>
  <td width='350' height='20'>: $_POST[telpon]</td>
  </tr> 
  
  </tbody>
  </table>
  
  <table border='0' cellpadding='0' cellspacing='0' width='520'>
  <tbody>
  
  <tr bgcolor='#CE5D86'>
  <td  height='30' style='font-size: 13px; color:#FFFFFF; text-align:left; padding-left:10px;'>
  Data order Anda adalah sebagai berikut:</td>
  </tr>
  
  </tbody>
  </table>
  
  
  <table width='520' border='1' border-color='#f0f0f0' cellpadding='0' cellspacing='0'>
  
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

  $ongkos=mysqli_fetch_array(mysqli_query($koneksi,"SELECT ongkos_kirim FROM kota WHERE id_kota='$_POST[kota]'"));
  $ongkoskirim1=$ongkos[ongkos_kirim];
  $ongkoskirim = $ongkoskirim1 * $totalberat;
  $grandtotal    = $total + $ongkoskirim; 
  $ongkoskirim_rp = format_rupiah($ongkoskirim);
  $ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
  $grandtotal_rp  = format_rupiah($grandtotal);  
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
   left;background-color: #7A164C;padding-top: 5px;padding-right: 10px;padding-bottom: 
   5px;padding-left: 25px;' bgcolor='#191919'>
   
   <p align='center'><!---=====JANGAN LUPA GANTI EMAIL DIBAWAH INI DGN EMAIL ANDA ===========================--->
   Email ini dikirim dari $iden[nama_website] -  <a href='mailto:simri_n@yahoo.com?subject=Order Web' 
   style='color:#FFFFFF;' color='#FFFFFF'>$iden[email]</a></p>
   <p align='center'>Copyright &copy; 2017   .::$iden[nama_website]::. - $iden[meta_deskripsi]</p>
   </td></tr>
   
  </tbody>
  </table>";

  //////////////////////////////////////////////////////////////////////////////////////////////////////

  $subjek=".:: Pemesanan Online $iden[nama_website]";

  // Kirim email dalam format HTML
  $dari = "From:  $iden[email] \n";
  $dari .= "Content-type: text/html \r\n";

  // Kirim email ke kustomer
  mail($_POST[email],$subjek,$pesan,$dari);

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

  else{
  echo " 
  </div><div class='peringatan'><p>Kode yang Anda masukkan tidak cocok!</p>
  <a href=javascript:history.go(-1)><input type='submit' class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>
  </div><br class='clear'/> </div>";}}

  else{
  echo " 
  </div><div class='peringatan'><p>Anda belum memasukan kode!</p>
  <a href=javascript:history.go(-1)><input type='submit' class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>
  </div><br class='clear'/> </div>";}}

  ?> 
  <!--========= AKHIR SIMPAN TRANSAKSI==============================================-->
