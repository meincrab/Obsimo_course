
<?php
// If your page calls session_start() be sure to include jcart.php first
/*error_reporting(0);
session_start();
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION['login_user'])) {

header ("Location: ../login.php"); }
else {*/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      obsimo
    </title>
    <link rel="stylesheet" type="text/css" href="../css/student.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
  </head>
  <body>


<div class="nav w3-row courses">

  <div class = "w3-col m3 l3">

    <table class="w3-table w3-col m3 l3">
      <thead>
        <tr class="w3-light-grey">
          <th>IDLalka</th>
          <th>Nimi</th>
          <th>Pisteet</th>
        </tr>
      </thead>
    </table>
  <div class="table">
    </div>
    <div class="total">
      <div class="totalPoints">

      </div>
      <div class="submit">
        <form id="dataToPhp" name="dataToPhp" method="post" action="../valinta/php/addCourses.php">
        <input type="hidden" name="pickedCourses" id="pickedCourses" value="">
        <a href="#" onclick="setValue();">Click to submit</a>
      </form>
      </div>
    </div>
  </div>

  <div class = "w3-col m3 l3">
    <div class="mandatory yht"></div>
  </div>

<div class = "w3-col m3 l3">
    <div class="optional yht"></div>
</div>

<div class = "w3-col m3 l3">
    <div class="modules yht"></div>
</div>



</div>





    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/kurssit.js"></script>

  </body>
</html>
<?php //} ?>
