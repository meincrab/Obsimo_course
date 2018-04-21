<?php
<<<<<<< HEAD
   include("config.php");
=======
   include("../config.php");
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054
   session_start();
   $error = '';

   if($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT idTunnus, HashSalasana FROM Opiskelija WHERE idTunnus = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1 AND password_verify ($mypassword, $row['HashSalasana'])) {
         $_SESSION['login_user'] = $myusername;

         header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "pages/student.php");
=======
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT idTunnus, HashSalasana FROM Opiskelija WHERE idTunnus = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 AND password_verify ($mypassword, $row['HashSalasana'])) {
         $_SESSION['login_user'] = $myusername;
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054
         
         $error = "works!";
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<<<<<<< HEAD

   <head>
      <title>Login Page</title>

=======
   
   <head>
      <title>Login Page</title>
      
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054
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
<<<<<<< HEAD

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

=======
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
<<<<<<< HEAD

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>
=======
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054
