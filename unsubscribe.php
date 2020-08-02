  
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8" />
  <title>.:: TerasKreasi.com ::.</title>
        
  <link rel="stylesheet" href="templates/tema01/stylesheet/styles.css" />
  <link rel="shortcut icon" href="favicon.png" />
  </head>
  <body>
	

		
  <center>

  <?php
  include "config/koneksi.php";
  $teraskreasi=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));

  $email=$_GET[email];
  $valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";
  
  if(!eregi($valid_mail, $email)){
  
  echo " <h4>Email yang anda masukan tidak valid.</h4><br>
  <a href='$teraskreasi[url]' class='button button-orange'>KEMBALI</a>";} 

  else {
  mysqli_query($koneksi,"DELETE FROM newsletter WHERE email='$email'");
  echo "<h4>Anda berhasil berhenti berlangganan newsletter $teraskreasi[nama_website].</h4><br>
  <a href='$teraskreasi[url]' class='button button-orange'>KEMBALI</a>";}
  ?>
  
  </center>
		 
        
  </body>
  </html>