<?php
session_start();
echo "<meta charset='UTF-8'>";
include("../config.php");
$courses = [];
$lukukaudet = array("Syksy 1", "Kevät 1", "Syksy 2", "Kevät 2", "Syksy 3", "Kevät 3", "Syksy 4", "Kevät 4");
$q = $_REQUEST["q"];
$_SESSION['q'] = $q;

/*$sql = <<<SQLEND
   SELECT OpettajanPalaute FROM Opiskelija WHERE idTunnus = '$q';
SQLEND;
    $result = mysqli_query($db, $sql3);
    $row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);*/
    echo "<form action = 'opintosuunnitelmat.php' method='post'>";
    echo "<h1> Valitut kurssit: </h1>";
    for($i = 0; $i < 8; $i++)
    {
        $sql = <<<SQLEND
        SELECT Nimi, Opintopisteet from Kurssi INNER JOIN ValitutJaksot ON Kurssi.idKurssi=ValitutJaksot.idKurssi
        INNER JOIN Opiskelija On ValitutJaksot.idTunnus=Opiskelija.idTunnus WHERE Opiskelija.idTunnus = '$q' AND lukukausi = '$lukukaudet[$i]';
SQLEND;
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        echo "<h3>$lukukaudet[$i]</h3><hr>";
        if ($count == 0) echo "<p>Kursseja ei ole valittu</p>";
        else {
            echo "<table id='t_courses'><tr><th>Courses</th><th>Points</th></tr>";
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            echo "<tr><td>{$row['Nimi']}</td><td>{$row['Opintopisteet']}</td></tr>";
            }
            $sql2 = <<<SQLEND
            SELECT sum(Opintopisteet) FROM Kurssi INNER JOIN ValitutJaksot WHERE Kurssi.idKurssi=ValitutJaksot.idKurssi AND idTunnus = '$q' AND lukukausi = '$lukukaudet[$i]';
SQLEND;
            $result2 = mysqli_query($db, $sql2);
            $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
            echo "<tr><td><b>Opintopisteet yhdeessä</b></td><td><b>{$row['sum(Opintopisteet)']}</b></td></table>";    
        }
        echo "</table>";
    }
    //$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    //echo "<tr><td><b>Opintopisteet yhdeessä</b></td><td><b>{$row['sum(Opintopisteet)']}</b></td></table>";
    $sql = <<<SQLEND
        SELECT sum(Opintopisteet) FROM Kurssi INNER JOIN ValitutJaksot WHERE Kurssi.idKurssi=ValitutJaksot.idKurssi AND idTunnus = '$q';
SQLEND;
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo "<hr><p><b>Opintopisteet yhdeessä:</b> {$row['sum(Opintopisteet)']} </p>";
    echo "<hr><h3>Kirjoita palaute:</h3>";
    echo "<textarea cols='30' rows='4' name='feedback'></textarea><br>";
    echo "<input type='submit' name='save' value='Talenna'>";
    

    echo "</form>";


?>