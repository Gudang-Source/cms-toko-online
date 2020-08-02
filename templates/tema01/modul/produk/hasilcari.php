  
  <div id="content">
  <div class="inner"> 

	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  

		
  <!--========= HASIL PENCARIAN ========================-->
  <?php
  echo "   
  <div id='main' class='fixed box box-common'>
  <h2 class='heading-title'>Hasil Pencarian</h2>";	
  
  $kata = trim($_POST['kata']);
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  $cari = "SELECT * FROM produk WHERE " ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "deskripsi LIKE '%$pisah_kata[$i]%' OR nama_produk LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; }}
  
  $cari .= " ORDER BY id_produk DESC LIMIT 5";
  $hasil  = mysqli_query($cari);
  $ketemu = mysqli_num_rows($hasil);

  if ($ketemu > 0){
  
  echo "<span class style=\"font-size:14px;font-weight:bold; float:right;
  color:#fff;background-color:#ffa200;height: 30px;line-height: 30px; margin-top:-50px; padding: 0px 5px 0px 10px;\">
  Ditemukan $ketemu produk dengan kata <font style='background-color:#000'>$kata</font></span>";
  
  while($t=mysqli_fetch_array($hasil)){
                     	
  if ($t['gambar']!=''){
  
  echo "
  <table>
  <thead>
  </thead>
  <tbody>
  <tr>
      
  <td style='vertical-align:middle'><a href=produk-$t[id_produk]-$t[produk_seo].html>
  <img src='img_produk/small_$t[gambar]' alt='$r[judul]' width=50 /></a></td>";}		
  
  
  echo "		
  <td width='150px' style='vertical-align:middle'>
  <a href=produk-$t[id_produk]-$t[produk_seo].html><h5>$t[nama_produk]</h5></a>
  </td>";
  
  $isi_produk = htmlentities(strip_tags($t['deskripsi'])); 
  $isi = substr($isi_produk,0,300); 
  $isi = substr($isi_produk,0,strrpos($isi," ")); 
							
  echo " <td class style=\"font-size:13px;\"> $isi ...<a href=produk-$t[id_produk]-$t[produk_seo].html> 
  <span class='text-orange'>(selengkapnya)</span></a></td>
  </tr>
  </tbody>
  </table> ";}}

  else{
  echo " 
  <br/><h3>Tidak ditemukan produk dengan kata <font style='background-color:#ffa200'>$kata</font></h3>";}
  ?>
  <!--========= AKHIR HASIL PENCARIAN ========================-->

 
 
  </div>
 
  </div>
  </div>