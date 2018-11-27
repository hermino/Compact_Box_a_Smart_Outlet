<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../config/config.php');
require_once('../classes/DBConnection.php');
$database = new DBConnection($localhost);      // Create new connection by passing in your configuration array
session_start();

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$confSenha = $_POST['confSenha'];
$email = $_POST['email'];
$funcao = $_POST['funcao'];

if (!$nome && !$senha && !$confSenha && !$email && !$funcao) {
    //campos em branco
    header('Location: ../cadastro.php');
} else if ($senha != $confSenha && !empty($senha) && !empty($confSenha)) {
    //senhas diferentes
    header('Location: ../cadastro.php');
} else {
    
    $sql = "INSERT INTO usuario (usu_username, usu_senha, usu_email, usu_funcao) VALUES ('" . $nome . "',
                                                                                                         '" . $senha . "',
                                                                                                         '" . $email . "',
                                                                                                         '" . $funcao . "')";

    $count = $database->runQuery($sql);
    header('Location: ../cadastro.php');
    
}