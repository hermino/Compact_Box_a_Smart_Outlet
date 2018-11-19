<?php 
		
	$nome 		=  $_POST["nome"];
	$senha      =  $_POST["senha"];
	$confSenha  =  $_POST["confSenha"];
	$cpf		=  $_POST["cpf"];
	$email		=  $_POST["email"];


	if( !$nome && !$senha && !$confSenha && !$cpf && !$email){
		//campos em branco
		header('Location: cadastro.php');

	}else if( $senha != $confSenha && !empty($senha) && !empty($confSenha) ) {
		//senhas diferentes
		header('Location: cadastro.php');

	} else {
		//campos preenchidos

		//bom criptografar a senha

		$sql = "INSERT INTO usuarios VALUES ($nome, $senha, $cpf, $email);";


	}





 ?>