
<?php
// If your page calls session_start() be sure to include jcart.php first
error_reporting(0);
include_once('../jcart/jcart.php');
session_start();
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION['login_user'])) {

header ("Location: ../login.php"); }
else {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../scripts/student.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/student.css">
<link rel="stylesheet" type="text/css" href="../styles/w3.css">
</head>

<body>
<div id="welcome">
Welcome: user, <span><?php echo $_SESSION['login_user'] ?> </span> to coursecart. The time is <?php echo date('h:i:sa'); ?>
<a href="../logout.php">&ensp; Logout</a>
</div>
<div class="nav w3-row">
  <div class = "w3-col m3 l3">
    <p></p>
  </div>
  <div class = "w3-col m3 l3">
    <p>Perusopinnot</p>
  </div>
  <div class = "w3-col m3 l3">
    <p>Pakolliset</p>
  </div>
  <div class = "w3-col m3 l3">
    <p>Valinnaiset</p>
  </div>
</div>
<div class="courses w3-row">
  <div class = "leftDiv w3-col m3 l3">
  <div id="jcart"><?php $jcart->display_cart();?></div>
  <div class="courseCart">Hell World</div>
  <div class="firms">OOO Roga And Kopyta</div>
  </div>
  <div class = "mandatory w3-col m3 l3"></div>
  <div class = "optional w3-col m4 l3"></div>
  <div class = "modules w3-col m4 l3"></div>
</div>

</body>

</html>
<?php } ?>
