 
  <?php
  
  $beranda = mysqli_query($koneksi,"SELECT link FROM menu WHERE id_menu='7'");
  $b       = mysqli_fetch_array($beranda);
  
  if($_GET['module']=='home'){
  echo "<li><a href='$b[link]'>Home</a></li>";}
  
  elseif($_GET['module']=='profilkami'){
  echo "<a href='$b[link]'>Home</a> | Our Profile";}
	
  elseif($_GET['module']=='carabeli'){
  echo "<a href='$b[link]'>Home</a> | How To Buy";}
  
  elseif($_GET['module']=='diskon'){
  echo "<a href='$b[link]'>Home</a> | Discounted Product";}
  
  
  elseif($_GET['module']=='semuaproduk'){
  echo "<a href='$b[link]'>Home</a> | Product Collection";}
  

  elseif($_GET['module']=='semuadownload'){
  echo "<a href='$b[link]'>Home</a> | Download Katalog";}
  

  elseif($_GET['module']=='testimoniaksi'){
  echo "<a href='$b[link]'>Home</a> | Customer Testimony";}

  elseif($_GET['module']=='testimoni'){
  echo "<a href='$b[link]'>Home</a> | Customer Testimony";}



  elseif($_GET['module']=='keranjangbelanja'){
  echo "<a href='$b[link]'>Home</a> | Shopping Cart";}
  
  elseif($_GET['module']=='hubungikami'){
  echo "<a href='$b[link]'>Home</a> | Contact Us";}
  
  
  elseif($_GET['module']=='hubungiaksi'){
  echo "<a href='$b[link]'>Home</a> | Contact Us";}


  elseif($_GET['module']=='hasilcari'){
  echo "<a href='$b[link]'>Home</a> | Search Result";}

  elseif($_GET['module']=='selesaibelanja'){
  echo "<a href='$b[link]'>Home</a> | Customer Data";}

  elseif($_GET['module']=='simpantransaksi'){
  echo "<a href='$b[link]'>Home</a> | Check Out";}


  elseif($_GET['module']=='halamanstatis'){
  $detail=mysqli_query("SELECT * FROM halamanstatis,users WHERE judul_seo='$_GET[judul]'");
  $d   = mysqli_fetch_array($detail);
  echo "<a href='$b[link]'>Home</a> | $d[judul]";}
  
  
  elseif($_GET['module']=='login'){
  echo "<a href='$b[link]'>Home</a> | Customer Login ";}
  

  elseif($_GET['module']=='daftar'){
  echo "<a href='$b[link]'>Home</a> | Customer Registration";}

  elseif($_GET['module']=='lupapassword'){
  echo "<a href='$b[link]'>Home</a> | New Password Request";}

  elseif($_GET['module']=='kirimpassword'){
  echo "<a href='$b[link]'>Home</a> | New Password Request";}



  //PRODUK ///////////////////////////////////////////////////////////////////////////////////
  elseif($_GET['module']=='detailproduk'){
  $detail	=mysqli_query($koneksi,"SELECT * FROM produk,kategori WHERE kategori.id_kategori=produk.id_kategori AND id_produk='$_GET[id]'");
  $d		= mysqli_fetch_array($detail);
  
  echo "<a href='$b[link]'>Home</a> | 
  <a href=kategori-$d[id_kategori]-$d[kategori_seo].html>$d[nama_kategori]</a> | $d[nama_produk]";}
  
  elseif($_GET['module']=='detailkategori'){
  $detail	=mysqli_query($koneksi,"SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $d		= mysqli_fetch_array($detail);
  echo "<a href='$b[link]'>Home</a> | $d[nama_kategori]";}


  //BLOG ///////////////////////////////////////////////////////////////////////////////////
  elseif($_GET['module']=='detailblog'){
  $detail	=mysqli_query($koneksi,"SELECT * FROM blog,kategoriblog    
  WHERE kategoriblog.id_kategoriblog=blog.id_kategoriblog AND id_blog='$_GET[id]'");
  $d		= mysqli_fetch_array($detail);
  
  echo "<a href='$b[link]'>Home</a> | 
  <a href=kategoriblog-$d[id_kategoriblog]-$d[kategoriblog_seo].html>$d[nama_kategoriblog]</a> | $d[judul]";}


  elseif($_GET['module']=='detailkategoriblog'){
  $detail	=mysqli_query($koneksi,"SELECT nama_kategoriblog from kategoriblog where id_kategoriblog='$_GET[id]'");
  $d		= mysqli_fetch_array($detail);
  echo "<a href='$b[link]'>Home</a> | $d[nama_kategoriblog]";}

  elseif($_GET['module']=='tag'){
  $detail	=mysqli_query($koneksi,"SELECT * FROM tag WHERE id_tag=".abs((int)$_GET[idtag])."");
  $d		= mysqli_fetch_array($detail);
  echo "<a href='$b[link]'>Home</a> | Tag: $d[nama_tag]";}

  elseif($_GET['module']=='semuablog'){
  echo "<a href='$b[link]'>Home</a> | Blog";}

  ?>
