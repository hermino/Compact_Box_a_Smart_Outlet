<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../config/config.php');
require_once('../classes/DBConnection.php');
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array
session_start();

$dispositivo = $_POST['dispositivo'];
$configuracao = $_POST['configuracao'];
$configuracao = strstr($configuracao, ' ', true);

if (!$dispositivo && !$configuracao) {
    //campos em branco
    header('Location: ../operacoes.php');
} else {
    
    $sql = "UPDATE dispositivo SET config_ativa = $configuracao WHERE dpv_id = $dispositivo";
    $count = $database->runQuery($sql);
    
    $sql = "UPDATE configuracao SET dispositivo_dpv_id = $dispositivo WHERE config_id = $configuracao";
    $count = $database->runQuery($sql);
    
    header('Location: ../operacoes.php');
}