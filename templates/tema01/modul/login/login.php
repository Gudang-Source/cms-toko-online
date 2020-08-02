

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  
  
  
  <!--========= LOGIN ANGGOTA ========================-->  
  <?php 
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));

  echo"
  <div class='box box-common box-login'>
  <h2 class='heading-title'> Login To<span class='text-orange'>$iden[nama_website]</span></h2>
  <div class='one_half'> ";
		
  echo"
  <div class='content'>
  <h3>Are You New Customers?</h3>
  <!--<p>Bila anda kustomer baru</p>-->
  <p>Please Sign Up,</p>
  <p>as the new member of $iden[nama_website]</p>
  <p>by click the Register button: </p><br/>
  <input type=button value='Register' onclick=window.location=('daftar.html') class='button button-orange' /></div>
  </div>";
				
  echo"
  <div class='one_half last'>
  
  <div class='content'>
  <h3>Membership <span class='text-orange'>$iden[nama_website]</span></h3>
  <p>As a member, you can login,</p>
  <p>use the login form below :</p><br/>
  
  <form method=post action='member/cek_login.php?lf=daftarnlogin'>
  
  <div class='content'> <span>Username:</span>
  <input type='text' value='' name='username' /></div>
  
  <div class='content'> <span>Password:</span>
  <input type='password' value='' name='password' />
  </div>
  
  <a href='lupa-password.html' class='forgoten'>Forgot Password?</a><br/>
  <input class='button button-orange' type=submit value='Login'/>
  
  </form></div>
  </div>
  <div class='clear'></div>
  </div>";
  ?>
  <!--========= AKHIR LOGIN ANGGOTA ========================-->  
  </div>
  </div>