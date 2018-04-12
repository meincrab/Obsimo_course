<?php
include("config.php");
session_start();
$user = $_SESSION['user'];
$groups = [];


//printing result of sql request
function printGroups($db, $user) {
     $sql = <<<SQLEND
   SELECT Nimi from Kurssiryhma 
   INNER JOIN OpettajaKurssiryhma ON Kurssiryhma.idKurssiryhma = OpettajaKurssiryhma.idKurssiryhma 
   INNER JOIN Opettaja ON OpettajaKurssiryhma.idOpettaja=Opettaja.idOpettaja AND Opettaja.idOpettaja = '$user'
SQLEND;

    $result = mysqli_query($db, $sql);
    echo "<table>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr><td><a href='#' onClick=showStudents('{$row['Nimi']}')> {$row['Nimi']} </a></td></tr>";
    }
    echo "</table>";
}

?>

<script>
function showStudents(d) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("groups").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getStudents.php?q="+d, true);
    xmlhttp.send();
}
    
function showCourses(d) {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("courses").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "getCourses.php?q="+d, true);
xmlhttp.send();
}
</script>

<!DOCTYPE html>
<html>
   <head>
       <meta charset="UTF-8">
       <title>OBSIMO | Opiskelijoiden opintosuunnitelmat</title>
       <link rel="stylesheet" href="css/style.css" />    
   </head>
    
    <body>
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
            <h2 class="grid_3 otsikko clearfix">OPISKELIJOIDEN OPINTOSUUNNITELMAT SEURANTA</h2>
        
            
            
            <div class="hr grid_3 clearfix quicknavhr">&nbsp;</div>
        
            <div class="grid_3" style="margin-top: 50px">
                <h2>RYHMÄT</h2>
                <div class="hr dotted clearfix" style="margin-top: -10px">&nbsp;</div>
            </div>
            
            <div id="quicknav" class="grid_3">
                <?php
                    printGroups($db, $user);
                ?>
            </div>
            <div id="groups" class="grid_3">
            </div>
            <div id="courses" class="grid_3">
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