  <div class="sidebar">
				
  <!--=========  KATEGORI BLOG ========================-->
  <div class="box">
  <h8 class='heading-title2'> Blog Category</h8>
  <ul class="nav-list">
  <?php
  $kategoriblog=mysqli_query($koneksi,"select nama_kategoriblog, kategoriblog.id_kategoriblog, kategoriblog_seo,  
  count(blog.id_blog) as jml 
  from kategoriblog left join blog 
  on blog.id_kategoriblog=kategoriblog.id_kategoriblog 
  group by nama_kategoriblog");
  $no=1;
  while($k=mysqli_fetch_array($kategoriblog)){

  if(($no % 2)==0){
  echo "<li><a href='kategoriblog-$k[id_kategoriblog]-$k[kategoriblog_seo].html'> $k[nama_kategoriblog] 
  <span class='text-orange'>($k[jml])</span></a></li>";}
 
  else{
  echo "<li class='ganjil'><a href='kategoriblog-$k[id_kategoriblog]-$k[kategoriblog_seo].html'> $k[nama_kategoriblog] 
  <span class='text-orange'>($k[jml])</span></a></li>";}

  $no++;}
  ?>
  </ul>
  </div>
  <!--========= AKHIR KATEGORI BLOG ========================-->
		  
		  
  <!--========= ARTIKEL POPULER ========================-->  
  <div class="box">
  <br/><h4>Popular Articles</h4>
  <ul class="post-list fixed">
  <?php    
  //Terpopuler berdasarkan seminggu 
  $hari_ini=date("Ymd");
  $sebelum=mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"));    
  $tgl_sebelumnya=date("Ymd", $sebelum);
  $populer=mysqli_query($koneksi,"SELECT * FROM blog WHERE tanggal BETWEEN '$tgl_sebelumnya' AND '$hari_ini' 
  ORDER BY dibaca DESC LIMIT 8"); 
  
   /*  Terpopuler harian
  $hari_ini=date("Ymd");
  $populer=mysqli_query("SELECT * FROM berita WHERE tanggal='$hari_ini' ORDER BY dibaca DESC LIMIT 4");
  */ 
  
  while($p=mysqli_fetch_array($populer)){
  $baca = $p[dibaca]+1;
  
  if ($p['gambar']!=''){
  echo "			
  <li><a href=blog-$p[id_blog]-$p[judul_seo].html title='Link'>
  <img  src='img_blog/small_$p[gambar]' alt='' class='post_thumb' width='40' height='40'/> 
  $p[judul]  </a></li>";}
             
  else{	
  echo "
  <li><a href=blog-$p[id_blog]-$p[judul_seo].html title='Link'>
  <img  src='img_blog/gakadegambarnye.jpg' alt='' class='post_thumb' width='40' height='40'/> 
  $p[judul]</a></li>";}}
  
  ?>		 
  </ul>
  </div>
  <!--========= AKHIR ARTIKEL POPULER ========================-->  

		  
  <!--========= IKLAN ========================-->
  <div class="box"><br/>	
  <?php
  $iklan=mysqli_query($koneksi,"SELECT * FROM iklan WHERE aktif='Ya' ORDER BY rand() DESC");

  while($b=mysqli_fetch_array($iklan)){
  echo "  <div class='marginiklan'>
  <a href='$b[url]' 'target='_blank' title='$b[judul]'><img src='img_iklan/$b[gambar]' border='0'></a></div>";}
  ?>   	 
  </div>	
  <!--========= AKHIR IKLAN ========================-->
		
		  		  
  <!--========= TAG ARTIKEL========================-->  
  <div class="box">
  <br/><h8 class='heading-title2'>Popular Tag </h8>
  <?php
  $tag = mysqli_query($koneksi,"SELECT * FROM tag ORDER BY id_tag");
  $ambil = mysqli_num_rows(mysqli_query($koneksi,"SELECT id_blog FROM blog"));
  while ($var=mysqli_fetch_array($tag)) {
  $an = mysqli_query($koneksi,"SELECT count(id_blog) as jml, tag FROM blog WHERE tag LIKE '%$var[tag_seo]%'");
  $kk = mysqli_fetch_array($an);
  if ($kk[jml] > 0) {
  $px = (($kk[jml]*100)/$ambil)+100;
	
  echo "<div class='tags'><a href='tag-$var[id_tag]-$var[tag_seo].html' style='font-size:".$px."%'>
  $var[nama_tag]</a> </div>";
	
  mysqli_query($koneksi,"UPDATE rdb_tag SET jumlah =$kk[jml] WHERE id_tag = $var[id_tag]");}
  else {echo " ";}}
  ?>
  </div>
  <!--========= AKHIR TAG ARTIKEL========================-->  
		  
		  
		  
		  
  		  
		
  <!--========= LAYANAN PELANGGAN ========================-->
  <div class="box"><br/>
  <h4>Customer Service</h4>
  <?php 
  $ym=mysqli_query($koneksi,"select * from mod_ym order by id desc");
  while($t=mysqli_fetch_array($ym)){
  echo "<div class='userym2'>$t[nama] :</div> 
  <div class='ymikon'>
  <a href='ymsgr:sendIM?$t[username]'>
  <img src='http://opi.yahoo.com/online?u=$t[username]&amp;m=g&amp;t=1' border='0' height='16' width='64'></a>
  </div>";}
  ?>  
  </div>
  <!--========= AKHIR LAYANAN PELANGGAN ========================-->
		
		
		
		  
  </div>
  <div class="clear"></div>