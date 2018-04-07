
<?php

// If your page calls session_start() be sure to include jcart.php first
include_once('../jcart/jcart.php');
error_reporting(0);
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
  <?php
  // If your page calls session_start() be sure to include jcart.php first

  ?>

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
