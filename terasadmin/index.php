

<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <title>.:: Administrator -  Website ::.</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
  <link rel="shortcut icon" href="../favicon.png" />
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />

    
</head>
<body class="loginpage">
    
    <div class="loginBox">        
        <div class="loginHead">
            <img src="img/logo2.png" alt="TerasKreasi" title="TerasKreasi"/>
        </div>
        <form class="form-horizontal" action="cek_login.php" method="POST">            
            <div class="control-group">
                <label for="inputEmail">Username</label>                
                <input type="text" name="username"id="inputEmail"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" name="password" id="inputPassword"/>                
            </div>
      
            <div class="form-actions">
                <button type="submit" class="btn btn-block"><b>SIGN IN</b></button>
            </div>
        </form>        
        
    </div>    
    
</body>
</html>
