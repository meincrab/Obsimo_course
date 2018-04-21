<?php //require_once("config.php");?>
<?php
  session_start();
  date_default_timezone_set("Europe/Helsinki");
  if(!isset($_SESSION['login_user'])) {

    header ("Location: ../login.php"); }
    else {


      $courses = htmlspecialchars($_POST['pickedCourses']);
      $kayttaja = $_SESSION['login_user'];
      echo ($_SESSION['login_user']);
      echo ($kayttaja);
      echo ($courses);
      $courses = explode(",", $courses);
      $i = 0;
      foreach ($courses as &$value){
        echo ($courses[$i]);
        $i ++;
      }

}
?>
