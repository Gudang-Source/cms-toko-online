	
  <div id="content">
  <div class="inner"> 

	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  


  <!--========= DETAIL PRODUK  ========================-->  
  <?php
  $detail=mysqli_query("SELECT * FROM produk,kategori,users    
  WHERE kategori.id_kategori=produk.id_kategori AND id_produk='".$val->validasi($_GET['id'],'sql')."'");
  
  $r = mysqli_fetch_array($detail);
  $tgl = tgl_indo($r[tgl_masuk]);
  $baca = $r[dibaca]+1;
  $beli = $r[dibeli]+1;

  mysqli_query("UPDATE produk SET dibaca='$baca' where id_produk='".$val->validasi($_GET['id'],'sql')."'");
  mysqli_query("UPDATE produk SET dibeli='$beli' where id_produk='".$val->validasi($_GET['id'],'sql')."'");
  
  
  include "$f[folder]/modul/harga/diskon_stok2.php";
  
  $iden=mysqli_fetch_array(mysqli_query("SELECT * FROM identitas"));

	  
  echo "
  <div class='box box-common fixed'>
  <h2 class='heading-title'>$r[nama_produk]</h2>";	
    
  echo "	
  <div class='meta'>
  <span class='posted_in'>Posted: $r[nama_lengkap] | 
  <span class='posted_by'>$tgl</span> 
  <span class='count_comments'>Read: $baca Visitor</span> 
  </div>";
	
	
  if ($d[gambar]!=''){
  echo "
  <div class='product'>
  <div class='images'>
  
  <div class='image'>
  <img src='img_produk/$r[gambar]' width='300' height='375' title='$iden[nama_website]' /></a>
  
  <ul class='additional-images'>";
			
  $p      = new GaleriProduk;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);

  $col = 4;

  $g = mysqli_query("SELECT * FROM gallery WHERE id_produk='".$val->validasi($_GET['id'],'sql')."'  
  ORDER BY id_gallery DESC LIMIT $posisi,$batas");
  $ada = mysqli_num_rows($g);
  
  if ($ada > 0) {

  $cnt = 0;
  while ($w = mysqli_fetch_array($g)) {
  if ($cnt >= $col) {

  $cnt = 0;}
  $cnt++;
			
			
  echo " <li>  
  <ul class='gallery clearfix'>
  <a href='img_galeri/$w[gbr_gallery]' rel='prettyPhoto[gallery]'  
  title='$r[nama_produk]<br/><span class style=\"color:#DD430E;font-size:14px;\"><!--Rp. $hargadisc ---->'>  
  <img src='img_galeri/kecil_$w[gbr_gallery]' style=\"border:2px solid #f1f1f1;\" width='45' height='65'
  title='$iden[nama_website]' /></a>
  </ul></li>";}}
			
			
  else{	 
  echo "<span class style=\"color:#ccc;font-size:11px;padding-top:20px;\">There is no other images.</span>";}
		
			  
  echo "  </ul>  
  </div>
  <div class='clear'></div>
  </div>";}
		  
  echo "
  <div class='summary'>
  <div class='price'> 
  <!--------$divharga ////////////ini utk stoooooooook dan tidak pake
  <span class='price-tax'>Stok: $r[stok]</span> 
  
  <span>
  <div class='fb-like'  data-href='$iden[url]/produk-$r[id_produk]-$r[produk_seo].html' data-send='false' 
  data-width='auto' data-show-faces='false' data-colorscheme='light' data-layout='button_count'>
  </div> </span>
    
  </div> ------------->
  
  
  <div class='clear'></div>
			
  <div class='description'> 
  <h5 class='text-orange'>Description: </h5>
  <span>$r[deskripsi]</span>
  </div>
            
  <!------<div class='cart'>
  $tombol  
  

  <div class='marginshare'> 
  <div class='addthis_toolbox addthis_default_style '>
  <a class='addthis_button_preferred_1'></a>
  <a class='addthis_button_preferred_2'></a>
  <a class='addthis_button_preferred_3'></a>
  <a class='addthis_button_preferred_4'></a>
  <a class='addthis_button_compact'></a>
  <a class='addthis_counter addthis_bubble_style'></a>
  </div> 
  </div>
  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-504c13fd103cdd62'></script>

  </div> ---------------->
  </div></div>";
  
  
  //NEXT-PREV produk ///////////////////////////////////////////////////////////////////////
  $qp = mysqli_query("select id_produk, nama_produk, produk_seo from
  produk where id_produk < '".$val->validasi($_GET['id'],'sql')."' order by id_produk desc limit 1");
  $jp = mysqli_num_rows($qp);
  $tp = mysqli_fetch_array($qp);
  
  $qn = mysqli_query("select id_produk, nama_produk, produk_seo from
  produk where id_produk > '".$val->validasi($_GET['id'],'sql')."' order by id_produk asc limit 1");
  $jn = mysqli_num_rows($qn);
  $tn = mysqli_fetch_array($qn);
  
  echo "
  <table cellpadding='0' cellspacing='0'>
  <tr class='alt'>
  
  <td align='left' valign='top' width='50%'>";
  if($jp <> 0) {
  echo "<a href='produk-$tp[id_produk]-$tp[produk_seo].html'><span class='text-orange'>&#9668;</span> $tp[nama_produk]</a>";}
  echo "</td>
  
  <td align='right' valign='top' width='50%'  style=\"text-align:right;;\">";
  if($jn <> 0) {
  echo "<a href='produk-$tn[id_produk]-$tn[produk_seo].html'>$tn[nama_produk] <span class='text-orange'>&#9658;</span></a>";}
  echo "</td>
  
  </tr>
  </table>
   </div>
  <br />";  
  // AKHIR NEXT-PREV produk ///////////////////////////////////////////////////////////////////////
   
  ?>  
  <!--========= AKHIR DETAIL PRODUK  ========================-->  

		  
   <!--=========  REKOMENDASI PRODUK  ========================-->  
   <?php 
   echo "
   <div class='box box-orange fixed'>
   <h3 class='heading-title'>Rekomendasi Produk</h3>";
   
   $sql=mysqli_query("SELECT * FROM kategori, produk  
   WHERE kategori.id_kategori=produk.id_kategori 
   AND produk.id_kategori=$r[id_kategori]
   ORDER BY rand() LIMIT 4");
   
   while ($r=mysqli_fetch_array($sql)){
   include "$f[folder]/modul/harga/diskon_stok.php";
   $harga = number_format($r[harga],0,",",".");

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
   title='$r[nama_produk]<br/><span class style=\"color:#DD430E;font-size:13px;\"><!--Rp. $harga,- -->' class='go_to_prod_link'>
   Detail Produk</a>
   </div>  
   
   <!--------<div class='price_hold'>////////////////////
   $divharga
   </div>
   $tombol //////////---------------->
   </div></div>";}
   echo "
   </div>";
   ?>
   <!--========= AKHIR REKOMENDASI PRODUK  ========================-->  
		  
		  
		  
  </div>
  </div>  
		  
		  