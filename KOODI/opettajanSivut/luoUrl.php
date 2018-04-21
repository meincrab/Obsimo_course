<?php
	include("../config.php");
	$username = $_POST['nimi']
	$token = sha1(uniqid($username, true));
	$query = $db->prepare(
		"INSERT INTO pending_users (username, token, tstamp) VALUES (?, ?, ?)"
	);
		$query->execute(
		array(
			$username,
			$token,
			$_SERVER["REQUEST_TIME"]
		)
	);
	$url = "http://167.99.85.3/gg/KOODI/yritys.php?token=$token";
	echo "<h2>" . $url; . "</h2>";
	
?>