<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
require_once("config.php");
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION['login_user'])) {

    header ("Location: ..../index.html"); }
    else {
      $pickCourse = htmlspecialchars($_POST['pickedCourses']);
      $pickCourse = substr($pickCourse, 0, -1);
      $pickCourses = explode(',', $pickCourse);
      //echo count($pickCourses);
      $kayttaja = $_SESSION['login_user'];
	  $palaute = htmlspecialchars($_POST['palaute']);
      $suuntautuminen = htmlspecialchars($_POST['suuntautuminen']);
        
	  $query = mysqli_query($db, "SELECT Palaute FROM Yritys WHERE idYritys='$kayttaja'");
	  $numOfRows = mysqli_num_rows($query);
	  if ($numOfRows != 0) {
        $mySqlDel = "DELETE Palaute FROM Yritys WHERE idYritys = '$kayttaja'";
        mysqli_query($db, $mySqlDel);
      }
      $mySqlC = "UPDATE Yritys SET Palaute = '$palaute' WHERE idYritys = '$kayttaja'";
      mysqli_query($db, $mySqlC);
	  
      $query = mysqli_query($db, "SELECT * FROM Suositus WHERE idYritys='$kayttaja'");
      $numOfRows = mysqli_num_rows($query);
      //echo $numOfRows;
      if ($numOfRows != 0) {
        $mySqlDel = "DELETE FROM Suositus WHERE idYritys = '$kayttaja'";
        mysqli_query($db, $mySqlDel);
      }
        $i = 0;
        foreach ($pickCourses as $value) {
        $mySqlC = "INSERT INTO Suositus(idYritys, idKurssi, Kurssiryhma)
        VALUES('$kayttaja','$value','$suuntautuminen')";
        $result = mysqli_query($db, $mySqlC);
        $i++;
      }
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Suunnitelma luotu')
        </SCRIPT>");
      header('Location: ../../yritys.php');

    }
?>
