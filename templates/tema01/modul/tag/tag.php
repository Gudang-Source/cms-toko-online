 
  <div id="content" class="has-sidebar">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  



  <!--=========  TAG ========================-->  
  <?php
  $tags	= mysqli_query($koneksi,"SELECT * FROM tag WHERE id_tag=".abs((int)$_GET[idtag])."");
  $data   = mysqli_fetch_array($tags);
  

  echo " 
  <div id='main' class='fixed box box-common'>
  <h3 class='heading-title'>Tag: <span class='text-orange'> $data[nama_tag]</span></h3>
  <div class='content_holder'>";


  $p      = new Tag;
  $batas  =5;
  $posisi = $p->cariPosisi($batas);
  

  $sql   = "SELECT * FROM blog, tag WHERE blog.tag LIKE '%$data[tag_seo]%' GROUP BY blog.id_blog 
  DESC LIMIT $posisi,$batas";	
  $hasil = mysqli_query($sql);
  $jumlah = mysqli_num_rows($hasil);
	
	
  if ($jumlah > 0){
  while($r=mysqli_fetch_array($hasil)){
  $tgl = tgl_indo($r[tanggal]);
  $tanggalan=explode(' ', $tgl);
  $baca = $r[dibaca]+1;		
  	
  $komentar = "SELECT * FROM komentar WHERE id_blog = '".$r['id_blog']."'";
  $zalkomentar = mysqli_query($komentar);
  $total_komentar = mysqli_num_rows($zalkomentar);
	
  echo "	
  <div class='full_width blog-post'>
  <h3 class='heading-title'><a href=blog-$r[id_blog]-$r[judul_seo].html title='Blog post'>$r[judul]</a></h3>
  <div class='post-date'><span class='num'>$tanggalan[0]</span> $tanggalan[1] $tanggalan[2]</div>
  
  <div class='blog-post-meta'>
  <span class='posted_in'> Tag: <a href='#' title='category name'>$data[nama_tag]</a> | 
  <span class='posted_by'>Dibaca: $baca pembaca</span> 
  <span class='count_comments'> Komentar: $total_komentar</span> 
  </div>";
  
  if ($r['gambar']!=''){
  echo "<a href=blog-$r[id_blog]-$r[judul_seo].html>
  <img src='img_blog/$r[gambar]' width='460' alt='$r[judul]'/></a>";}
 
  $isi_blog = htmlentities(strip_tags($r[isi_blog])); 
  $isi = substr($isi_blog,0,470); 
  $isi = substr($isi_blog,0,strrpos($isi," ")); 
 
 
  echo "	
  <div class='blog-post-excerpt'>
  <p>$isi ...<a href=blog-$r[id_blog]-$r[judul_seo].html> <span class='text-orange'>(selengkapnya)</span></a></p>
  </div>
  </div>";}
	
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM blog,tag WHERE id_tag='".$val->validasi($_GET['id'],'sql')."'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haltag], $jmlhalaman);

  echo "
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div>
  </div>";}
					
  else{
  echo " 
  <h4>Belum ada produk pada Tag <span class='text-orange'>$data[nama_tag].</span></h4>
  </div>";}
  
  ?>
  <!--========= AKHIR TAG ========================-->  


  <!--=========  SIDEBAR ========================-->  
  <?php include "$f[folder]/modul/sidebar/sidebar.php";?>
  <!--========= AKHIR SIDEBAR ========================-->  
  </div>
    
	
  </div>
  </div>