
<?php
// If your page calls session_start() be sure to include jcart.php first
error_reporting(0);
include_once('../jcart/jcart.php');
session_start();
require_once("../config.php");
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION['login_user'])) {

header ("Location: ../login.php"); }
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<title>Obsimo</title>

		<link rel="stylesheet" type="text/css" media="screen, projection" href="style.css" />

		<link rel="stylesheet" type="text/css" media="screen, projection" href="../jcart/css/jcart.css" />
	</head>
	<body>
		<div id="welcome">
		Welcome: user, <span><?php echo $_SESSION['login_user'] ?> </span> to coursecart. The time is  <?php echo date('h:i:sa'); ?>
		<a href="../logout.php">&ensp; Logout</a>
		</div>
		<div id="wrapper">
			<h2>Checkout</h2>

			<div id="sidebar">
			</div>

			<div id="content">
				<div id="jcart"><?php $jcart->display_cart();?></div>

				<p><a href="student.php">&larr; Go Back </a></p>

				<?php
				function addCourses() {
					foreach ($item as $itemId) {
							 $mysqlrow = "INSERT INTO ValitutJaksot(idTunnus, idKurssi) VALUES('".$myusername."', '".$itemId['id']."')";
							 $q = mysqli_query($db, $mysqlrow) or die (mysqli_error());
							 }
				}

				if(isset($_POST['submit']))
				{
   					addCourses();
				}
				?>
			</div>


			<div class="clear"></div>
		</div>

		<script type="text/javascript" src="../jcart/js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="../jcart/js/jcart.js"></script>
	</body>
</html>
<?php } ?>
