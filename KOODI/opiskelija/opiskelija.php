<?php
session_start();

<<<<<<< HEAD
=======
if ($_POST['action'] == "Submit Form") {
    $_SESSION['user'] = '';
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "../index.html");
}
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054

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
            
            <!-- Navigaatio -->
            <ul id="navigaatio" class="grid_2">
                
                <li><a href="palautukset.php"><span class="meta">Yrityksien palautukset</span><br />Palautukset</a></li>
                <li><a href="opintosuunnitelmat.php"><span class="meta">Opiskelijoiden opintosuunnitelmat</span><br />Opintosuunnitelmat</a></li>
                <li><a href="opettaja.php" class="current"><span class="meta">Kotisivu</span><br />Alku</a></li>
            </ul>
                      
            <div class="hr grid_3">&nbsp;</div>
            <div class="clear"></div>
            
         
            
            <!-- Otsikko -->
            <h2 class="grid_3 otsikko clearfix">Tevetuloa <span>OBSIMO</span> palveluun!</h2>
        
            
            
            <div class="hr grid_3 clearfix quicknavhr">&nbsp;</div>
        
            <!-- Pikalinkit -->
            <div id="quicknav" class="grid_3">
                <div class="hr grid_3 clearfix quicknavhr" style="margin-left: auto">&nbsp;</div>
                

			<a class="quicknavgrid_4 quicknav" href="opintosuunnitelmat.php">
					<h4 class="title ">Opiskelijan seuranta</h4>
					<p>Tästä saat kaikkien opiskelijoiden opintosuunnitelmien tiedot</p>
					<p style="text-align:center;"><img alt="students" src="../images/students.png" /></p>
				
			</a>
			<a class="quicknavgrid_4 quicknav" href="palautukset.php">
					<h4 class="title ">Yrityksen seuranta</h4>
					<p>Tästä saat kaikkien yrityksien palautuksien tiedot</p>
					<p style="text-align:center;"><img alt="yrutykset" src="../images/yritykset.png" /></p>
				
			</a>
            <a class="quicknavgrid_4 quicknav" href="palautukset.php">
                <h4 class="title ">Kirjaituminen ulos</h4>
				<p>Tästä voit kirjaitua ulos</p>
                 <input type="image" name="logout" src="../images/logout.png">
                 <input type="hidden" name="action" value="Submit Form">
			</a>
            </div>
        
        
        
            <div class="hr grid_3 clearfix">&nbsp;</div>
            
            
		  <!-- Footer -->
            <div class="hr grid_3 clearfix" style="margin-top: 60%">&nbsp;</div>
		  <p class="grid_3 footer clearfix">
			<span class="float"><b>&copy; Copyright</b> Ryhmä GG 2018. Kaikki oikeudet pidätetään.</span>
			<a class="float right" href="#">Top</a>
		  </p>    
            
            
            
        </div>
        
        
        </form>  
    </body>


<<<<<<< HEAD
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
=======
</html>
>>>>>>> 796828ecc401f370682b0fcb934b3e885ef77054
