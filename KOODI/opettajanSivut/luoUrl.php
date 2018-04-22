<?php
	require_once("config.php");
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	date_default_timezone_set("Europe/Helsinki");
	$username = $_POST['nimi'];
	$token = sha1(uniqid($username, true));
	$timestamp = time();
	$stmt = $mysqli->prepare(
		"INSERT INTO pending_users (username, token, tstamp) VALUES (?, ?, ?)"
	);
	$stmt->bind_params($username, $token, $timestamp );
	$stmt->execute();
	
	$url = "http://167.99.85.3/gg/KOODI/yritys/yritys.php?token=$token";
	echo "<script type='text/javascript'>alert('$url');</script>";
?>