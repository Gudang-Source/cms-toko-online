<?php
include "../config/koneksi.php";
function anti_injection($data){
  global $koneksi;
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;  
}


$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){


  echo "
  <link href='css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";
    
  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <center><div class='gembok'><img src='img/lock.png'></div></center>
  <h1>LOGIN GAGAL</h1>
  
  <p class='maaf'>
  Login tidak dapat di-injeksi !</p><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href='index.php'><b>ULANGI LAGI</b></a></p>
  </section>
  </div>";}


else{
$login=mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='Tidak'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;
  $_SESSION['KCFINDER']['uploadURL'] = "../editor/gambar";
  $_SESSION['KCFINDER']['uploadDir'] = "";

  
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[sessid]       = $r[id_session];
  $_SESSION[leveluser]    = $r[level];

  header('location:media.php?module=home');
}




  else{

  echo "
  <link href='css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <center><div class='gembok'><img src='img/lock.png'></div></center>
  <h1>LOGIN GAGAL</h1>
  
  <p class='maaf'>Username atau Password anda tidak sesuai.
  Atau akun anda sedang diblokir.</p><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href='index.php'><b>ULANGI LAGI</b></a></p>
  </section>
  </div>";}}
  
  ?>
