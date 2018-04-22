<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once("config.php");
date_default_timezone_set("Europe/Helsinki");
$query = "INSERT INTO pending_users (username, token, tstamp) VALUES (?,?,?)";
$stmt = $db->prepare($query);
        
$stmt->bind_params($username, $token, $timestamp);
                             
$username = $_POST['nimi'];
$token = sha1(uniqid($username, true));
$timestamp = time();    

$stmt->execute();
if (!$result) {
$message  = 'Invalid query: ' . mysql_error() . "\n";
$message .= 'Whole query: ' . $query;
die($message);
}
	
$url = "http://167.99.85.3/gg/KOODI/yritys/yritys.php?token=$token";
echo "<script type='text/javascript'>alert('$url');</script>";
