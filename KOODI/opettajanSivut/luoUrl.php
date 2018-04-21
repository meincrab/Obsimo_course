<?php
require_once("../config.php");
$username = $_POST['nimi'];
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
$url = "http://example.com/activate.php?token=$token";
echo "<script type='text/javascript'>alert('$url');</script>";
?>