<?php


  //// PRODUK //////////////////////////////////////////////
  function UploadImage($fupload_name){
  $vdir_upload = "../../../img_produk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  switch($imageType) {
  case "image/gif":
  $im_src=imagecreatefromgif($vfile_upload); 
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  $im_src=imagecreatefromjpeg($vfile_upload); 
  break;
  case "image/png":
  case "image/x-png":
  $im_src=imagecreatefrompng($vfile_upload); 
  break;}
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  if($src_width>=400){
  $dst_width = 400;} 
  
  else {
  $dst_width = $src_width;}
  $dst_height = ($dst_width/$src_width)*$src_height;

  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  switch($imageType) {
  case "image/gif":
  imagegif($im,$vdir_upload.$fupload_name);
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im,$vdir_upload.$fupload_name);
  break;
  case "image/png":
  case "image/x-png":
  imagepng($im,$vdir_upload.$fupload_name);
  break;}

  $dst_width2 =300;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  switch($imageType) {
  case "image/gif":
  imagegif($im2,$vdir_upload . "small_" . $fupload_name);
  break;
			
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
  break;

  case "image/png":
  case "image/x-png":
  imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			
  break; }
  
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);}
  ////////////////////////////////////////////////////////////////////////////////////////////





  //// GALERI PRODUK //////////////////////////////////////////////
  function UploadGalProd($fupload_name){
  $vdir_upload = "../../../img_galeri/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  switch($imageType) {
  case "image/gif":
  $im_src=imagecreatefromgif($vfile_upload); 
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  $im_src=imagecreatefromjpeg($vfile_upload); 
  break;
  case "image/png":
  case "image/x-png":
  $im_src=imagecreatefrompng($vfile_upload); 
  break;}
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  if($src_width>=400){
  $dst_width = 400;} 
  
  else {
  $dst_width = $src_width;}
  $dst_height = ($dst_width/$src_width)*$src_height;

  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  switch($imageType) {
  case "image/gif":
  imagegif($im,$vdir_upload.$fupload_name);
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im,$vdir_upload.$fupload_name);
  break;
  case "image/png":
  case "image/x-png":
  imagepng($im,$vdir_upload.$fupload_name);
  break;}

  $dst_width2 =80;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  switch($imageType) {
  case "image/gif":
  imagegif($im2,$vdir_upload . "kecil_" . $fupload_name);
  break;
			
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im2,$vdir_upload . "kecil_" . $fupload_name);
  break;

  case "image/png":
  case "image/x-png":
  imagepng($im2,$vdir_upload . "kecil_" . $fupload_name);
			
  break; }
  
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);}
  ////////////////////////////////////////////////////////////////////////////////////////////




  //BLOG /////////////////////////////////////////////////////////////////////////////////
  function Uploadblog($fupload_name){
  $vdir_upload = "../../../img_blog/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  switch($imageType) {
  case "image/gif":
  $im_src=imagecreatefromgif($vfile_upload); 
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  $im_src=imagecreatefromjpeg($vfile_upload); 
  break;
  case "image/png":
  case "image/x-png":
  $im_src=imagecreatefrompng($vfile_upload); 
  break;}
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  if($src_width>=500){
  $dst_width =500;} 
  
  else {
  $dst_width = $src_width;}
  $dst_height = ($dst_width/$src_width)*$src_height;

  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  switch($imageType) {
  case "image/gif":
  imagegif($im,$vdir_upload.$fupload_name);
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im,$vdir_upload.$fupload_name);
  break;
  case "image/png":
  case "image/x-png":
  imagepng($im,$vdir_upload.$fupload_name);
  break;}

  $dst_width2 = 300;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  switch($imageType) {
  case "image/gif":
  imagegif($im2,$vdir_upload . "small_" . $fupload_name);
  break;
			
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
  break;

  case "image/png":
  case "image/x-png":
  imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			
  break; }
  
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);}
  ////////////////////////////////////////////////////////////////////////////////////////////



  //USER ADMIN/////////////////////////////////////////////////////////////////
  function UploadUser($fupload_name){
  $vdir_upload = "../../../img_user/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  switch($imageType) {
  case "image/gif":
  $im_src=imagecreatefromgif($vfile_upload); 
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  $im_src=imagecreatefromjpeg($vfile_upload); 
  break;
  case "image/png":
  case "image/x-png":
  $im_src=imagecreatefrompng($vfile_upload); 
  break;}
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  if($src_width>=300){
  $dst_width = 300;} 
  
  else {
  $dst_width = $src_width;}
  $dst_height = ($dst_width/$src_width)*$src_height;

  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  switch($imageType) {
  case "image/gif":
  imagegif($im,$vdir_upload.$fupload_name);
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im,$vdir_upload.$fupload_name);
  break;
  case "image/png":
  case "image/x-png":
  imagepng($im,$vdir_upload.$fupload_name);
  break;}

  $dst_width2 = 129;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  switch($imageType) {
  case "image/gif":
  imagegif($im2,$vdir_upload . "small_" . $fupload_name);
  break;
			
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
  break;

  case "image/png":
  case "image/x-png":
  imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			
  break; }
  
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);}
  ////////////////////////////////////////////////////////////////////////////////////////////



  //HALAMAN BARU//////////////////////////////////////////////////
  function UploadStatis($fupload_name){
  $vdir_upload = "../../../img_statis/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  switch($imageType) {
  case "image/gif":
  $im_src=imagecreatefromgif($vfile_upload); 
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  $im_src=imagecreatefromjpeg($vfile_upload); 
  break;
  case "image/png":
  case "image/x-png":
  $im_src=imagecreatefrompng($vfile_upload); 
  break;}
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  if($src_width>=500){
  $dst_width = 500;} 
  
  else {
  $dst_width = $src_width;}
  $dst_height = ($dst_width/$src_width)*$src_height;

  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  switch($imageType) {
  case "image/gif":
  imagegif($im,$vdir_upload.$fupload_name);
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im,$vdir_upload.$fupload_name);
  break;
  case "image/png":
  case "image/x-png":
  imagepng($im,$vdir_upload.$fupload_name);
  break;}

  $dst_width2 =250;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  switch($imageType) {
  case "image/gif":
  imagegif($im2,$vdir_upload . "small_" . $fupload_name);
  break;
			
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
  break;

  case "image/png":
  case "image/x-png":
  imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			
  break; }
  
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);}
  ////////////////////////////////////////////////////////////////////////////////////////////



  // BANK//////////////////////////////////////////////
  function UploadBank($fupload_name){
  //direktori banner
  $vdir_upload = "../../../img_bank/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////



  // DOWNLOAD //////////////////////////////////////////////
  function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "../../../files_download/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////


  // LOGO //////////////////////////////////////////////
  function UploadLogo($fupload_name){
  //direktori Logo
  $vdir_upload = "../../../img_logo/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////////////////////////////////////////



  //BUAT FAVICON///////////////////////////////////////////////////////
  function UploadFavicon($fupload_name){
  //direktori favicon di root
  $vdir_upload = "../../../";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ///////////////////////////////////////////////////////////





  //BUAT IKLAN POPUP///////////////////////////////////////////////////////
  function Uploadiklan_popup ($fupload_name){
  //direktori Logo
  $vdir_upload = "../../../img_popup/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////////////////////////////////


  //BUAT BANNER//////////////////////////////////////////////////////
  function Uploadbanner ($fupload_name){
  //direktori Logo
  $vdir_upload = "../../../img_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////////////////////////////////


  //BUAT IKLAN//////////////////////////////////////////////////////
  function Uploadiklan ($fupload_name){
  //direktori Logo
  $vdir_upload = "../../../img_iklan/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////////////////////////////////



  // HEADER//////////////////////////////////////////////
  function UploadHeader($fupload_name){
  //direktori Header
  $vdir_upload = "../../../img_header/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);}
  ////////////////////////////////////////////////



  //// BUAT CAMPURAN //////////////////////////////////////////////
  function UploadPic($fupload_name){
  $vdir_upload = "../../../img_teraskreasi/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  switch($imageType) {
  case "image/gif":
  $im_src=imagecreatefromgif($vfile_upload); 
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  $im_src=imagecreatefromjpeg($vfile_upload); 
  break;
  case "image/png":
  case "image/x-png":
  $im_src=imagecreatefrompng($vfile_upload); 
  break;}
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  if($src_width>=960){
  $dst_width = 960;} 
  
  else {
  $dst_width = $src_width;}
  $dst_height = ($dst_width/$src_width)*$src_height;

  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  switch($imageType) {
  case "image/gif":
  imagegif($im,$vdir_upload.$fupload_name);
  break;
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im,$vdir_upload.$fupload_name);
  break;
  case "image/png":
  case "image/x-png":
  imagepng($im,$vdir_upload.$fupload_name);
  break;}

  $dst_width2 =250;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  switch($imageType) {
  case "image/gif":
  imagegif($im2,$vdir_upload . "small_" . $fupload_name);
  break;
			
  case "image/pjpeg":
  case "image/jpeg":
  case "image/jpg":
  imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
  break;

  case "image/png":
  case "image/x-png":
  imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			
  break; }
  
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);}
  ////////////////////////////////////////////////////////////////////////////////////////////




?>
