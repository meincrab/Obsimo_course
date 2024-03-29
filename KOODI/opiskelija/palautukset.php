<?php
include("../config.php");
session_start();
$groups = [];


//printing result of sql request
function printFirms($db) {
     $sql = <<<SQLEND
    SELECT Nimi, idYritys from Yritys 
SQLEND;

    $result = mysqli_query($db, $sql);
    echo "<table>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr><td><a href='#' onClick=showFeedbacks('{$row['idYritys']}')> {$row['Nimi']} </a></td></tr>";
    }
    echo "</table>";
}

?>

<script>
function showFeedbacks(d) {
    console.log(d);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("feedback").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getFeedback.php?q="+d, true);
    xmlhttp.send();
}

</script>

<!DOCTYPE html>
<html>

   <head>
       <meta charset="UTF-8">
       <title>OBSIMO | Yrityksien palautukset</title>
       <link rel="stylesheet" href="../css/style.css" />
       
     
       
   </head>
    
    <body>
        <div id="wrapper" class="clearfix box">
            <!-- Logo -->
            <h1 id="logo" class="grid_1">OBSIMO OPETTAJAN SIVUT</h1>
            
            <!-- Navigaatio -->
            <ul id="navigaatio" class="grid_2">
                
                <li><a href="palautukset.php"><span class="meta">Yrityksien palautukset</span><br />Palautukset</a></li>
                <li><a href="valitut/opintosuunnitelma.php"><span class="meta">Opiskelijoiden opintosuunnitelmat</span><br />Opintosuunnitelmat</a></li>
                <li><a href="opiskelija.php" class="current"><span class="meta">Kotisivu</span><br />Alku</a></li>
            </ul>
                      
            <div class="hr grid_3">&nbsp;</div>
            <div class="clear"></div>
            
         
            
            <!-- Otsikko --> 
            <h2 class="grid_3 otsikko clearfix">YRITYKSIEN PALAUTUKSET SEURANTA</h2>
        
            
            
            <div class="hr grid_3 clearfix quicknavhr">&nbsp;</div>
        
             <div class="grid_3" style="margin-top: 50px">
                <div class="hr dotted clearfix" style="margin-top: -10px">&nbsp;</div>
            </div>
            
            <div id="quicknav" class="grid_3">
                <div id="groups" class="grid_4">
                    <h1> Yritykset: </h1>
                    <?php
                        printFirms($db);
                    ?>
                </div>
                <div id="feedback" class="grid_php" style="margin-left:100px">
                </div>
            </div>
			
            
		  <!-- Footer -->
            <div class="hr grid_3 clearfix" style="margin-top: 75%">&nbsp;</div>
		  <p class="grid_3 footer clearfix">
			<span class="float"><b>&copy; Copyright</b> Ryhmä GG 2018. Kaikki oikeudet pidätetään.</span>
			<a class="float right" href="#">Top</a>
		  </p>    
            
            
            
        </div>
        
        
        
    </body>


</html>

<?php

if ($_POST['action'] == "Submit Form") {
    header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "opettaja.php");
}

?>