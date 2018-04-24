<?php
require_once("config.php");
date_default_timezone_set("Europe/Helsinki");

$username = $_POST['nimi'];
$token = sha1(uniqid($username, true)); 

/*
$query = "INSERT INTO pending_users (username, token, tstamp) VALUES (?,?,FROM_UNIXTIME(?))";
$stmt = $mysqli->prepare($query);     
$stmt = $stmt->bind_param("ss", $username, $token, $_SERVER['REQUEST_TIME']);
$stmt->execute();

if (!$result) {
$message  = 'Invalid query: ' . mysql_error() . "\n";
$message .= 'Whole query: ' . $query;
die($message);
} 
*/
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

$url = "http://167.99.85.3/gg/KOODI/yritys/yritys.php?token=$token";
echo "<script type='text/javascript'>alert('$url');</script>";
?>