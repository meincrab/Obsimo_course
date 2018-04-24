<?php
echo "<meta charset='UTF-8'>";
include("../config.php");
$courses = [];
$q = $_REQUEST["q"];

$sql = <<<SQLEND
   SELECT Kurssi.Nimi, Opintopisteet from Kurssi INNER JOIN Suositus ON Kurssi.idKurssi=Suositus.idKurssi
   INNER JOIN Yritys On Suositus.idYritys=Yritys.idYritys WHERE Yritys.idYritys= '$q';
SQLEND;

$sql2 = <<<SQLEND
   SELECT sum(Opintopisteet) FROM Kurssi INNER JOIN Suositus WHERE Kurssi.idKurssi=Suositus.idKurssi AND idYritys = '$q';
SQLEND;

$sql3 = <<<SQLEND
   SELECT Palaute FROM Yritys WHERE idYritys = '$q';
SQLEND;

    $result = mysqli_query($db, $sql);
    $result2 = mysqli_query($db, $sql2);
    $result3 = mysqli_query($db, $sql3);
    echo "<h1> Kurssit: </h1>";
    echo "<table id='t_courses'>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr><td>{$row['Nimi']}</td><td>{$row['Opintopisteet']}</td></tr>";
    }
    $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    echo "<tr><td><b> Opintopisteet yhdeessä </b></td><td> {$row['sum(Opintopisteet)']} </td></tr>";
    echo "</table><hr>";
    
    $row = mysqli_fetch_array($result3,MYSQLI_ASSOC);
    echo "<p><b> Palaute:</b> {$row['Palaute']} </p>";
?>