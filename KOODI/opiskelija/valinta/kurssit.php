
<?php
// If your page calls session_start() be sure to include jcart.php first
error_reporting(0);
session_start();
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION['login_user'])) {

header ("Location: ../login.php"); }
else {
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      OBSIMO
    </title>
    <link rel="stylesheet" type="text/css" href="../css/student.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
  </head>
  <body>
    <nav>
      <div id="welcome">
      Welcome: user, <span><?php echo $_SESSION['login_user'] ?> </span> to assignment schedule. The time is <?php echo date('h:i:sa'); ?>
      <a href="../logout.php">Logout</a>
      </div>
    </nav>

<div class="nav w3-row courses">

  <div class = "w3-col m3 l3">

    <table class="w3-table-all w3-centered w3-col m3 l3" id="tableName">
      <thead>
        <tr class="w3-light-grey">
          <th>ID</th>
          <th>Nimi</th>
          <th>Pisteet</th>
          <th>Lukukausi</th>
        </tr>
      </thead>
    </table>
  <div class="table">
    <table class="w3-table w3-striped w3-col m3 l3" id="table">
    </table>
  </div>
    <div class="total">
      <div class="totalPoints">

      </div>
      <div class="submit">
        <form id="dataToPhp" name="dataToPhp" method="post" action="../valinta/php/addCourses.php">
        <input type="hidden" name="pickedCourses" id="pickedCourses" value="">
        <input type="hidden" name="pickedLukukaudet" id="pickedLukukaudet" value="">
        <a href="#" onclick="setValue();" id="kurssienLisays">Lisää kurssit</a>
      </form>
      </div>
    </div>
  </div>

  <div class = "w3-col m3 l3">
    <h2>Perusopinnot</h2>
    <div class="mandatory yht"></div>
  </div>

<div class = "w3-col m3 l3">
    <h2>Ydinopinnot</h2>
    <div class="optional yht"></div>
</div>

<div class = "w3-col m3 l3">
    <h2>Valinnaiset</h2>
    <div class="modules yht"></div>
</div>



</div>





    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/kurssit.js"></script>

  </body>
</html>
<?php } ?>
