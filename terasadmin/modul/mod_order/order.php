<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){  
 
  echo "
  <link href='../../css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  <body class='special-page'>
  <div id='container'>
  
  <section id='error-number'>
  <center><div class='gembok'><img src='../../img/lock.png'></div></center>
  <h1>AKSES ILEGAL</h1>
  <p class='maaf'>Untuk mengakses modul, Anda harus login dahulu!</p><br/>
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href=../../index.php><b>LOGIN DISINI</b></a></p>
  </section>
  </div>";}
  
  
  else{
  //cek hak akses user
  $cek=user_akses($_GET[module],$_SESSION[sessid]);
  if($cek==1 OR $_SESSION[leveluser]=='admin'){


  $base_url = $_SERVER['HTTP_HOST'];
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));


  $aksi="modul/mod_order/aksi_order.php";
  switch($_GET[act]){
 
  
  default:
  
  
  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Order.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Order.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Order.
  </div>";}
  
   
  echo "
  <div class='workplace'>
  <form action='$aksi?module=order&act=hapussemua' method='post'>

   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>ORDER MASUK</h1>    
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
  
                             
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>";
  
  
		  
  echo " 
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Nama Konsumen</th>
  <th>Tgl. Order</th>
  <th>Jam</th>
  <th>Pembayaran</th>
  <th>Status</th>
  <th><center>Baca</center></th>

  </tr>
  </thead>";
  
  

  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

   if ($_SESSION[leveluser]=='admin'){
   $tampil=mysqli_query($koneksi,"SELECT * FROM orders o,kustomer k WHERE o.id_kustomer=k.id_kustomer      
   ORDER BY id_orders DESC");}
						   
   else{
   $tampil=mysqli_query($koneksi,"SELECT * FROM orders o,kustomer k WHERE o.id_kustomer=k.id_kustomer      
   ORDER BY orders DESC");}  
  
  
   while($r=mysqli_fetch_array($tampil)){
   $tanggal=tgl_indo($r[tgl_order]);
   if($r[status_order]=='Baru'){
	 
  echo"
  <tr>
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_orders]'></center></td>
  <td><b>$r[id_kustomer]</b></td>
  <td><b>$tanggal</b></td>
  <td><b>$r[jam_order]</b></td>
  <td><b>$r[pembayaran]</td>
  <td><b>$r[status_order]</b></td>
  <td width='8%'>
  <a href=?module=order&act=detailorder&id=$r[id_orders]>
  <center><img src='img/edit.png' class='tt' title='Lihat Order'></center></a>
  </td>
  </tr>";}
  
   
  else {	
  echo"
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_orders]'></center></td>
  <td>$r[id_kustomer]</td>
  <td>$tanggal</td>
  <td>$r[jam_order]</td>
  <td>$r[pembayaran]</td>
  <td>$r[status_order]</td>
  <td width='8%'>
  <a href=?module=order&act=detailorder&id=$r[id_orders]>
  <center><img src='img/edit.png' class='tt' title='Lihat Order'></center></a>
  </td>
  </tr>";}
		
					
					
  $no++;}
   
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";


  $jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM orders"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

  break;
  //DETAIL ORDER////////////////////////////////////////////////////////////////////////////////////////////////////////
  case "detailorder":
  $edit = mysqli_query($koneksi,"SELECT * FROM orders, kustomer WHERE kustomer.id_kustomer=orders.id_kustomer AND id_orders='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);
  $tanggal=tgl_indo($r[tgl_order]);

  $pilihan_status = array('Baru', 'Lunas', 'Dikirim');
  $pilihan_order = '';
  foreach ($pilihan_status as $status) {
  $pilihan_order .= "<option value=$status";
  if ($status == $r[status_order]) {
  $pilihan_order .= " selected";}
  $pilihan_order .= ">$status</option>\r\n";}

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Detail Order</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>      	
  <form method=POST action=$aksi?module=order&act=update>
  <input type=hidden name=id value=$r[id_orders]>
  
  
  <div class='row-form'>
  <div class='span3'>No. Order:</div>
  <div class='span9'>$r[id_orders]</div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'>Waktu Order:</div>
  <div class='span9'>$tanggal & $r[jam_order]</div>
  <div class='clear'></div>
  </div>    
  
  <div class='row-form'>
  <div class='span3'>Pembayaran</div>
  <div class='span9'><b>:</b> $r[pembayaran]</div>
  <div class='clear'></div>
  </div>   
  
  
  <div class='row-form'>
  <div class='span3'>Status Order:</div>
  <div class='span7'><select name=status_order>$pilihan_order</select> 
  <div class='zal1'><input type=submit  class='btn' style='width: 120px;' value='Ubah Status'></form></div></div>
  <div class='clear'></div>
  </div>";

  $sql2=mysqli_query($koneksi,"SELECT * FROM orders_detail, produk 
  WHERE orders_detail.id_produk=produk.id_produk 
  AND orders_detail.id_orders='$_GET[id]'");
  
  
  echo "
  <br/> 
  <table id='table' class='sOrders' style='width:96%; margin-left:15px;border-left:solid 1px #eee;border-right:solid 1px #eee;'>
  <tr>
  <th>Nama Produk</th>
  <th><center>Berat/kg</center></th>
  <th><center>Jumlah</center></th>
  <th><center>Harga Satuan</center></th>
  <th><center>Sub Total</center></th>
  </tr>";

  
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
   <td><center>$s[berat]</center></td>
   <td><center>$s[jumlah]</center></td>
   <td><center>$harga</center></td>
   <td><center>$subtotal_rp</center></td>
   </td></tr>
   ";}
   
   
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



  echo "</table>
  <table id='table' class='sOrders' style='width:96%; margin-left:15px;border-left:solid 1px #eee;border-right:solid 1px #eee;'>
  <tr>
  <th>Biaya-biaya</th>
  <tr>
  </table>
  
  <table id='table' class='sOrders' style='width:96%; margin-left:15px;border-left:solid 1px #eee;border-right:solid 1px #eee;'>
  <tr><td colspan=4 align=right>Total              Rp. : </td><td align=right><b>$total_rp</b></tr>
  <tr><td colspan=4 align=right>Ongkos Kirim       Rp. : </td><td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
  <tr><td colspan=4 align=right>Total Berat            : </td><td align=right><b>$totalberat</b> Kg</td></tr>      
  <tr><td colspan=4 align=right>Total Ongkos Kirim Rp. : </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
  <tr><td colspan=4 align=right>Grand Total        Rp. : </td><td align=right><b>$grandtotal_rp</b></td></tr>
  </table>";


  // tampilkan data kustomer
  echo "  
  <table id='table' class='sOrders' style='width:96%; margin-left:15px;border-left:solid 1px #eee;border-right:solid 1px #eee;'>
  <tr>
  <th>Data Kustomer</th>
  <tr>
  </table> 
  
  <table id='table' class='sOrders' style='width:96%; margin-left:15px;border-left:solid 1px #eee;border-right:solid 1px #eee;'>
  <tr><td>Nama Pembeli</td><td>$r[nama_lengkap]</td></tr>
  <tr><td>Alamat Pengiriman</td><td>$r[alamat]</td></tr>
  <tr><td>No. Telpon/HP</td><td>$r[no_telp]</td></tr>
  <tr><td>Email</td><td>$r[email]</td></tr>
  <tr></tr>
  </table>";


  case "kiriminvoice":        
  //KIRIM INVOICE////////////////////////////////////////////////////////////////////////////////////////////////////////////

  echo " 
  <br/>
  <div class='head'>
  <h1>Kirim Faktur Pembelian</h1>
  <div class='clear'></div>
  </div>
					
  <form method=POST action='?module=order&act=kirimemail'>
		  
  <div class='row-form'>
  <div class='span3'>Kepada</div>
  <div class='span9'><input type=text name='email'  value='$r[email]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Subjek</div>
  <div class='span9'><input type=text name='subjek' value='Faktur Pembelian $iden[nama_website]'></div>
  <div class='clear'></div>
  </div>    
   
   
  <div class='row-form'>
  <div class='span3'>Pesan</div>
  <div class='span9'><textarea name='pesan' id='teraskreasi' style='width:96%; height: 500px;'>
   
  <br/>
  <hr/>
  <b>Faktur Pembelian $iden[nama_website]</b></td>
  <hr/>

  
  <br/> <b>Yth: $r[nama_lengkap]<br/>
  di $r[alamat]. ($r[no_telp])
  
  <hr/>

  <p>Kami telah menerima pembayaran order dengan No. Order $r[id_orders],
  sebesar <b>Rp. $grandtotal_rp</b></p>
  <p>Dengan ini, Kami sampaikan pula bahwa pesanan Anda telah kami kirim ke alamat: <b>$r[alamat]</b></p>
  <p>Terima kasih telah belanja di $iden[nama_website].</p>
  <p>Salam kami,</p>
  <p><b>$iden[nama_website]<b/></p>   
   
  <hr/>

  <p>Email ini dikirim dari $iden[nama_website] -  <a href='mailto:rizal_fzl@yahoo.com?subject=Order Web'>$iden[email]</a></p>
  <p>Copyright &copy; $iden[nama_website] - $iden[meta_deskripsi]</p>
  
  <hr/><br/><br/>

  
  </textarea></div>
  <div class='clear'></div>
  </div>    
  
	  
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=order'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Kirim Email' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
	  		  
  break;
  //STATUS EMAIL////////////////////////////////////////////////////////////////////////////////////// 
  case "kirimemail":
  $dari = "From: $iden[nama_website] <".$iden[email].">\n" . 
  "MIME-Version: 1.0\n" . 
  "Content-type: text/html; charset=iso-8859-1";

  mail($_POST[email],$_POST[subjek],$_POST[pesan],$dari);
	
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Status Email</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'> 
     
  <div class='row-form'>
  <h5>Email telah sukses terkirim ke tujuan.</h5>
  </div> 
  
  
  <div class='row-form'>
  <a class='btn' id=reset-validate-form href='?module=order'>Kembali</a>
  </div>

  </form>
  </div></div></div>";
  
  
  
   break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   }
   ?>

  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>