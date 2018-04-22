<?php
	require_once("config.php");
	if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
    } else {
	$username = $_POST['nimi'];
	$token = sha1(uniqid($username, true));
	$query = $mysqli->prepare(
		"INSERT INTO pending_users (username, token, tstamp) VALUES (?, ?, ?)"
	);
	$query->bind_params($username, $token, $_SERVER["REQUEST_TIME"] )
	$query->execute();
	
	$url = "http://167.99.85.3/gg/KOODI/yritys/yritys.php?token=$token";
	echo "<script type='text/javascript'>alert('$url');</script
	}
?>