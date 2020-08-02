   <?php
	
	$harga     =  number_format(($r[harga]),0,",",".");
    $disc      = ($r[diskon]/100)*$r[harga];
    $hargadisc = number_format(($r[harga]-$disc),0,",",".");

    $d=$r['diskon'];
    $hargatetap="
	<span class='price'>Rp. $hargadisc</span>";
		  
		  
    $hargadiskon="
    <span class='old_price'>Rp. $harga</span> <span class='price'>Rp. $hargadisc</span>
    <span class='sale'>Diskon</span> <span class='save'>$r[diskon]%</span>";
	
	
    if ($d!= "0"){
    $divharga=$hargadiskon;}
	
	else{
    $divharga=$hargatetap;}  


    //TOMBOL////////////////////////////
    $stok=$r['stok'];
    $tombolbeli="
    <div class='links'>
	<a title='Beli Produk' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\" 
	class='small_cart button'>Beli Produk</a></div>";
	
    $tombolhabis="
	<span class='new_prod'>Produk Habis</span>
	
	<div class='links'>
	<a title='Beli Produk' href=\"#\" 
	class='small_cart button'>Produk Telah Habis</a> 
	</div>";
  
	
    if ($stok!= "0"){
    $tombol=$tombolbeli;
    }else{
    $tombol=$tombolhabis;
    } 
    ?>