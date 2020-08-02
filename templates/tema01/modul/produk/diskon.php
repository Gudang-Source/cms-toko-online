	
  <div id="content">
  <div class="inner"> 

	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  




  <!--========= BANNER KATEGORI ========================-->  
  <h1 class='cat_big_title'>
  <img src='img_header/header_diskon.jpg'/>
  <span class style=\"color:#FFF;\">Produk Diskon</span>
  </h1>
  <!--========= AKHIR BANNER KATEGORI ========================-->  





  <!--========= PRODUK DISKON  ========================-->  
  <?php		

  echo " <div class='share3'> 
  </div><br/>";


  $p      = new Diskon;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  
  $sql=mysqli_query($koneksi,"SELECT * FROM produk  WHERE headline='Y' AND diskon ORDER BY id_produk DESC LIMIT $posisi,$batas");
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
  Detail Produk</a>     
  
  <a href='img_produk/$r[gambar]'  rel='prettyPhoto'  
  title='$r[nama_produk]<br/><span class style=\"color:#DD430E;font-size:13px;\">Rp. $hargadisc' class='go_to_prod_link'>
  Detail Produk</a>
  </div>  
  <div class='price_hold'>
  $divharga
  </div>
  $tombol
  </div></div>";}
						
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM produk  WHERE headline='Y' AND diskon ORDER BY id_produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldiskon], $jmlhalaman);
				  
  echo "
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div>";
					
  ?>
  <!--========= AKHIR PRODUK DISKON ========================-->  

		  
  </div></div>