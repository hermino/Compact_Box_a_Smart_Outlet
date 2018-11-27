<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../config/config.php');
require_once('../classes/DBConnection.php');
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array


$dispositivo = $_POST['dispositivo'];

if (!$dispositivo) {
    //campos em branco
    //header('Location: ../operacoes.php');
} else {
    
    $sql = "SELECT * FROM dispositivo WHERE dpv_id = $dispositivo";
    $rows = $database->getQuery($sql);
    
    $count = 0;
    
    foreach ($rows as $row){
        $count++;
    }
    echo $count;
    if($count == 1){
        $sql = "UPDATE dispositivo SET usuario_usu_id = {$_SESSION['usu_id']} WHERE dpv_id = $dispositivo";
        $database->runQuery($sql);
    }
    
    //header('Location: ../operacoes.php');
}