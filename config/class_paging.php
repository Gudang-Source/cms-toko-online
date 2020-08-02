<?php



   // SEMUA PRODUK ===================================================================================
   class SemuaProduk{
   function cariPosisi($batas){
   if(empty($_GET['halproduk'])){
   $posisi=0;
   $_GET['halproduk']=1;}
   
   else{
   $posisi = ($_GET['halproduk']-1) * $batas;}
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;} 

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=halproduk-1.html class='nextprev'>Awal</a>
   <a href=halproduk-$prev.html class='nextprev'>Kembali</a>";}
	
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span>
   <span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
  
   continue;
	
   $angka .= "<a href=halproduk-$i.html>$i</a>";}
  
   $angka .= "<span class='current'>$halaman_aktif</span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
	  
   $angka .= "<a href=halproduk-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span>
   <a href=halproduk-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
   
   $link_halaman .= " <a href=halproduk-$next.html class='nextprev'>Lanjut</a>
   <a href=halproduk-$jmlhalaman.html class='nextprev'>Akhir</a>";}
	
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span>
   <span class='nextprev'>Akhir</span>";}
   
   return $link_halaman;}}
   // =======================================================================================================



   // DISKON ===================================================================================
   class Diskon{
   function cariPosisi($batas){
   if(empty($_GET['haldiskon'])){
   $posisi=0;
   $_GET['haldiskon']=1;}
   
   else{
   $posisi = ($_GET['haldiskon']-1) * $batas;}
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;} 

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=haldiskon-1.html class='nextprev'>Awal</a>
   <a href=haldiskon-$prev.html class='nextprev'>Kembali</a>";}
	
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span>
   <span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
  
   continue;
	
   $angka .= "<a href=haldiskon-$i.html>$i</a>";}
  
   $angka .= "<span class='current'>$halaman_aktif</span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
	  
   $angka .= "<a href=haldiskon-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span>
   <a href=haldiskon-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
   
   $link_halaman .= " <a href=haldiskon-$next.html class='nextprev'>Lanjut</a>
   <a href=haldiskon-$jmlhalaman.html class='nextprev'>Akhir</a>";}
	
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span>
   <span class='nextprev'>Akhir</span>";}
   
   return $link_halaman;}}
   // =======================================================================================================





   // KATEGORI PRODUK =======================================================================================
   class KategoriProduk{
   function cariPosisi($batas){
   if(empty($_GET['halkategori'])){
   $posisi=0;
   $_GET['halkategori']=1;}
	
   else{
   $posisi = ($_GET['halkategori']-1) * $batas;}
   
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;}

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=halkategori-$_GET[id]-1.html class='nextprev'>Awal</a>
   <a href=halkategori-$_GET[id]-$prev.html class='nextprev'>Kembali</a>";}
					
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span>
   <span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
   continue;
   
   $angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a>";}
	  
   $angka .= " <span class='current'><b>$halaman_aktif</b></span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
   $angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...
   </span><a href=halkategori-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
	
   $link_halaman .= " <a href=halkategori-$_GET[id]-$next.html class='nextprev' >Lanjut</a>
   <a href=halkategori-$_GET[id]-$jmlhalaman.html class='nextprev'>Akhir</a>";}
					 
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span>
   <span class='nextprev'>Akhir</span>";}

   return $link_halaman;}}
   // =========================================================================================================




   // KOMENTAR BLOG ====================================================================
   class HalKomentarBlog{
   function cariPosisi($batas){
   if(empty($_GET['halkomentar'])){
   $posisi=0;
   $_GET['halkomentar']=1;}
	
   else{
   $posisi = ($_GET['halkomentar']-1) * $batas;}
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;}

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
   if($halaman_aktif > 1){
   $Kembali = $halaman_aktif-1;
   $link_halaman .= "<a href=halkomentar-$_GET[id]-1.html class='nextprev'>Awal</a>
   <a href=halkomentar-$_GET[id]-$Kembali.html class='nextprev'>Kembali</a>";}
					
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span><span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
   continue;
   $angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a>"; }
	  
   $angka .= "<span class='current'>$halaman_aktif</span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
   break;
	  
   $angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a>"; }
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span>
   <a href=halkomentar-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $Lanjut = $halaman_aktif+1;
   $link_halaman .= " <a href=halkomentar-$_GET[id]-$Lanjut.html class='nextprev'>Lanjut</a>
   <a href=halkomentar-$_GET[id]-$jmlhalaman.html class='nextprev'  >Akhir</a> ";}
					 
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span><span class='nextprev'>Akhir</span>";}
   
   return $link_halaman;}}
   // =====================================================================================



   //SEMUA BLOG =======================================================================
   class SemuaBlog{
   function cariPosisi($batas){
   if(empty($_GET['halblog'])){
   $posisi=0;
   $_GET['halblog']=1;}
   
   else{
   $posisi = ($_GET['halblog']-1) * $batas;}
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;} 

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=halblog-1.html class='nextprev'>Awal</a>
   <a href=halblog-$prev.html class='nextprev'>Kembali</a>";}
	
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span>
   <span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
  
   continue;
	
   $angka .= "<a href=halblog-$i.html>$i</a>";}
  
   $angka .= "<span class='current'>$halaman_aktif</span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
	  
   $angka .= "<a href=halblog-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span>
   <a href=halblog-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
   
   $link_halaman .= " <a href=halblog-$next.html class='nextprev'>Lanjut</a>
   <a href=halblog-$jmlhalaman.html class='nextprev'>Akhir</a>";}
	
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span>
   <span class='nextprev'>Akhir</span>";}
   
   return $link_halaman;}}

   // =========================================================================



   // KATEGORI BLOG ==================================================================
   class KategoriBlog{
   function cariPosisi($batas){
   if(empty($_GET['halkategoriblog'])){
   $posisi=0;
   $_GET['halkategoriblog']=1;}
	
   else{
   $posisi = ($_GET['halkategoriblog']-1) * $batas;}
   
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;}

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=halkategoriblog-$_GET[id]-1.html class='nextprev'>Awal</a>
   <a href=halkategoriblog-$_GET[id]-$prev.html class='nextprev'>Kembali</a>";}
					
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span>
   <span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
   continue;
   
   $angka .= "<a href=halkategoriblog-$_GET[id]-$i.html>$i</a>";}
	  
   $angka .= " <span class='current'><b>$halaman_aktif</b></span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
   $angka .= "<a href=halkategoriblog-$_GET[id]-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...
   </span><a href=halkategoriblog-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
	
   $link_halaman .= " <a href=halkategoriblog-$_GET[id]-$next.html class='nextprev' >Lanjut</a>
   <a href=halkategoriblog-$_GET[id]-$jmlhalaman.html class='nextprev'>Akhir</a>";}
					 
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span>
   <span class='nextprev'>Akhir</span>";}

   return $link_halaman;}}

   // =========================================================================


   // KATALOG ==============================================================
   class Katalog{
   function cariPosisi($batas){
   if(empty($_GET['haldownload'])){
   $posisi=0;
   $_GET['haldownload']=1;}
   
   else{
   $posisi = ($_GET['haldownload']-1) * $batas;}
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;} 

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=haldownload-1.html class='nextprev'>Awal</a>
   <a href=haldownload-$prev.html class='nextprev'>Kembali</a>";}
	
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span>
   <span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
  
   continue;
	
   $angka .= "<a href=haldownload-$i.html>$i</a>";}
  
   $angka .= "<span class='current'>$halaman_aktif</span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
	  
   $angka .= "<a href=haldownload-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span>
   <a href=haldownload-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
   
   $link_halaman .= " <a href=haldownload-$next.html class='nextprev'>Lanjut</a>
   <a href=haldownload-$jmlhalaman.html class='nextprev'>Akhir</a>";}
	
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span>
   <span class='nextprev'>Akhir</span>";}
   
   return $link_halaman;}}
   // ===========================================================================================



   // ADMIN ==============================================================
  class Paging{
  // Fungsi untuk mencek halaman dan posisi data
  function cariPosisi($batas){
  if(empty($_GET['halaman'])){
  $posisi=0;
  $_GET['halaman']=1;}
  else{
  $posisi = ($_GET['halaman']-1) * $batas;}
  return $posisi;}

  // Fungsi untuk menghitung total halaman
  function jumlahHalaman($jmldata, $batas){
  $jmlhalaman = ceil($jmldata/$batas);
  return $jmlhalaman;}

  // Fungsi untuk link halaman 1,2,3 (untuk admin)
  function navHalaman($halaman_aktif, $jmlhalaman){
  $link_halaman = "";

  // Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
  if($halaman_aktif > 1){
  $Kembali = $halaman_aktif-1;
  $link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1><< Awal</a> | 
                    <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$Kembali>< Kembali</a> | ";}
  else{ 
  $link_halaman .= "<< Awal | < Kembali | ";}

  // Link halaman 1,2,3, ...
  $angka = ($halaman_aktif > 3 ? " ... " : " "); 
  for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  continue;
  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";}
  $angka .= " <b>$halaman_aktif</b> | ";
	  
  for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
  if($i > $jmlhalaman)
  break;
  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";}
  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | 
  <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");
  $link_halaman .= "$angka";

  // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
  if($halaman_aktif < $jmlhalaman){
  $Lanjut = $halaman_aktif+1;
  $link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$Lanjut>Lanjut ></a> | 
                     <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>Akhir >></a> ";}
  else{
  $link_halaman .= " Lanjut > | Akhir >>";}
  return $link_halaman;}}
  // ===========================================================================================




   // Testimoni====================================================================
   class Tag{
   function cariPosisi($batas){
   if(empty($_GET['haltag'])){
   $posisi=0;
   $_GET['haltag']=1;}
	
   else{
   $posisi = ($_GET['haltag']-1) * $batas;}
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;}

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
   if($halaman_aktif > 1){
   $Kembali = $halaman_aktif-1;
   $link_halaman .= "<a href=haltag-$_GET[id]-1.html class='nextprev'>Awal</a>
   <a href=haltag-$_GET[id]-$Kembali.html class='nextprev'>Kembali</a>";}
					
   else{ 
   $link_halaman .= "<span class='nextprev'>Awal</span><span class='nextprev'>Kembali</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
   continue;
   $angka .= "<a href=haltag-$_GET[id]-$i.html>$i</a>"; }
	  
   $angka .= "<span class='current'>$halaman_aktif</span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
   break;
	  
   $angka .= "<a href=haltag-$_GET[id]-$i.html>$i</a>"; }
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span>
   <a href=haltag-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
   if($halaman_aktif < $jmlhalaman){
   $Lanjut = $halaman_aktif+1;
   $link_halaman .= " <a href=haltag-$_GET[id]-$Lanjut.html class='nextprev'>Lanjut</a>
   <a href=haltag-$_GET[id]-$jmlhalaman.html class='nextprev'  >Akhir</a> ";}
					 
   else{
   $link_halaman .= "<span class='nextprev'>Lanjut</span><span class='nextprev'>Akhir</span>";}
   
   return $link_halaman;}}
   // =====================================================================================



// GALERI FOTO
class GaleriProduk{
function cariPosisi($batas){
 if(empty($_GET['halgaleri'])){
   $posisi=0;
   $_GET['halgaleri']=1;}
	
   else{
   $posisi = ($_GET['halgaleri']-1) * $batas;}
   
   return $posisi;}

   // Fungsi untuk menghitung total halaman
   function jumlahHalaman($jmldata, $batas){
   $jmlhalaman = ceil($jmldata/$batas);
   return $jmlhalaman;}

   // Fungsi untuk link halaman 1,2,3 
   function navHalaman($halaman_aktif, $jmlhalaman){
   $link_halaman = "";

   // Link ke halaman pertama (first) dan sebelumnya (prev)
   if($halaman_aktif > 1){
   $prev = $halaman_aktif-1;
   $link_halaman .= "<a href=halgaleri-$_GET[id]-1.html class='nextprev'>First</a>
   <a href=halgaleri-$_GET[id]-$prev.html class='nextprev'>Prev</a>";}
					
   else{ 
   $link_halaman .= "<span class='nextprev'>First</span>
   <span class='nextprev'>Prev</span>";}

   // Link halaman 1,2,3, ...
   $angka = ($halaman_aktif > 3 ? " ... " : " "); 
   for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
   if ($i < 1)
   continue;
   
   $angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a>";}
	  
   $angka .= " <span class='current'><b>$halaman_aktif</b></span>";
	  
   for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
   if($i > $jmlhalaman)
	
   break;
   $angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a>";}
	
   $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...
   </span><a href=halgaleri-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>" : " ");

   $link_halaman .= "$angka";

   // Link ke halaman berikutnya (Next) dan terLast (Last) 
   if($halaman_aktif < $jmlhalaman){
   $next = $halaman_aktif+1;
	
   $link_halaman .= " <a href=halgaleri-$_GET[id]-$next.html class='nextprev' >Next</a>
   <a href=halgaleri-$_GET[id]-$jmlhalaman.html class='nextprev'>Last</a>";}
					 
   else{
   $link_halaman .= "<span class='nextprev'>Next</span>
   <span class='nextprev'>Last</span>";}

   return $link_halaman;}}

//===================================================================================


   ?>
