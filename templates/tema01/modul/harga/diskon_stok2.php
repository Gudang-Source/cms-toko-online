    
	<?php
	
	$harga       =  number_format(($r[harga]),0,",",".");
    $disc      = ($r[diskon]/100)*$r[harga];
    $hargadisc = number_format(($r[harga]-$disc),0,",",".");

    $d=$r['diskon'];
    $hargatetap  = "<span class='product-price'>Harga Rp. $hargadisc,-</span>";
	
    $hargadiskon = "
	<span class='price-old'>Harga Rp. $harga,-</span>
	<span class='product-price'>Harga Rp. $hargadisc,-</span>
	<div class='diskon2'>$r[diskon]%</div>";
	 
	 
    if ($d!=0){
    $divharga=$hargadiskon;}
	
	else{
    $divharga=$hargatetap;} 

    // tombol stok habis kalau stoknya 0
    $stok=$r['stok'];
    $tombolbeli="
	<a class='button button-orange' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">
	BELI PRODUK INI</a>";
	
    $tombolhabis="<a class='button button-orange'>PRODUK HABIS</a>";
    if ($stok!= "0"){
    $tombol=$tombolbeli;}
	else{
    $tombol=$tombolhabis;} 
	
    ?>