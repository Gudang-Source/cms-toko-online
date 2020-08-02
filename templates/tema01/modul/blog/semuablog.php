
 
  <div id="content" class="has-sidebar">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
 
		
  <!--========= SEMUA BLOG ========================-->  
  <?php
  
  echo " 
  <div id='main' class='fixed box box-common'>
  <div class='content_holder'><br/>";
    
  $p      = new SemuaBlog;
  $batas  =5;
  $posisi = $p->cariPosisi($batas);
  
  $sql=mysqli_query($koneksi,"select count(komentar.id_komentar) as jml, judul, judul_seo, jam, 
  blog.id_blog, hari, tanggal, gambar, isi_blog from blog left join komentar 
  on blog.id_blog=komentar.id_blog group by blog.id_blog DESC LIMIT $posisi,$batas");
  while($r=mysqli_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);
  $tanggalan=explode(' ', $tgl);
  $baca = $r[dibaca]+1;
  
  mysqli_query($koneksi,"UPDATE blog SET dibaca='$baca' where id_blog='".$val->validasi($_GET['id'],'sql')."'");
  
  $komentar = "SELECT * FROM komentar WHERE id_blog= '".$r['id_blog']."'";
  $zalkomentar = mysqli_query($komentar);
  $total_komentar = mysqli_num_rows($zalkomentar);
	
		
  echo "	
  <div class='full_width blog-post'> 
  <h3 class='heading-title'><a href=blog-$r[id_blog]-$r[judul_seo].html title='Blog post'>$r[judul]</a></h3>
  <div class='post-date'><span class='num'>$tanggalan[0]</span> $tanggalan[1] $tanggalan[2]</div>";
  
  if ($r['gambar']!=''){
  echo "<a href=blog-$r[id_blog]-$r[judul_seo].html>
  <span class='komen'><b>$total_komentar</b> comment</span>
  <img src='img_blog/$r[gambar]' width='450'  class='image-align-left2' alt='$r[judul]'/>
  </a>";}
 
  $isi_blog = htmlentities(strip_tags($r[isi_blog])); 
  $isi = substr($isi_blog,0,400); 
  $isi = substr($isi_blog,0,strrpos($isi," ")); 
 
 
  echo "	
  <div class='blog-post-excerpt'>
  <p>$isi ...<a href=blog-$r[id_blog]-$r[judul_seo].html> <span class='text-orange'>(Read More)</span></a></p>
  </div>
  <div class='marg2'><br/>&nbsp;<br/></div>  
  </div>";}
			
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM blog"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halblog], $jmlhalaman);
			
  echo "
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div>
  </div>";
  ?>
  <!--========= AKHIR SEMUA BLOG ========================-->  
	            
		
  <!--=========  SIDEBAR ========================-->  
  <?php include "$f[folder]/modul/sidebar/sidebar.php";?>
  <!--========= AKHIR SIDEBAR ========================-->  
  </div>
    
	
  </div>
  </div>
