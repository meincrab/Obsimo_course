<?php
  session_start();
  require_once("config.php");
  date_default_timezone_set("Europe/Helsinki");
  if(!isset($_SESSION['login_user'])) {

    header ("Location: ../login.php"); }
    else {

      $pickCourse = htmlspecialchars($_POST['pickedCourses']);
      $pickCourse = substr($pickCourse, 0, -1);
      $pickCourses = explode(',', $pickCourse);
      echo count($pickCourses);


      $kaudet = htmlspecialchars($_POST['pickedLukukaudet']);
      $kaudet = substr($kaudet, 0, -1);
      $pickKaudet = explode(',', $kaudet);
      //echo ($kaudet);
      echo count($pickKaudet);
      $kayttaja = $_SESSION['login_user'];
      //echo ($kayttaja);



      $query = mysqli_query($db, "SELECT * FROM ValitutJaksot WHERE idTunnus='$kayttaja'");
      $numOfRows = mysqli_num_rows($query);
      //echo $numOfRows;
      if ($numOfRows != 0) {
        $mySqlDel = "DELETE FROM ValitutJaksot WHERE idTunnus = '$kayttaja'";
        mysqli_query($db, $mySqlDel);
      }
        $i = 0;
        foreach ($pickCourses as $value) {
        $mySqlC = "INSERT INTO ValitutJaksot(idTunnus, idKurssi, lukukausi)
        VALUES('$kayttaja','$value', '$pickKaudet[$i]')";
        $result = mysqli_query($db, $mySqlC);
        $i++;
      }
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Suunnitelma luotu')
        </SCRIPT>");
      header('Location: ../../opiskelija.php');

    }
?>
