 
  <div id="content" class="has-sidebar">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
 

  <!--========= KERANJANG BELANJA =====================================================================-->
  <?php
  $sid = session_id();
  $sql = mysqli_query($koneksi,"SELECT * FROM orders_temp, produk 
  WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysqli_num_rows($sql);
  
  if($ketemu < 1){
  
  echo "<a href='semua-produk.html'>
  <div class='notice-message'>Keranjang Belanja Anda masih kosong. Silahkan Anda berbelanja terlebih dahulu.</div>"; }


  else{  
  echo "
  <div class='box box-common'>
  <h3 class='heading-title'>Keranjang Belanja</h3>
  <div class='cart-info'>
  
  <form method=post action=aksi.php?module=keranjang&act=update>
  <div class='margintable'>
  
  <table>
  <thead>
  <tr>
  <td>Produk</td>       
  <td>Nama Produk</td>
  <td>Berat/Kg</td>  
  <td>Quantity</td>       
  <td>Harga</td>       
  <td>Sub Total</td>       
  <td>Hapus</td>       
  </tr>
  </thead>
  <tbody>";
  
					
  $no=1;
  while($r=mysqli_fetch_array($sql)){
  $disc        = ($r[diskon]/100)*$r[harga];
  $hargadisc   = number_format(($r[harga]-$disc),0,",",".");
  $subtotal    = ($r[harga]-$disc) * $r[jumlah];
  $total       = $total + $subtotal;  
  $subtotal_rp =  number_format(($subtotal),0,",",".");
  $total_rp    =  number_format(($total),0,",",".");
  $harga       =  number_format(($r[harga]),0,",",".");
	
  echo "
  <tr>
  <input type=hidden name=id[$no] value=$r[id_orders_temp]>
  
  <td class='gallery clearfix'>
  <a href='img_produk/$r[gambar]'  rel='prettyPhoto' title='$r[nama_produk]<br/>
  <span class style=\"color:#DD430E;font-size:13px;\">Rp. $hargadisc'>
  <img width=50 src='img_produk/small_$r[gambar]' title='klik untuk memperbesar gambar'></a>
  </td>
  
  <td><center>$r[nama_produk]</center></td>
  <td><center>$r[berat]</center></td>

  <td><select name='jml[$no]' value=$r[jumlah] onChange='this.form.submit()'>";
  for ($j=1;$j <= $r[stok];$j++){
  if($j == $r[jumlah]){
  echo "<option selected>$j</option>";}
  else{
  echo "<option>$j</option>";}}
  echo"</select></td>
 
  <td>$hargadisc</td>
  <td>$subtotal_rp</td>
  <td><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'>
  <center><img src=$f[folder]/images/hapus_barang.png border='0'/></center></a></td>
  </tr>";
  
  $no++; } 
  
  echo"
  </tbody>
  </table>
  <div class='cart-total'>
 		  
  <table>
  <tbody>
			
  <tr>
  <td class='right numbers_total'>Total Harga:</td>
  <td class='right numbers_total'>Rp. $total_rp</td>
  </tr>
  </tbody>
  </table>
  </div>
					
  <div class='buttons'>
 
  <div class='left'>
  <a href='javascript:history.go(-1)'><input type='button' class='button' value='Lanjutkan Belanja'/></a>
  </div>
						
  <div class='right'>
  <a href='selesai-belanja.html'><input type='button' class='button'  value='Selesai Belanja'/></a>
  </div>
  </div>";
  
  echo "<div class='catatan'><span class='text-orange'>&#9658;</span> 
  Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat
  <blink><b>Selesai Belanja</b></blink></div><br/>";
  
  echo "<br/></div>
  <br class='clear'/></div></div>"; }
  ?> 
  <!--========= AKHIR KERANJANG BELANJA =====================================================================-->



  </div></div>