     
  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  



  <!--========= TESTIMONI ========================-->
  <div class="box box-common">
  <h2 class="heading-title">Customer Testimony</h2>
  <div class="contact-info">
  <div class="content">
  
  <?php 
  echo " 
  <div class='contact-form'>
  <form method='post' action='testimoni-aksi.html' id='commentsForm'>
  			   
  <div class='content'> <span>Name:</span>
  <input required type='text'  size='100%'  name='nama' id='name'>
  </div>
          
  <div class='content'> <span>E-Mail:</span>
  <input required type='text' size='100%' name='email' id='email'>
  </div>
	
  <div class='content'> <span>Country</span>
  <input required type='text' size='100%' name='kota' id='subject'>
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
  </div> </div> </div> </div>";
  ?>  		
  <!--=========  AKHIR TESTIMONI  ========================-->
		
		
  </div>
  </div>