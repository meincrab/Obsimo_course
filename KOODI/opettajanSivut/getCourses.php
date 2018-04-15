<?php
echo "<meta charset='UTF-8'>";
include("../config.php");
$courses = [];
$q = $_REQUEST["q"];

$sql = <<<SQLEND
   SELECT Nimi, Opintopisteet from Kurssi INNER JOIN ValitutJaksot ON Kurssi.idKurssi=ValitutJaksot.idKurssi
   INNER JOIN Opiskelija On ValitutJaksot.idTunnus=Opiskelija.idTunnus WHERE Opiskelija.idTunnus = '$q';
SQLEND;

$sql2 = <<<SQLEND
   SELECT sum(Opintopisteet) FROM Kurssi INNER JOIN ValitutJaksot WHERE Kurssi.idKurssi=ValitutJaksot.idKurssi AND idTunnus = '$q';
SQLEND;

    $result = mysqli_query($db, $sql);
    $result2 = mysqli_query($db, $sql2);
    echo "<h2> Kurssit: </h2>";
    echo "<table>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr><td>{$row['Nimi']}</td><td>{$row['Opintopisteet']}</td></tr>";
    }
    echo "</table>";
    $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    echo "<p> Opintopisteet yhdeessä: {$row['sum(Opintopisteet)']} </p>";
?>