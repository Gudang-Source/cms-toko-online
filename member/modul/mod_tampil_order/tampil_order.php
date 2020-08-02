<?php
//Mencegah direct akses
$pathfile='../config/authentication_kustomer.php';
if (!file_exists($pathfile)){
	//echo"<meta http-equiv='refresh' content='0;url=www.domainanda.com/index.php'>";
	include "index.php";}

  $aksi="modul/mod_tampil_order/aksi_tampil_order.php";
  session_start();
  $user=$_SESSION[namauser];
  
  switch($_GET[act]){
  default:
	
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Kustomer.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Kustomer.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Kustomer.
  </div>";}
	

  echo "  
  <div class='workplace'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>Order Anda</h1>   
  
                              
  <div class='clear'></div>
  </div>
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>

  <thead>
  <tr>
  <th><center>No. Order</center></th>
  <th>Tgl. Order</th>
  <th>Jam</th>
  <th>Pembayaran</th>
  <th>Status</th>
  <th>Aksi</th>
  </tr>
  </thead>";

  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $tampil = mysqli_query($koneksi,"SELECT * FROM orders WHERE id_kustomer='$user' ORDER BY id_orders DESC LIMIT $posisi,$batas");
	
  $no=1;
  while($r=mysqli_fetch_array($tampil)){
  if ($r[status_order] == 'Dikirim'){
  $status='Tuntas';}
  elseif($r[status_order] == 'Lunas'){
  $status='Pembayaran Lunas';}
  elseif($r[status_order] == 'Baru' AND $r[pembayaran]==''){
  $status='Segera Lakukan Pembayaran';}
  elseif($r[status_order] == 'Baru' AND $r[pembayaran]!=''){
  $status='Pembayaran Sedang dikonfirmasi';}
  else{
  $status='';}
  $tanggal=tgl_indo($r[tgl_order]);
  if ($no % 2 == 0){
  $warna = $warnaGenap;}
  else{
  $warna = $warnaGanjil;}
		
  echo "
  <tr> 	  
  <td><center><b>$r[id_orders]</b></center></td>
  <td>$tanggal</td>
  <td>$r[jam_order] Wib</td>
  <td>$r[pembayaran]</td>
  <td><blink>$status</blink></td>
  
  <td width='8%'>
  <a href=?module=tampilorder&act=detailorder&id=$r[id_orders]>
  <center><img src='images/edit.png' class='tt' title='Baca Order'></center></a>
  </td>  
  
  
  </tr>";
 
  $no++;}

  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";
  

  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM orders WHERE id_kustomer='$user'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);


  break;
  //DETAIL ORDER/////////////////////////////////////////////////////////////////////////////////////////
  case "detailorder":
  $edit = mysqli_query($koneksi,"SELECT * FROM orders, kustomer WHERE kustomer.id_kustomer=orders.id_kustomer 
  AND id_orders='$_GET[id]' AND orders.id_kustomer='$user' ");
  $r    = mysqli_fetch_array($edit);
  $tanggal=tgl_indo($r[tgl_order]);
	
  if ($r[status_order] == 'Dikirim'){
  $status='Tuntas';}
  elseif($r[status_order] == 'Lunas'){
  $status='Pembayaran Lunas';}
  elseif($r[status_order] == 'Baru' AND $r[pembayaran]==''){
  $status='Segera Lakukan Pembayaran';}
  elseif($r[status_order] == 'Baru' AND $r[pembayaran]!=''){
  $status='Pembayaran Sedang dikonfirmasi';}
  else{
  $status='';}
	
	
  if ($r[status_order]=='Baru'){
  echo"
  
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Detail Order </h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>  
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form 
  href=?module=tampilorder&act=konfirmasi&id=$r[id_orders]>KONFIRMASI PEMBAYARAN DI SINI</a>
  </div>";}
	
  echo "
  <table cellpadding='0' cellspacing='0' width='100%' class='table'>
  <thead>
  <tr>
  <th><center>No. Order</center></th>
  <th>Tgl. Order</th>
  <th>Jam</th>
  <th>Pembayaran</th>
  <th>Status</th>
  </tr>
  </thead>

  <tr> 	  
  <td><center><b>$r[id_orders]</b></center></td>
  <td>$tanggal</td>
  <td>$r[jam_order]</td>
  <td>$r[pembayaran]</td>
  <td>$status</td>
  </tr>
  </table>";

  if ($r[shipping]== 'akun'){
  
  echo"
  <div class='head'>
  <h1>Alamat Pengiriman</h1>
  <div class='clear'></div>
  </div>
	
  <div class='row-form'>
  <div class='span3'>Dikirim ke</div>
  <div class='span9'>: $r[alamat]</div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Kode Pos</div>
  <div class='span9'>: $r[kode_pos]</div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Propinsi</div>
  <div class='span9'>: $r[propinsi]</div>
  <div class='clear'></div>
  </div>    
	
  <div class='row-form'>
  <div class='span3'>Kota</div>
  <div class='span9'>: $r[kota]</div>
  <div class='clear'></div>
  </div>";
  
  $kota=$r[kota];}
  
  
  else{
  echo"
  <div class='head'>
  <h1>Alamat Pengiriman</h1>
  <div class='clear'></div>
  </div>
		
  <div class='row-form'>
  <div class='span3'>Dikirim ke</div>
  <div class='span9'>: $r[alamat_kirim]</div>
  <div class='clear'></div>
  </div>    

  <div class='row-form'>
  <div class='span3'>Kode Pos</div>
  <div class='span9'>: $r[kode_pos_kirim]</div>
  <div class='clear'></div>
  </div>    

  <div class='row-form'>
  <div class='span3'>Propinsi</div>
  <div class='span9'>: $r[propinsi_kirim]</div>
  <div class='clear'></div>
  </div>    
		
  <div class='row-form'>
  <div class='span3'>Kota</div>
  <div class='span9'>: $r[kota_kirim]</div>
  <div class='clear'></div>
  </div>";
  
  $kota=$r[kota_kirim];}
  
  $sql2=mysqli_query($koneksi,"SELECT * FROM orders_detail, produk 
  WHERE orders_detail.id_produk=produk.id_produk 
  AND orders_detail.id_orders='$r[id_orders]'");
  
  echo"<div class='head'>
  <h1>Rincian Order Anda</h1>
  <div class='clear'></div>
  </div>";
	
  echo "
  <table cellpadding='0' cellspacing='0' width='100%' class='table'>
  <thead>
  <tr>
  <th>Nama Produk</th>
  <th>Jumlah</th>
  <th>Harga Satuan</th>
  <th>Sub Total</th>
  </tr>
  </thead>";
  
  while($s=mysqli_fetch_array($sql2)){
  
  // rumus untuk menghitung subtotal dan total		
  $disc        = ($s[diskon]/100)*$s[harga];
  $hargadisc   = number_format(($s[harga]-$disc),0,",","."); 
  $subtotal    = ($s[harga]-$disc) * $s[jumlah];

  $total       = $total + $subtotal;
  $subtotal_rp =  number_format(($subtotal),0,",",".");
  $total_rp    =  number_format(($total),0,",",".");
  $harga       =  number_format(($s[harga]),0,",",".");

  $subtotalberat = $s[berat] * $s[jumlah]; // total berat per item produk 
  $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli
 

  echo "
  <tr>
  <td>
  <span class='tt' title='Lihat Produk'><b>
  <a class='fancybox' rel='group' href='../img_produk/$s[gambar]'>$s[nama_produk]</a></b></span></td>
  <td>$s[jumlah]</td>
  <td>Rp. $harga</td>
  <td>Rp. $subtotal_rp
  </td>
  </tr>";}
	
  $sql3=mysqli_query($koneksi,"SELECT * FROM orders, kustomer WHERE kustomer.id_kustomer=orders.id_kustomer AND id_orders='$_GET[id]'");
  $r=mysqli_fetch_array($sql3);
  //Informasi Pengiriman
  if ($r[shipping] == 'akun'){
  $kota		= $r[kota];}
  else{
  $kota		= $r[kota_kirim];}
		
  $ongkos=mysqli_fetch_array(mysqli_query($koneksi,"SELECT ongkos_kirim FROM kota WHERE nama_kota='$kota'"));
  $ongkoskirim1=$ongkos[ongkos_kirim];
  $ongkoskirim=$ongkoskirim1 * $totalberat;

  $grandtotal    = $total + $ongkoskirim; 
  $ongkoskirim_rp =  number_format(($ongkoskirim),0,",",".");
  $ongkoskirim1_rp =  number_format(($ongkoskirim1),0,",",".");
  $grandtotal_rp  = number_format(($grandtotal),0,",",".");
			
  echo "
  <tr>
  <td colspan=3 align=right>Total</td><td align=right>Rp. <b>$total_rp</b></td></tr>
  <td colspan=3 align=right>Total Berat</td><td align=right><b>$totalberat</b> Kg</td></tr>
  
  <tr><td colspan=3 align=right>Ongkos Kirim</td><td align=right>Rp. <b>$ongkoskirim_rp</b></td></tr>
  <tr bgcolor=#D1CEF4><td colspan=3 align=right>Total Keseluruhan</td><td align=right>Rp. <b>$grandtotal_rp</b></td></tr>
  
  </table>
  <div class='clear'></div>
  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=tampilorder'>Kembali</a>
  
  </div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";  
  
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  
  break;  
  //konfrimasi pembayaran///////////////////////////////////////////////////////////////////////
  case "konfirmasi";
  //tampilkan order
  $sql=mysqli_query($koneksi,"SELECT * FROM orders WHERE id_orders='$_GET[id]'");
  $r=mysqli_fetch_array($sql);
  
  //mencegah melakukan konfirmasi ulang pada saat status order Lunas atau Dikirim
  if ($r[status_order]=='Lunas' OR $r[status_order]=='Dikirim'){
  echo"<script>document.location.href='javascript:history.go(-1)'</script>";
  exit;}
   
  // tampilkan rincian harga produk yang di order
  $sql2=mysqli_query($koneksi,"SELECT * FROM orders_detail, produk 
  WHERE orders_detail.id_produk=produk.id_produk 
  AND orders_detail.id_orders='$_GET[id]'");
  
  while($s=mysqli_fetch_array($sql2)){
  
  // rumus untuk menghitung subtotal dan total		
  $disc        = ($s[diskon]/100)*$s[harga];
  $hargadisc   = number_format(($s[harga]-$disc),0,",","."); 
  $subtotal    = ($s[harga]-$disc) * $s[jumlah];

  $total       = $total + $subtotal;
  $subtotal_rp =  number_format(($subtotal),0,",",".");
  $total_rp    =  number_format(($total),0,",",".");
  $harga       =  number_format(($s[harga]),0,",",".");

  $subtotalberat = $s[berat] * $s[jumlah]; // total berat per item produk 
  $totalberat  = $totalberat + $subtotalberat; }
	
  //Tampil kota kustomer
  $sql3=mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer='$r[id_kustomer]'");
  $r3=mysqli_fetch_array($sql3);
  //Informasi Pengiriman
  if ($r[shipping] == 'akun'){
  $kota		= $r3[kota];}
  
  else{
  $kota		= $r[kota_kirim];}
			
  //Menghitung Biaya Pengiriman
  $ongkos=mysqli_fetch_array(mysqli_query($koneksi,"SELECT ongkos_kirim FROM kota WHERE nama_kota='$kota'"));
  $ongkoskirim1=$ongkos[ongkos_kirim];
  $ongkoskirim=$ongkoskirim1 * $totalberat;

  $grandtotal    = $total + $ongkoskirim; 
  $ongkoskirim_rp =  number_format(($ongkoskirim),0,",",".");
  $ongkoskirim1_rp =  number_format(($ongkoskirim1),0,",",".");
  $grandtotal_rp  = number_format(($grandtotal),0,",",".");
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  
  //mengisi combobox
  $pilihan_transfer = array($iden[rekening],);
  $transfer = '';
  foreach ($pilihan_transfer as $status) {
  $transfer .= "<option value=$status>$status</option>\r\n";}
  
  echo"
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Konfirmasi Pembayaran</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>            	
  <form method=POST action='$aksi?module=konfirmasi&act=update' class=form>
		 
  <div class='row-form'>
  <div class='span3'>No Order</div>
  <div class='span9'>$_GET[id]</div>
  <input type=hidden name=noorder value='$_GET[id]'>
  <div class='clear'></div>
  </div>    
		 
		 
  <div class='row-form'>
  <div class='span3'>Tgl Pembayaran</div>
  <div class='span9'><input type=text name=tglbayar></div>
  <div class='clear'></div>
  </div>    
		 
  <div class='row-form'>
  <div class='span3'>Pembayaran Ke</div>
  <div class='span9'><select name=rekeningtujuan>$transfer</select></div>
  <div class='clear'></div>
  </div>    
		 
  <div class='row-form'>
  <div class='span3'>Total Biaya</div>
  <div class='span9'><input type=text name=besarbayar value='Rp. $grandtotal_rp'></div>
  <div class='clear'></div>
  </div>    
		 
  <div class='row-form'>
  <div class='span3'>Bank Transfer</div>
  <div class='span9'><input type=text name=namabank></div>
  <div class='clear'></div>
  </div>    
		 
  <div class='row-form'>
  <div class='span3'>No. Rekening</div>
  <div class='span9'><input type=text name=norekening></div>
  <div class='clear'></div>
  </div>    
		 
  <div class='row-form'>
  <div class='span3'>Atas Nama</div>
  <div class='span9'><input type=text name=nama></div>
  <div class='clear'></div>
  </div>
  
	
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=tampilorder'>Batalkan</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Kirim Konfirmasi' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";	
	
	
  break;}

  ?>
