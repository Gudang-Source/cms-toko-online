<?php
  error_reporting(0);
  include "fungsi_kalender.php";
  include "fungsi_indotgl.php";
function getNewsletter($id){


$teraskreasi=mysqli_fetch_array(mysqli_query("SELECT * FROM identitas"));
$url = "$teraskreasi[url]";
		
		
  //PRODUK TERBARU/////////////////////////////////////////////	
  $produk.="<tr>";
  $zal=mysqli_query("SELECT * FROM produk WHERE headline='Y' ORDER BY id_produk DESC LIMIT 3");
  while($t=mysqli_fetch_array($zal)){
  
  $harga     =  number_format(($t[harga]),0,",",".");
  $disc      = ($t[diskon]/100)*$t[harga];
  $hargadisc = number_format(($t[harga]-$disc),0,",",".");

  $d=$t['diskon'];
  $hargatetap="<center><span class='price'>Rp. $hargadisc</span></center>";
		  
  $hargadiskon="
  <center><span class='old_price'>Rp. $harga</span> <span class='price'>Rp. $hargadisc</span></center>";
	
  if ($d!= "0"){
  $divharga=$hargadiskon;}
  else{
  $divharga=$hargatetap;}  
   
  $produk.="
  <td valign='top' width='215' align='left'>
  <table width='192' border='0' cellpadding='0' cellspacing='0'>
  <tbody>
  
  <tr>
  <td style='text-align: center; font-family: Arial,'Trebuchet MS',Verdana,sans-serif; 
  font-size: 15px; color: rgb(117, 117, 117); font-weight: bold;' height='25'>
  <a href='".$url."/produk-$t[id_produk]-$t[produk_seo].html' target='_blank' 
  style='color: rgb(117, 117, 117); font-weight: bold; text-decoration: none;'>$t[nama_produk]</a>
  </td>
  </tr>
					  
					  
  <tr>
  <td style='border: 3px solid rgb(237, 237, 237);' align='center'>
  <a href='".$url."/produk-$t[id_produk]-$t[produk_seo].html' target='_blank'>
  <img src='".$url."/img_produk/small_$t[gambar]' alt='$t[nama_produk]' style='display: block;' width='192' height='232'>
  </a>
  </td>
  </tr>
					  
  
  <div>
  <td>
  $divharga
  </td>
  </div>
                      
  <tr>
  <td align='center'>
  <a href='".$url."/produk-$t[id_produk]-$t[produk_seo].html' target='_blank' class='tombol'>Lihat Produk</a>
  </td>
  </tr>
  
  </tbody></table>	
  </td>";}  
  
  $produk.="</tr>";
  ////////////////////////////////////////////////////////////////////////////////////

		
		
  ///// BLOG ///////////////////////////////////////////////////////////////////////////
  $azzam=mysqli_query("SELECT * FROM blog ORDER BY id_blog DESC LIMIT 3");
  while($a=mysqli_fetch_array($azzam)){
  $isi_blog = (strip_tags($a['isi_blog'])); 
  $isi = substr($isi_blog,0,150);
  $isi = substr($isi_blog,0,strrpos($isi," ")); 
  $tgl = tgl_indo($a[tanggal]);
  
  
  $listartikel.="  
  <table width='410' border='0' cellpadding='0' cellspacing='0'>
  <tbody>
  <tr>
  <td>
  <table width='410' border='0' cellpadding='0' cellspacing='0'>
  <tbody> 
  <tr>
  <td>
  <tr>
  
  
  <td style='border: 3px solid rgb(237, 237, 237);' valign='top' width='130'>
  <a href='".$url."/blog-$a[id_blog]-$a[judul_seo].html' target='_blank'>
  <img src='".$url."/img_blog/small_$a[gambar]' alt='$a[judul]' 
  style='display: block;' width='128' height='94'></a>
  </td>
  
    
  <td width='10'></td>
  <td valign='top' width='270'><table width='270' border='0' cellpadding='0' cellspacing='0'>
  <tbody>
								  
  <tr>
  <td style='text-align: left; font-family: Arial,'Trebuchet MS',Verdana,sans-serif; 
  font-size: 15px; color: rgb(117, 117, 117); font-weight: bold;' height='20'>
  <a href='".$url."/blog-$a[id_blog]-$a[judul_seo].html' target='_blank' style='color: rgb(117, 117, 117); 
  font-weight: bold; text-decoration: none;'>$a[judul]</a>
  </td>
  </tr>
 
  <tr>
  <td align='left' valign='top' style='font-size:11px; font-family:Helvetica, Arial, sans-serif; color:#92847c;'>
  $a[hari], $tgl - $a[jam] WIB
  </td>
  </tr>   
 
  <tr>
  <td style='text-align: left; font-family: Arial,'Trebuchet MS',Verdana,sans-serif; 
  font-size: 12px; color: rgb(153, 153, 153);'height='38'>$isi ... </td>
  </tr>
  </tbody></table>
  </td>
  </tr>
  </tbody></table>		
 
  <table width='410' border='0' cellpadding='0' cellspacing='0'>
  <tbody>
  <tr>
  <td style='border-bottom: 1px solid rgb(229, 229, 229);' height='10'></td>
  </tr>
  <tr>
  <td height='10'></td>
  </tr>
  </tbody></table>
                
  </td>
  </tr> 
  </tbody></table>";}  
  ///////////////////////////////////////////////////////////////////////////////



  ///// LOGO ///////////////////////////////////////////////////////////////////////////
  $zal=mysqli_fetch_array(mysqli_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1"));
  $logo="<div id='div$no'>
  <a href='".$url."' target='_blank'><img src='".$url."/logo/$zal[gambar]' width='250' height='45' /></a> 
  </div>";   
  ////////////////////////////////////////////////////////////////////////////////////


  ///// NAMA WEB ///////////////////////////////////////////////////////////////////////////
  $namaweb="$teraskreasi[nama_website]";   
  ////////////////////////////////////////////////////////////////////////////////////


  ///// HEADER ///////////////////////////////////////////////////////////////////////////
  $aku=mysqli_query("SELECT * FROM header ORDER BY rand() DESC LIMIT 1");
  while($b=mysqli_fetch_array($aku)){
  
  $header="<div id='div$no'>
  <a href='".$url."' target='_blank'>
  <img src='".$url."/img_header/$b[gambar]' width='670' height='244' alt='$b[judul]'  border='0' style='display:block;' /></a> 
  </div>";}
  ////////////////////////////////////////////////////////////////////////////////////



  ///// BANNER ///////////////////////////////////////////////////////////////////////////
  $iklan=mysqli_query("SELECT * FROM iklan WHERE aktif='Ya' ORDER BY id_iklan DESC LIMIT 2");
  while($b=mysqli_fetch_array($iklan)){
  
  $banner="
  <table width='194' border='0' cellpadding='0' cellspacing='0'>
  <tbody>
  <tr>
  <td>
                                
  <table width='170' border='0' cellpadding='0' cellspacing='0' align='center'>
  <tbody>
  <tr>
  <td style='border: 3px solid rgb(237, 237, 237);' valign='top' width='52' bgcolor='#FFFFFF'>
  <a href='$b[url]' 'target='_blank' title='$b[judul]'>
  <img src='".$url."/img_iklan/$b[gambar]' alt='$b[judul]' style='display: block;' width='170'></a>
  </td>
  </tr>
  </tbody>
  </table>
                                
  <table width='170' border='0' cellpadding='0' cellspacing='0' align='center'>
  <tbody><tr>
  <td style='border-bottom: 1px solid rgb(229, 229, 229);' height='20'>&nbsp;</td>
  </tr>
  <tr>
  <td style='border-top: 1px solid rgb(255, 255, 255);' height='20'>&nbsp;</td>
  </tr>
  </tbody></table>
      						
  </tr>
  </tbody></table> ";}
  ////////////////////////////////////////////////////////////////////////////////////



  ///// TANGGAL ///////////////////////////////////////////////////////////////////////////
  $izza=mysqli_query("SELECT * FROM blog ORDER BY id_blog DESC");
  while($z=mysqli_fetch_array($izza)){
  $tgl = tgl_indo($z[tanggal]);
  $tanggal="<div id='div$no'>
  $z[hari], $tgl
  </div>"; }   
  ////////////////////////////////////////////////////////////////////////////////////


  ///// PATEN ///////////////////////////////////////////////////////////////////////////
  $paten="
  Copyright &copy; 2013 - $teraskreasi[nama_website].<br>
  <a href='$teraskreasi[url]' target='_blank' style='color: rgb(153, 153, 153); 
  text-decoration: none; text-shadow: 0px 1px 0px rgb(255, 255, 255); border-bottom: 1px dotted rgb(153, 153, 153);'>
  www.$teraskreasi[nama_website].com</a> | 

  <a href='#' target='_blank' style='color: rgb(153, 153, 153); text-decoration: none; 
  text-shadow: 0px 1px 0px rgb(255, 255, 255); border-bottom: 1px dotted rgb(153, 153, 153);'>$teraskreasi[email]</a> | 
  <span style=' border-bottom: 1px dotted #999;'>Telp: $teraskreasi[no_telp]</span>";   
  ////////////////////////////////////////////////////////////////////////////////////




$handle=fopen("../../../config/template.html","r+");
if($handle){
$template=fread($handle,9999999);


$qru=mysqli_query("SELECT email FROM newsletter");
while($u=mysqli_fetch_array($qru)){

$tampil=str_replace("{baseurl}",$url,$template);
$tampil=str_replace("{tanggal}",date('d-m-Y'),$tampil);
$tampil=str_replace("{produk}",$produk,$tampil);
$tampil=str_replace("{listartikel}",$listartikel,$tampil);
$tampil=str_replace("{logo}",$logo,$tampil);
$tampil=str_replace("{email}",$u[email],$tampil);
$tampil=str_replace("{namaweb}",$namaweb,$tampil);
$tampil=str_replace("{header}",$header,$tampil);
$tampil=str_replace("{tanggal}",$tanggal,$tampil);
$tampil=str_replace("{paten}",$paten,$tampil);
$tampil=str_replace("{banner}",$banner,$tampil);

$tujuan = "$u[email]";
$subject = "$teraskreasi[nama_website] Newsletter";
$pesan = "$tampil";
$email_situs = "$teraskreasi[email]";

$dari = "From: $teraskreasi[nama_website] <".$email_situs.">\n" . 
"MIME-Version: 1.0\n" . 
"Content-type: text/html; charset=iso-8859-1";
mail($tujuan, $subject, $pesan, $dari);
}
}
}

?>