
   <?php
  // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysqli_query($koneksi,"SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysqli_num_rows($s) == 0){
    mysqli_query($koneksi,"INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysqli_query($koneksi,"UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  //note: Jika dibawah ini ditambahin i jadi mysqli maka akan error
  $totalpengunjung  = mysqli_result(mysqli_query($koneksi,"SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  //note: Jika dibawah ini ditambahin i jadi mysqli maka akan error
  $totalhits        = mysqli_result(mysqli_query($koneksi,"SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysqli_result(mysqli_query($koneksi,"SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
  Online: $pengunjungonline<br/>
  Hits Hari Ini: $hits[hitstoday]<br/>
  Total Hits: $totalhits";
  ?>