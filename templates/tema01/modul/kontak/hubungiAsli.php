  

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  




  <!--=========  HUBUNGI KAMI ========================-->
  <div class="box box-common">
  <h2 class="heading-title">Contact Us</h2>
  <div class="contact-info">
  <div class="content">
		  
  <?php   
  $iden=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM identitas"));
  
  echo "
  <div class='one_third'>
  <span class='address'>Address:</span><br/>
  <span style='line-height:24px;'><b>$iden[nama_website]</b><br/>
  $iden[alamat]</span>
  </div>
			 
  <div class='one_third'>
  <span class='fax'>Working Days:</span><br/>
  $iden[hari_kerja]<br/><br/>
  <span class='phone'>Email:</span><br/>
  $iden[email]</div>
  <div class='one_third last'> <span class='hours'>Operational Hours:</span> <br/>
  $iden[jam_kerja]<br/>
  <br/>";
  ?>  
			  
			  
			  
  <span class="skype">Online Services</span> <br/>
  <?php 
  $ym=mysqli_query($koneksi,"select * from mod_ym order by id desc");
  while($t=mysqli_fetch_array($ym)){
  echo "<div class='userym2'>$t[nama] :</div> 
  <div class='ymikon'>
  <a href='ymsgr:sendIM?$t[username]'>
  <img src='http://opi.yahoo.com/online?u=$t[username]&amp;m=g&amp;t=1' border='0' height='16' width='64'></a>
  </div>";}
  ?>  			  
  </div>
  <div class="clear"></div>
			
  <?php 
  $pet=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM peta"));	
  echo " <span class='map'>Location $iden[nama_website]</span>
  <div class='map_holder'>
  <iframe width='$pet[width]' height='$pet[height]' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'  
src='http://maps.google.co.id/maps/ms?msa=0&amp;msid=203381980094640223245.0004aea3b102f7a4b1e3b&amp;ie=UTF8&amp;t=m&amp;vpsrc=1&amp;ll=$pet[longtitude],$pet[latitude]&amp;spn=0,0&amp;output=embed'></iframe>
  </div>
  </div>
  </div>";
  ?>  		
		
		
  <?php 
  echo " 
  <h3 class='heading-title'>Contact Form</h3>
  <div class='contact-form'>
  <form method='post' action='hubungi-aksi.html' id='commentsForm'>
  			   
  <div class='content'> <span>Name:</span>
  <input required type='text'  size='100%'  name='nama' id='name'>
  </div>
          
  <div class='content'> <span>E-Mail:</span>
  <input required type='text' size='100%' name='email' id='email'>
  </div>
	
  <div class='content'> <span>Subject:</span>
  <input required type='text' size='100%' name='subjek' id='subject'>
  </div>
	
  <div class='content'> <span>Message:</span>
  <textarea required name='pesan' style='width:95%;' rows='10' cols='40'></textarea>
  </div>
		  
  <label for='msg' id='msg_label'>Code:</label>
  <input required type='text' name='kode' id='code' size='6' maxlength='6' class='text-input' />
  <div class='margincaptcha2'><img id='captcha' src='terasconfig/captcha.php' border='0' ><a href='JavaScript: captcha();'>
  <div class='margincaptcha3'><img border='0' alt='' src='terasconfig/refresh.png' align='top'></div></a></div>

  <div class='buttons'>
  <div class='left'>
  <input type='submit' value='Send' class='button button-orange' /></form>   			
  </div>
  </div>
  </div> </div>";
  ?>  		
  <!--=========  AKHIR HUBUNGI KAMI ========================-->	
  </div>
  </div>