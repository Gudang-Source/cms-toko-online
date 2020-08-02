  <div id="content">
  <div class="inner"> 

	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  


  <!--========= SEMUA PRODUK ========================-->  
  <?php		

  $p      = new SemuaProduk;
  $batas  = 12;
  $posisi = $p->cariPosisi($batas);
  $sql=mysqli_query($koneksi,"SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));  


  echo "
  <div id='main' class='fixed box box-common'>
  <h2 class='heading-title'><span class='text-orange'> Product Collection</span> $iden[nama_website]</h2>";


  while ($r=mysqli_fetch_array($sql)){
  include "$f[folder]/modul/harga/diskon_stok.php";
	
  echo "
  <div class='box-products'> 
  <div class='prod_hold'> 
  <span class='image'> 
  <a href='produk-$r[id_produk]-$r[produk_seo].html'>
  <img src='img_produk/small_$r[gambar]' width=200 height=250 alt='$r[nama_produk]' style=\"border:4px solid #ccc;\"/> </a> 
  </span> 

  <a class='wrap_link' href='produk-$r[id_produk]-$r[produk_seo].html'>
  <span class='name'>$r[nama_produk]</span></a>
  <div class='gallery clearfix'>
  
  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='lihat'>
  Product Detail </a>   
  
  <a href='img_produk/$r[gambar]' rel='prettyPhoto[gallery2]' title='$r[nama_produk]' class='go_to_prod_link'>Product Detail</a>
  </div>  
  
  <div class='price_hold'>
  $divharga
  </div>
  $tombol 
  </div></div>";}
						
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);
				  
  echo "
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div>";
					
  ?>
  <!--========= AKHIR SEMUA PRODUK ========================-->  

  </div>  
  </div></div>