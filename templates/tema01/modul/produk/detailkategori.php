	
  <div id="content">
  <div class="inner"> 

	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  




  <!--========= BANNER KATEGORI ========================-->  
  <?php
  $zalban=mysqli_query($koneksi,"SELECT * FROM header WHERE id_kategori='".$val->validasi($_GET['id'],'sql')."'
  ORDER BY id_header");
  $sq = mysqli_query($koneksi,"SELECT nama_kategori from kategori where id_kategori='".$val->validasi($_GET['id'],'sql')."'");
  $n = mysqli_fetch_array($sq);
  $d = mysqli_fetch_array($zalban);
  
  
  if ($d[gambar]!=''){
  echo "
  <h1 class='cat_big_title'>
  <img src='img_header/$d[gambar]'/>
  <span class style=\"color:#FF9900;\">$n[nama_kategori]
  </span>
  </h1>";}
  
  else{	
  echo "
  <h1 class='cat_big_title'>
  <img src='img_header/header_default.jpg'/>
  <span class style=\"color:#FF9900;\">$n[nama_kategori]
  </span>
  </h1>";}
  
  ?>
  <!--========= AKHIR BANNER KATEGORI ========================-->  


  <!--=========  DETAIL KATEGORI ========================-->  
  <?php		
  $p      = new KategoriProduk;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  
  $sql   = "SELECT * FROM produk WHERE id_kategori='".$val->validasi($_GET['id'],'sql')."' 
  ORDER BY id_produk DESC LIMIT $posisi,$batas";		 

  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));  

  echo " <div class='share3'> 
  </div><br/>";


  $hasil = mysqli_query($koneksi, $sql);
  $jumlah = mysqli_num_rows($hasil);
	
  if ($jumlah > 0){
  while($r=mysqli_fetch_array($hasil)){
  
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
  title='$r[nama_produk]<br/><span class style=\"color:#DD430E;font-size:13px;\"><!--Rp. $hargadisc ---->' class='go_to_prod_link'>
  Detail Produk</a>
  </div>  
  
  <div class='price_hold'>
  <center><b>Call</b></center>
  </div>
  $tombol
  </div></div>";}
						
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM produk WHERE id_kategori='".$val->validasi($_GET['id'],'sql')."'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);						
				  
  echo "
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div>";}
					
  else{
  echo " 
  <br/><h4>Belum ada produk pada Kategori <span class='text-orange'>$n[nama_kategori].</span></h4>";
  echo $jumlah;
  }
  ?>
  <!--========= AKHIR DETAIL KATEGORI ========================-->  	  
  </div></div>