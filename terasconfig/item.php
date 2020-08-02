  <?php
  $sid = session_id();
  $rzl1= mysqli_query($koneksi,"SELECT SUM(jumlah*(harga-(diskon/100)*harga)) as total,SUM(jumlah) as totaljumlah FROM orders_temp, produk 
  WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  while($r=mysqli_fetch_array($rzl1)){
  if ($r['totaljumlah'] != ""){
  $total_rp    =  number_format(($r['total']),0,",",".");




  echo "<span class='cart-count'>$r[totaljumlah]</span>";}
  
  else{
  echo "<span class='cart-count'>0</span>";}}
  
  ?>
		
