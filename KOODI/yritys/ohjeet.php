<?php
session_start();

if ($_POST['action'] == "Submit Form") {
    $_SESSION['login_user'] = '';
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "../index.html");
}

?>

<!DOCTYPE html>
<html>

   <head>
       <meta charset="UTF-8">
       <title>OBSIMO | Käyttöohjeet</title>
       <link rel="stylesheet" href="../css/style.css" />
       
   </head>
    
    <body>
		<form action = "ohjeet.php" method = "post">
        <div id="wrapper" class="clearfix box">
            <!-- Logo -->
            <h1 id="logo" class="grid_1">OBSIMO KÄYTTÖOHJEET</h1>
            
            <!-- Navigaatio -->
            <ul id="navigaatio" class="grid_2">
			
			<li><a href="palautukset.php"><span class="meta">Poistu</span><br />Poistu</a></li>
			<li><a href="ohjeet.php" class="current"><span class="meta">Tarkemmat ohjeet</span><br />Ojeet</a></li>
			<li><a href="yritys.php"><span class="meta">Kotisivu</span><br />Alku</a></li>
           
			</ul>
                      
            <div class="hr grid_3">&nbsp;</div>
            <div class="clear"></div>
              
            <!-- Otsikko --> 
           
            <div class="hr grid_3 clearfix quicknavhr">&nbsp;</div>
        
             <div class="grid_3" style="margin-top: 50px">
                <h2>Toimi näin</h2>
                <div class="hr dotted clearfix" style="margin-top: -10px">&nbsp;</div>
            </div>
            
             
		  <!-- Footer -->
            <div class="hr grid_3 clearfix" style="margin-top: 75%">&nbsp;</div>
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
    $_SESSION['login_user'] = '';
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "../index.html");
}

?>