<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../config/config.php');
require_once('../classes/DBConnection.php');
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array
session_start();

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: ../login.php');
    exit();
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT usu_id FROM usuario WHERE usu_username = '$usuario' AND usu_senha = $senha";

$rows = $database->getQuery($sql);


foreach ($rows as $row) {
    $_SESSION['usu_id'] = $row['usu_id'];
    header('Location: ../operacoes.php');
    exit();
}

$_SESSION['nao_autenticado'] = true;
header('Location: ../login.php');
exit();

