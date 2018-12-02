<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../config/config.php');
require_once('../classes/DBConnection.php');
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array
session_start();

$dispositivo = $_POST['dispositivo'];
$tensao = $_POST['tensao'];
$localizacao = $_POST['localizacao'];
$wats = $_POST['wats'];
$eletronico = $_POST['eletronico'];


if (!$dispositivo && !$tensao && !$localizacao && !$wats && !$eletronico) {
    //campos em branco
    header('Location: ../operacoes.php');
} else {
    $sql = "UPDATE configuracao SET config_eletronico = '{$eletronico}', config_tensao = $tensao, config_localizacao = '{$localizacao}', config_taxa = $wats WHERE config_id = '{$dispositivo}' AND usuario_usu_id = {$_SESSION['usu_id']}";
    $count = $database->runQuery($sql);
    
    header('Location: ../operacoes.php');
}