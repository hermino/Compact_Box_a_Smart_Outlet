<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('config/config.php'); 
require_once('classes/DBConnection.php'); 
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array
session_start();
header('Content-type: application/json');
if(isset($_GET['id'])&&isset($_GET['valor'])) {
    $sql = "INSERT INTO status VALUES ( '".$_GET['id']."', '".$_GET['valor']."') ";
    $count = $database->runQuery($sql);
    if ($count==1) {
	echo json_encode(array('error' => false));
	return;
    }
}
echo json_encode(array('error' => true));
?>
