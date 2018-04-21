<?php
session_start();

?>

<!DOCTYPE html>
<html>

   <head>
       <meta charset="UTF-8">
       <title>OBSIMO | Etusivu</title>
       <link rel="stylesheet" href="../css/style.css" />    
   </head>
    
    <body>
        <form action = "opettaja.php" method = "post">
        <div id="wrapper" class="clearfix box">
            <!-- Logo -->
            <h1 id="logo" class="grid_1">OBSIMO OPETTAJAN SIVUT</h1>     
            <div class="hr grid_3 clearfix">&nbsp;</div>
				<form method="post" action="luoUrl.php">
						<h2>Tiedot</h2>
						<p>
							Yrityksen nimi: <input type="text" size="40" name="nimi"><br>
						</p>    
						<p>
							<input type="submit" name="generate_url" value="Generoi URL">
						</p>
				</form>
            
		  <!-- Footer -->
            <div class="hr grid_3 clearfix" style="margin-top: 60%">&nbsp;</div>
			
		  <p class="grid_3 footer clearfix">
			<span class="float"><b>&copy; Copyright</b> Ryhmä GG 2018. Kaikki oikeudet pidätetään.</span>
			<a class="float right" href="#">Top</a>
		  </p>    
            
            
            
        </div>
        
        
        </form>  
    </body>


</html>

<?php

if ($_POST['action'] == "Submit Form") {
    $_SESSION['user'] = '';
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "../index.html");
}

?>
