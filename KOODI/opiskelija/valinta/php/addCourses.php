<?php
  session_start();
  require_once("config.php");
  date_default_timezone_set("Europe/Helsinki");
  if(!isset($_SESSION['login_user'])) {

    header ("Location: ../login.php"); }
    else {


      $courses = htmlspecialchars($_POST['pickedCourses']);
      $kayttaja = $_SESSION['login_user'];
      //echo ($kayttaja);
      $courses = explode(",", $courses);
    /*  foreach ($courses as $value) {
        echo ($value);
      }*/

      $query = mysqli_query($db, "SELECT * FROM ValitutJaksot WHERE idTunnus='$kayttaja'");
      $numOfRows = mysqli_num_rows($query);
      //echo $numOfRows;
      if ($numOfRows != 0) {
        $mySqlDel = "DELETE FROM ValitutJaksot WHERE idTunnus = '$kayttaja'";
        mysqli_query($db, $mySqlDel);
      }
        foreach ($courses as $value) {
        $mySqlC = "INSERT INTO ValitutJaksot(idTunnus, idKurssi)
        VALUES('$kayttaja','$value')";
        $result = mysqli_query($db, $mySqlC);
      }
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Suunnitelma luotu')
        </SCRIPT>");
      header('Location: ../../opiskelija.php');
}
?>
