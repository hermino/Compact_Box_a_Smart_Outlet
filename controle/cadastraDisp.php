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
    header('Location: ../administrador.php');
} else {
    
    $sql = "INSERT INTO dispositivo(dpv_id, dpv_status, usuario_usu_id, config_ativa) VALUES ('".$dispositivo."', 0, 1, 0)";
    echo $sql;
    $database->runQuery($sql);
    header('Location: ../administrador.php');
}