<?php
  session_start();
  require_once("../config.php");
  date_default_timezone_set("Europe/Helsinki");
  if(!isset($_SESSION['login_user'])) {

    header ("Location: ../login.php"); }
    else {

      $pickCourse = htmlspecialchars($_POST['pickedCourses']);
      $pickCourse = substr($pickCourse, 0, -1);
      $pickCourses = explode(',', $pickCourse);
      echo count($pickCourses);
	  
      $kayttaja = $_SESSION['login_user'];
      //echo ($kayttaja);
	  
	  // $palaute = htmlspecialchars($_POST['palaute']);

      $query = mysqli_query($db, "SELECT * FROM Suositus WHERE test='$kayttaja'");
      $numOfRows = mysqli_num_rows($query);
      //echo $numOfRows;
      if ($numOfRows != 0) {
        $mySqlDel = "DELETE FROM Suositus WHERE test = '$kayttaja'";
        mysqli_query($db, $mySqlDel);
      }
        $i = 0;
        foreach ($pickCourses as $value) {
        $mySqlC = "INSERT INTO Suositus(test, idKurssi)
        VALUES('$kayttaja','$value')";
        $result = mysqli_query($db, $mySqlC);
        $i++;
      }
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Suunnitelma luotu')
        </SCRIPT>");
      header('Location: ../../yritys.php');

    }
?>
