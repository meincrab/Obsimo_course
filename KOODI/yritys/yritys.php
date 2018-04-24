<?php
session_start();

if ($_POST['action'] == "Submit Form") {
    $_SESSION['login_user'] = '';
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . ".../index.html");
}

?>

<!DOCTYPE html>
<html>

   <head>
       <meta charset="UTF-8">
       <title>OBSIMO</title>
       <link rel="stylesheet" href="../css/style.css" />
    </head>

    <body>
        <form action = "yritys.php" method = "post">
        <div id="wrapper" class="clearfix box">
            <!-- Logo -->
			<h1 id="logo" class="grid_1">OBSIMO YRITYKSEN SIVUT</h1>
			
			<!-- nav -->
			<ul id="navigaatio" class="grid_2">
				
				<li><a href="../index.html"><span class="meta">Poistu</span><br />Poistu</a></li>
				<li><a href="ohjeet.php"><span class="meta">Tarkemmat ohjeet</span><br />Ojeet</a></li>
				<li><a href="yritys.php" class="current"><span class="meta">Kotisivu</span><br />Alku</a></li>
			   
			</ul>
		
			
			<div class="hr grid_3">&nbsp;</div>
			<div class="clear"></div>


            <!-- Otsikko -->
           
            <p class="grid_3">TÄHÄN KUVAUS PALVELUSTA JA PERUS KÄYTTÖOHJEET</p>
            
            <div class="hr grid_3 clearfix quicknavhr">&nbsp;</div>

            <!-- Pikalinkit -->
            <div id="quicknav" class="grid_3">
                <div class="hr grid_3 clearfix quicknavhr" style="margin-left: auto">&nbsp;</div>


			<a class="quicknavgrid_4 quicknav" href="valinta/kurssit.php">
					<h4 class="title ">Aloita kurssien valinta</h4>
					<p>Siirry valitsemaan kursseja</p>
					<p style="text-align:center;"><img alt="students" src="../images/students.png" /></p>

			</a>
			<a class="quicknavgrid_4 quicknav" href="ohjeet.php">
					<h4 class="title ">Käyttöohjeet</h4>
					<p>Lue tarkennetut käyttöohjeet</p>
					<p style="text-align:center;"><img alt="yrutykset" src="../images/yritykset.png" /></p>

			</a>
            <a class="quicknavgrid_4 quicknav" href="palautukset.php">
                <h4 class="title ">Placeholder</h4>
				         <p>Placeholder</p>
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
