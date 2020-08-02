

  <div id="content">
  <div class="inner"> 
	
	
  <!--========= BREACRUMB ========================-->  
  <div class="breadcrumb"><?php include "terasconfig/breadcrumb.php";?></div>
  <!--========= AKHIR BREACRUMB ========================-->  


  <!--========= BANNER DAFTAR========================-->  
  <h1 class='cat_big_title'>
  <img src='img_header/header_daftar.jpg'/>
  <span class style=\"color:#FFF;\">Customer Registration</span>
  </h1>
  <!--========= AKHIR BANNER DAFTAR ========================-->  




  <?php
  
  echo"
  <form method='post' action='media.php?module=aksidaftar&act=daftarkustomer&lf=daftar'>
  
  <table>
  
  <tr>
  <td><b>Your Account</td>
  </tr>
				
  <tr>
  <td>		
  <div class='content'> <span>Username:</span><br/>	
  <input required type=text name=username size='70'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Password:</span><br/>	
  <input required type=password name=password size='70'>
  </div>				
  </td>			
  </tr>
			
			
  <tr>
  <td>		
  <div class='content'> <span> Password Again:</span><br/>	
  <input required type=password name=password2 size='70'>
  </div>				
  </td>			
  </tr>
  </table>	
			
  <table>
  <tr>
  <td><b>Information Detail & Your Address</td>
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Full Name:</span><br/>	
  <input required type=text name=nama_lengkap size='70'>
  </div>				
  </td>			
  </tr>
	
  <tr>
  <td>		
  <div class='content'> <span>Email:</span><br/>	
  <input required type=text name=email size='70'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Address:</span><br/>	
  <textarea required name=alamat style='width:440px;height:100px;'></textarea>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Post Code:</span><br/>	
  <input required type=text name=kode_pos size='70'>
  </div>				
  </td>			
  </tr>
	
  <tr>
  <td>		
  <div class='content'> <span>Province:</span><br/>	
  <input required type=text name=propinsi size='70'>
  </div>				
  </td>			
  </tr>	
			
  <tr>
  <td>		
  <div class='content'> <span>City:</span><br/>	
  <select required name='kota'>
  <option value='' selected>- Select -</option>";
  $tampil=mysqli_query($koneksi,"SELECT * FROM kota ORDER BY nama_kota");
  while($r=mysqli_fetch_array($tampil)){
  echo "<option value=$r[nama_kota]>$r[nama_kota]</option>";}
  echo"<option value='lainnya'>- Other -</option></select>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span>Other City:</span><br/>	
  <input type=text name=kotalain size='70'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>		
  <div class='content'> <span> Telepon/HP:</span><br/>	
  <input required type=text name=no_telp size='70'>
  </div>				
  </td>			
  </tr>
			
  <tr>
  <td>
  <input type=submit value='Register' class='button'></form>
  </td>
  </tr>
    
  </table>
 
  </div>";
  
  ?>
  
  </div></div>