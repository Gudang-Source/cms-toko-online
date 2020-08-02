

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  


  <!--========= DETAIL BLOG ========================-->  
  <?php			
  $detail=mysqli_query($koneksi,"SELECT * FROM blog,users,kategoriblog WHERE users.username=blog.username 
  AND kategoriblog.id_kategoriblog=blog.id_kategoriblog AND id_blog='".$val->validasi($_GET['id'],'sql')."'");
  $d   = mysqli_fetch_array($detail);
  $tgl = tgl_indo($d[tanggal]);
  $baca = $d[dibaca]+1;
  
  $komentar ="SELECT * FROM komentar WHERE id_blog= '".$d['id_blog']."'";
  $zalkomentar = mysqli_query($komentar);
  $total_komentar = mysqli_num_rows($zalkomentar);
		
  echo " 
  <div id='main' class='fixed box box-common'>
  <div class='subjudul'>$d[sub_judul]</div>
  <h2 class='heading-title'>$d[judul]</h2>";	
				
  
  echo "	
  <div class='meta'>
  <span class='posted_in'>Posted by: $d[nama_lengkap] | 
  <span class='posted_by'>$d[hari], $tgl - $d[jam] WIB</span> 
  <span class='count_comments'>Read: $baca visitor</span> 
  </div>";
  
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));

  if ($d[gambar]!=''){
  
  echo "
  <div class='full_width'>
  <img src='img_blog/$d[gambar]' width=350 alt='$d[judul]' class='image-align-left2' />
  <p class='ket_gambar'>$d[keterangan_gambar]</p>";}
	
  echo "
  <p>$d[isi_blog]</p>
  
  <div class='shareby'> 
  
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td align='left' valign='middle' width='50%'>
  <div class='fb-like'  data-href='$iden[url]/blog-$d[id_blog]-$d[judul_seo].html' data-send='false' 
  data-width='auto' data-show-faces='false' data-colorscheme='light' data-layout='button_count'>
  </td>
  
  <td align='right' valign='middle' width='50%' style=\"text-align:right;border:0;\">
  <div class='addthis_toolbox addthis_default_style '>
  <a class='addthis_button_preferred_1'></a>
  <a class='addthis_button_preferred_2'></a>
  <a class='addthis_button_preferred_3'></a>
  <a class='addthis_button_preferred_4'></a>
  <a class='addthis_button_compact'></a>
  <a class='addthis_counter addthis_bubble_style'></a>
  </div> 
  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-504c13fd103cdd62'></script>  
  </td>
  
  </table>";  
  
  //NEXT-PREV blog ///////////////////////////////////////////////////////////////////////
  $qp = mysqli_query($koneksi,"select id_blog, judul, judul_seo from
  blog where id_blog < '".$val->validasi($_GET['id'],'sql')."' order by id_blog desc limit 1");
  $jp = mysqli_num_rows($qp);
  $tp = mysqli_fetch_array($qp);
  
  $qn = mysqli_query($koneksi,"select id_blog, judul, judul_seo from
  blog where id_blog > '".$val->validasi($_GET['id'],'sql')."' order by id_blog asc limit 1");
  $jn = mysqli_num_rows($qn);
  $tn = mysqli_fetch_array($qn);
  
  echo "
  <table cellpadding='0' cellspacing='0'>
  <tr class='alt'>
  
  <td align='left' valign='top' width='50%'>";
  if($jp <> 0) {
  echo "<a href='blog-$tp[id_blog]-$tp[judul_seo].html'><span class='text-orange'>&#9668;</span> $tp[judul]</a>";}
  echo "</td>
  
  <td align='right' valign='top' width='50%'  style=\"text-align:right;\">";
  if($jn <> 0) {
  echo "<a href='blog-$tn[id_blog]-$tn[judul_seo].html'>$tn[judul] <span class='text-orange'>&#9658;</span></a>";}
  echo "</td>
  
  </tr>
  </table>
  </div>";  
  // AKHIR NEXT-PREV blog ///////////////////////////////////////////////////////////////////////";	 
  
  
  echo "<br/>
  <h3 class='related_box_title'>Other Articles</h3>
  <div class='related_box'>
  <ul>";
  
  $pisah_kata  = explode(",",$d[tag]);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($_GET[id],0,2);

  $cari = "SELECT * FROM blog WHERE (id_blog<'$ambil_id') and (id_blog!='$ambil_id') and (" ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "tag LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; }}
  $cari .= ") ORDER BY id_blog DESC LIMIT 4";
  $hasil  = mysqli_query($cari);
  while($h=mysqli_fetch_array($hasil)){
  
  echo "
  <li class='related_item'>
  <div class='related_image'>
  <a href=blog-$h[id_blog]-$h[judul_seo].html>
  <img height='80' width='130' src='img_blog/small_$h[gambar]' alt='$h[judul]'>
  </a>
  </div> 
  <a href=blog-$h[id_blog]-$h[judul_seo].html>$h[judul]</a>
  </li>";}
		
  echo "    
  </ul>
  </div>";	
  
  mysqli_query($koneksi,"UPDATE blog SET dibaca=$d[dibaca]+1 
  WHERE id_blog='".$val->validasi($_GET['id'],'sql')."'");       
  
  $komentar = mysqli_query($koneksi,"select count(komentar.id_komentar) as jml from komentar 
  WHERE id_blog='".$val->validasi($_GET['id'],'sql')."' AND aktif='Y'");
  $k = mysqli_fetch_array($komentar); 

			
  echo "   
  <br/> <br/>
  <div id='comments'>
  <h4 class='heading-title'>Comment: $k[jml]</h4>
  <ul class='commentlist'>";
			
						
  $p      = new HalKomentarBlog;
  $batas  = 4;
  $posisi = $p->cariPosisi($batas);

  $sql = mysqli_query($koneksi,"SELECT * FROM komentar 
  WHERE id_blog='".$val->validasi($_GET['id'],'sql')."' AND aktif='Y' LIMIT $posisi,$batas");
  $jml = mysqli_num_rows($sql);
  
  if ($jml > 0){
  while ($s = mysqli_fetch_array($sql)){
  $tanggal = tgl_indo($s[tgl]);
  
  $grav_url = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( $s[url] ) ) ) . '?s=' . urlencode( $default ) . '&s=' .  
  $size;;
  	
  if ($s[url]!=''){
  
  echo "
  <li>
  <div class='comment-body'> 
  
  <img src='$grav_url' alt='$s[nama_komentar]' class='avatar' height='40' width='40' /> 
  <span class='tuser'>
  <a name=$s[id_komentar] id=$s[id_komentar]><a href='http://$s[url]' target='_blank'>$s[nama_komentar]</a></span>
  <span>$tanggal - $s[jam_komentar] WIB</span>
  <p>";}
			
										
  else{	
  echo "  <div class='comments_sec_inner'>
  <ol class='comments'>
  <li>
  <div class='comment_box'>
  <img  width='48' height='46' src=$f[folder]/images/gakadefotonye.jpg  alt='$s[nama_komentar]' class='avatar' />
  <h5><a name=$s[id_komentar] id=$s[id_komentar]><a href='http://$s[url]' target='_blank'>$s[nama_komentar]</a>
  <span>$tanggal - $s[jam_komentar] WIB</span>
  </h5>
  <p>";}
  
  
										
  $isian=nl2br($s[isi_komentar]); 
  $isikan=sensor($isian); 
  echo autolink($isikan);								
										
  echo "</p></div>
   </li> ";}							
		
								
  $jmldata     = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM komentar 
  WHERE id_blog='".$val->validasi($_GET['id'],'sql')."' AND aktif='Y'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);
                     
  echo " </ul>
  <div class='box box-common'>
  <div class='halaman'>$linkHalaman</div>
  </div><br/>";}

  
  echo "
  <h4 class='heading-title'>Comment Form</h4>
 
  
  <form name='form' id='commentsForm' action=simpankomentar.php method=POST onSubmit=\"return validasi(this)\">
  <input type=hidden name=id value=$_GET[id]>
		
  <fieldset>
  
  <label for='name' id='name_label'>Name:</label>
  <input required type='text' name='nama_komentar' id='name' size='90' value='' class='text-input' />
				
  <label for='email' id='name_label'>Email:</label>
  <input required type='text' name='url' id='email' size='90' value='' class='text-input' />
	
  <label for='msg' id='msg_label'>Comment:</label>
  <textarea required  cols='60' rows='10' name='isi_komentar'  id='msg' class='textarea'></textarea>
	
  <label for='msg' id='msg_label'>Code:</label>
  <input required type='text' name='kode' id='code' size='6' maxlength='6' class='text-input' />
  <div class='margincaptcha2'><img id='captcha' src='terasconfig/captcha.php' border='0' ><a href='JavaScript: captcha();'>
  <div class='margincaptcha3'><img border='0' alt='' src='terasconfig/refresh.png' align='top'></div></a></div>

  
  <input type='submit' name='submit' class='button' id='submit_btn' value='Send' />
  
  </fieldset>
  </form>
  </div></div> </div>";
  ?>
  <!--========= AKHIR DETAIL BLOG ========================-->  
			
			
 
  </div>
  </div>
