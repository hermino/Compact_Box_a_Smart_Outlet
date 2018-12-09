<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../config/config.php');
require_once('../classes/DBConnection.php');
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array


$configuracao = $_POST['configuracao'];
$usuario = $_SESSION['usu_id'];
$dispositivo = $_POST['dpv'];
echo $dispositivo;

if (!$configuracao && !$usuario && !$dispositivo) {
    //campos em branco
    header('Location: ../monitoramento.php');
} else {
    
    $query = "SELECT dpv_status FROM dispositivo WHERE dpv_id = '{$dispositivo}'";
    $rows = $database->getQuery($query);
    
    foreach ($rows as $row){
        $status = $row['dpv_status'];
    }
    echo $status;
    
    if($status == 0){
        $sql = "UPDATE dispositivo SET dpv_status = 1 WHERE dpv_id = '{$dispositivo}' AND config_ativa = {$configuracao}";
        $rows = $database->runQuery($sql);
    } else {
        $sql = "UPDATE dispositivo SET dpv_status = 0 WHERE dpv_id = '{$dispositivo}' AND config_ativa = {$configuracao}";
        $rows = $database->runQuery($sql);
    } 
    
    $query = "SELECT dpv_status FROM dispositivo WHERE dpv_id = '{$dispositivo}'";
    $rows = $database->getQuery($query);
    
    foreach ($rows as $row){
        $status = $row['dpv_status'];
    }
    echo $status;
      
    header('Location: ../monitoramento.php');
}