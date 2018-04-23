<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
require_once("config.php");
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION['login_user'])) {

    header ("Location: ../login.php"); }
    else {
      $pickCourse = htmlspecialchars($_POST['pickedCourses']);
      $pickCourse = substr($pickCourse, 0, -1);
      $pickCourses = explode(',', $pickCourse);
      //echo count($pickCourses);
	  if ( htmlspecialchars($_POST['suuntautuminen']) = 'Kyberturvallisuus') {
	  $suuntautuminen = 1; 
	  }
	  if ( htmlspecialchars($_POST['suuntautuminen']) = 'Mediatekniikka') {
	  $suuntautuminen = 2; 
	  }
	  if ( htmlspecialchars($_POST['suuntautuminen']) = 'Ohjelmistotekniikka') {
	  $suuntautuminen = 3; 
	  }
	  if ( htmlspecialchars($_POST['suuntautuminen']) = 'Tietoverkkotekniikka') {
	  $suuntautuminen = 5; 
	  }
      $kayttaja = $_SESSION['login_user'];
      //echo ($kayttaja);
	  // pitää korjata
	  $palaute = htmlspecialchars($_POST['palaute']);
      //
      $query = mysqli_query($db, "SELECT * FROM Suositus WHERE idYritys='$kayttaja'");
      $numOfRows = mysqli_num_rows($query);
      //echo $numOfRows;
      if ($numOfRows != 0) {
        $mySqlDel = "DELETE FROM Suositus WHERE idYritys = '$kayttaja'";
        mysqli_query($db, $mySqlDel);
      }
        $i = 0;
        foreach ($pickCourses as $value) {
        $mySqlC = "INSERT INTO Suositus(idYritys, idKurssi, idKurssiryhmä)
        VALUES('$kayttaja','$value','$suuntautuminen')";
        $result = mysqli_query($db, $mySqlC);
        $i++;
      }
	  $mySqlC = "INSERT INTO Yritys(Palaute)
        VALUES('$palaute')";
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Suunnitelma luotu')
        </SCRIPT>");
      header('Location: ../../yritys.php');

    }
?>
