<?php
echo "<meta charset='UTF-8'>";
include("../config.php");
$q = $_REQUEST["q"];

$sql = <<<SQLEND
   Select idTunnus, Etunimi, Sukunimi from Opiskelija INNER JOIN Kurssiryhma where Opiskelija.idKurssiryhma=Kurssiryhma.idKurssiryhma AND Kurssiryhma.Nimi = '$q';
SQLEND;

    $result = mysqli_query($db, $sql);
    echo "<h2> Students: </h2>";
    echo "<table>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr><td><a onClick=showCourses('{$row['idTunnus']}') href='#'> {$row['idTunnus']} </a></td></tr>";
    }
    echo "</table>";
?>