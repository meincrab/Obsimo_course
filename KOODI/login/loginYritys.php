<?php
   include("../config.php");
   session_start();
   $error = '';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // testejä varten ei login varmistusta
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
         $_SESSION['login_user'] = $myusername;
         
         header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "../yritys/yritys.php");

   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Kirjautuminen opettajalle</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Tunnus:</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <input type = "submit" value = " Kirjaudu sisään "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
