
<?php
$module=$_GET['module'];
if($module=='detailproduk'){
	$sql2 = @mysqli_query($koneksi,"select deskripsi from produk where id_produk='$_GET[id]'");
	$r   = @mysqli_fetch_array($sql2);
	$deskripsi = htmlentities(strip_tags($r['deskripsi']));
}else{
	$deskripsi="$meta_deskripsi";
}
echo"$deskripsi";

?>




<?php
$module=$_GET['module'];
if($module=='detailblog'){
	$sql2 = @mysqli_query($koneksi,"select isi_blog from blog where id_blog='$_GET[id]'");
	$k   = @mysqli_fetch_array($sql2);
	$deskripsi = htmlentities(strip_tags($k['isi_blog']));
}else{
	$deskripsi="$meta_deskripsi";
}
echo"$deskripsi";

?>





<?php
$module=$_GET['module'];
if($module=='halamanstatis'){
	$sql2 = @mysqli_query($koneksi,"select isi_halaman from halamanstatis where judul_seo='$_GET[judul]'");
	$k   = @mysqli_fetch_array($sql2);
	$halaman = htmlentities(strip_tags($k['isi_halaman']));
}
echo"$halaman";

?>

