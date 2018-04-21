<?php
	require_once("../config.php");
	$username = $_POST['nimi'];
	$token = sha1(uniqid($username, true));
	$stmt = $db->prepare("INSERT INTO pending_users (username,token,tstamp) VALUES (:fi,:f2,NOW())");
	$stmt->execute(array(':f1' => $username, ':f2' => $token));
	
	$url = "http://167.99.85.3/gg/KOODI/yritys.php?token=$token";
	echo '<script language="javascript">';
    echo 'alert(" ' $url ' ")';
    echo '</script>';
	
?>