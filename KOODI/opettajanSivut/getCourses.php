<?php
session_start();
echo "<meta charset='UTF-8'>";
include("../config.php");
$courses = [];
$q = $_REQUEST["q"];
$_SESSION['q'] = $q;

$sql = <<<SQLEND
   SELECT Nimi, Opintopisteet from Kurssi INNER JOIN ValitutJaksot ON Kurssi.idKurssi=ValitutJaksot.idKurssi
   INNER JOIN Opiskelija On ValitutJaksot.idTunnus=Opiskelija.idTunnus WHERE Opiskelija.idTunnus = '$q';
SQLEND;

$sql2 = <<<SQLEND
   SELECT sum(Opintopisteet) FROM Kurssi INNER JOIN ValitutJaksot WHERE Kurssi.idKurssi=ValitutJaksot.idKurssi AND idTunnus = '$q';
SQLEND;

$sql3 = <<<SQLEND
   SELECT OpettajanPalaute FROM Opiskelija WHERE idTunnus = '$q';
SQLEND;

    $result = mysqli_query($db, $sql);
    $result2 = mysqli_query($db, $sql2);
    $result3 = mysqli_query($db, $sql3);
    $row1 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
    echo "<form action = 'opintosuunnitelmat.php' method='post'>";
    echo "<h1> Valitut kurssit: </h1>";
    $count = mysqli_num_rows($result);
    if ($count == 0)
    {
        echo "Ei ole kursseja.";
    }
    else 
    {
        echo "<table id='t_courses'><tr><th>Courses</th><th>Points</th></tr>";
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            echo "<tr><td>{$row['Nimi']}</td><td>{$row['Opintopisteet']}</td></tr>";
        }
        $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        echo "<tr><td><b>Opintopisteet yhdeessä</b></td><td><b>{$row['sum(Opintopisteet)']}</b></td></table>";
        echo "<p>Kirjoita palaute:</p>";
        echo "<textarea cols='30' rows='4' name='feedback'></textarea><br>";
        echo "<input type='submit' name='save' value='Talenna'>";
    }
    

    echo "</form>";


?>