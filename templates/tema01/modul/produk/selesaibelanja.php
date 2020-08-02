 
  <div id="content" class="has-sidebar">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  

  <!--========= BANNER KATEGORI ========================-->  
  <h1 class='cat_big_title'>
  <img src='img_header/header_diskon.jpg'/>
  <span class style=\"color:#FFF;\">Data Akun</span>
  </h1>
  <!--========= AKHIR BANNER KATEGORI ========================-->  



  <!--========= SELESAI BELANJA =====================================================================-->
  <?php
  echo "
  <div class='box box-common'>";
  $sid = session_id();
  $sql=mysqli_query($koneksi,"SELECT COUNT(*) AS jmlh FROM orders_temp WHERE id_session = '$sid'");
  $r=mysqli_fetch_array($sql);
  
  if ($r[jmlh] < 1){
  echo"<script>alert('Pilih produk terlebih dahulu untuk dipesan.')</script>";
  echo"<script>document.location.href='index.php';</script>";}
  
  
  
  //KONDISI LOGIN///////////////////////////////////////////////////////////////////////
  
  else{
  if ($_SESSION[leveluser] == 'kustomer'){
  
  //Tampil Form Pengiriman/////////////////////////////////////////////////////////////////
  
  $sql=mysqli_query($koneksi,"SELECT id_kustomer, nama_lengkap,alamat,kode_pos,propinsi,kota,email,no_telp 
  FROM kustomer WHERE id_kustomer = '$_SESSION[namauser]'");
  $r=mysqli_fetch_array($sql);
	  
  echo"
  <h5>Data Akun Anda sebagai berikut:</h5>
  <table>
  <tr><td width='120px'><b>Username Anda</b> </td><td>: $r[id_kustomer]</td></tr>
  <tr><td><b>Nama Anda</b> </td><td>: $r[nama_lengkap] </td></tr>
  <tr><td><b>Alamat Anda</b></td><td>: $r[alamat] </td></tr>
  <tr><td><b>Kode Pos</b></td><td>: $r[kode_pos]</td></tr>
  <tr><td><b>Propinsi</b></td><td>: $r[propinsi]</td></tr>
  <tr><td><b>Kota</b></td><td>: $r[kota]</td></tr>
  <tr><td><b>Email</b></td><td>: $r[email]</td></tr>
  <tr><td><b>No Tlp/HP</b></td><td>: $r[no_telp]</td></tr>
  </table><br/>
  <p><span class='text-orange'>
  &#8226; Barang yang dipesan akan dikirim sesuai alamat yang tertera diatas, <br/>setelah anda melakukan konfirmasi pembayaran.</p>
  <br/>
  <blink><input type=button class='button' value='SELESAIKAN BELANJA ANDA' 
  onclick=\"window.location.href='aksi.php?act=simpantransaksi';\"></blink>
  </form>
  </div>";}
  
  
  //KONDISI BELUM LOGIN/////////////////////////////////////////////////////////
  
  else {
  
  echo"
  <h5>Bila anda kustomer lama dan sudah mempunyai akun, silahkan <span class='text-orange'>login</span> dibawah ini:</h5>
  <div class='content'>
  <form method=post action='member/cek_login.php?lf=selesaibelanja'>
  
  <table>
  <tr>
  <td>
  <div class='content'> <span>Username:</span><br/>	
  <input required type=text name=username size='100%'>
  </div>				
  </td>	
  <tr/>	
 
  <tr>
  <td>
  <div class='content'> <span>Password:</span><br/>			
  <input required type=password name=password size='100%'>
  </div>	
  </td>	
  <tr/>	
  			
  <tr>
  <td>
  <input type=submit value='LOGIN' class='tombol'>
  <br/><br/><p><a href='lupa-password.html' class='text-orange'>Lupa password?</a></p>			
  </td>
  <tr/>	
  </table>
  </form>
  </div>";
		 
  echo"<br/><h5>Bila anda kustomer baru, silahkan <span class='text-orange'>daftar</span> di bawah ini:</h5>
  <form method=post action='aksi.php?act=daftarkustomer&lf=selesaibelanja'>
		  
  <table>
  
  <tr>
  <td><b>Akun Anda</td>
  </tr>
  
  <tr>
  <td>		
  <div class='content'> <span>Username:</span><br/>	
  <input required type=text name=username size='100%'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Password:</span><br/>	
  <input required type=password name=password size='100%'>
  </div>				
  </td>			
  </tr>
			
			
  <tr>
  <td>		
  <div class='content'> <span>Ulangi Password:</span><br/>	
  <input required type=password name=password2 size='100%'>
  </div>				
  </td>			
  </tr>
  </table>	
			
  <table>
  <tr>
  <td><b>Informasi Data & Alamat Anda</td>
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Nama Lengkap:</span><br/>	
  <input required type=text name=nama_lengkap size='100%'>
  </div>				
  </td>			
  </tr>
	
  <tr>
  <td>		
  <div class='content'> <span>Email:</span><br/>	
  <input required type=text name=email size='100%'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Alamat Lengkap:</span><br/>	
  <textarea required name=alamat style='width:100%; height:100px;'></textarea>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Kode Pos:</span><br/>	
  <input required type=text name=kode_pos size='100%'>
  </div>				
  </td>			
  </tr>
	
  <tr>
  <td>		
  <div class='content'> <span>Propinsi:</span><br/>	
  <input required type=text name=propinsi size='100%'>
  </div>				
  </td>			
  </tr>	
			
  <tr>
  <td>		
  <div class='content'> <span>Kota:</span><br/>	
  <select required name='kota'>
  <option value='' selected>- Pilih Kota -</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kota ORDER BY nama_kota");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[nama_kota]>$r[nama_kota]</option>";}
  echo"<option value='lainnya'>- Lainnya -</option></select>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Kota Lainnya:</span><br/>	
  <input type=text name=kotalain size='100%'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>No Telepon/HP:</span><br/>	
  <input required type=text name=no_telp size='100%'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>
  <a href='javascript:history.go(-1)'><input type='button' value='Kembali' class='tombol'/></a>
  <input type=submit value='Daftar Sekarang' class='tombol'></form>
  </td>
  </tr>
    
  </table>
 
  </div>
  <br><br> <br><br>";}}
  
  ?> 
  <!--========= AKHIR SELESAI BELANJA ================================================-->
  
  </div></div>