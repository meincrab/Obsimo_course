
<?php

session_start();

$lukukaudet = array("Syksy 1", "Kevät 1", "Syksy 2", "Kevät 2", "Syksy 3", "Kevät 3", "Syksy 4", "Kevät 4");
echo "<meta charset='UTF-8'>";
include("../valinta/php/config.php");
$courses = [];
$q = $_SESSION['login_user'];
echo "<h1> Welcome $q </h1><div class='hr dotted clearfix' style='margin-top: -10px'>&nbsp;</div>";

echo "<h2> Valitut kurssit: </h2>";
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
    $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    //echo "<tr><td><b>Opintopisteet yhdeessä</b></td><td><b>{$row['sum(Opintopisteet)']}</b></td></table>";
    $sql = <<<SQLEND
        SELECT sum(Opintopisteet) FROM Kurssi INNER JOIN ValitutJaksot WHERE Kurssi.idKurssi=ValitutJaksot.idKurssi AND idTunnus = '$q';
SQLEND;
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo "<hr><p><b>Opintopisteet yhdeessä:</b> {$row['sum(Opintopisteet)']} </p>";
    
    $sql = <<<SQLEND
   SELECT OpettajanPalaute FROM Opiskelija WHERE idTunnus = '$q';
SQLEND;
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo "<div class='hr dotted clearfix' style='margin-top: -10px'>&nbsp;</div><h2> Opettajan palaute: </h2> <br><p>{$row['OpettajanPalaute']}</p>";

?>
