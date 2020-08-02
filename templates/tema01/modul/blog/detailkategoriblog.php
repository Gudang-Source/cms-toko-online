
 
  <div id="content" class="has-sidebar">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
 
		
  <!--========= KATEGORI BLOG ========================-->  
  <?php
  $sq = mysqli_query($koneksi,"SELECT nama_kategoriblog from kategoriblog where id_kategoriblog='".$val->validasi($_GET['id'],'sql')."'");
  $n = mysqli_fetch_array($sq);
  
  echo " 
  <div id='main' class='fixed box box-common'>
  <h3 class='heading-title'>Category: <span class='text-orange'> $n[nama_kategoriblog]</span></h3>
  <div class='content_holder'>";
    
  $p      = new KategoriBlog;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  
  $sql   = "SELECT * FROM blog WHERE id_kategoriblog='".$val->validasi($_GET['id'],'sql')."'
  ORDER BY id_blog DESC LIMIT $posisi,$batas";		 

  $hasil = mysqli_query($sql);
  $jumlah = mysqli_num_rows($hasil);
  
  if ($jumlah > 0){
  while($r=mysqli_fetch_array($hasil)){
  $tgl = tgl_indo($r[tanggal]);
  $baca = $r[dibaca]+1;
  $tanggalan=explode(' ', $tgl);
  
  $komentar = "SELECT * FROM komentar WHERE id_blog= '".$r['id_blog']."'";
  $zalkomentar = mysqli_query($komentar);
  $total_komentar = mysqli_num_rows($zalkomentar);
	
	
		
  echo "	
  <div class='full_width blog-post'>
  <h3 class='heading-title'><a href=blog-$r[id_blog]-$r[judul_seo].html title='Blog post'>$r[judul]</a></h3>
  <div class='post-date'><span class='num'>$tanggalan[0]</span> $tanggalan[1] $tanggalan[2]</div>
  
  <div class='blog-post-meta'>
  <span class='posted_in'> kategori: <a href='#' title='category name'>$n[nama_kategoriblog]</a> | 
  <span class='posted_by'>Read: $baca pembaca</span> 
  <span class='count_comments'> Comment: $total_komentar</span> 
  </div>";
  
  if ($r['gambar']!=''){
  echo "<a href=blog-$r[id_blog]-$r[judul_seo].html>
  <img src='img_blog/$r[gambar]' width='450'  class='image-align-left2' alt='$r[judul]'/></a>";}
 
  $isi_blog = htmlentities(strip_tags($r[isi_blog])); 
  $isi = substr($isi_blog,0,400); 
  $isi = substr($isi_blog,0,strrpos($isi," ")); 
 
 
  echo "	
  <div class='blog-post-excerpt'>
  <p>$isi ...<a href=blog-$r[id_blog]-$r[judul_seo].html> <span class='text-orange'>(Read More)</span></a></p>
  </div>
  <div class='marg2'><br/>&nbsp;<br/></div>  
  </div>";}
			
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM blog WHERE id_kategoriblog='".$val->validasi($_GET['id'],'sql')."'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategoriblog], $jmlhalaman);
			
  echo "
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div>
  </div>";}
					
  else{
  echo " 
  <h4>There is no product on this category <span class='text-orange'>$n[nama_kategoriblog].</span></h4>
  </div>";}
  ?>
  <!--========= AKHIR KATEGORI BLOG ========================-->  
	            
		
  <!--=========  SIDEBAR ========================-->  
  <?php include "$f[folder]/modul/sidebar/sidebar.php";?>
  <!--========= AKHIR SIDEBAR ========================-->  
  </div>
    
	
  </div>
  </div>
