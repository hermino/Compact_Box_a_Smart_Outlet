<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="estilo/css/bootstrap.css">
    <link rel="stylesheet" href="estilo/css/estiloAdmin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="./estilo/js/jquery.min.js"></script>
    <script src="./estilo/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="container-fluid pg-header-admin">
        <div class="row primeira">
            <div class="col-md-1">
                <img style="width: 2rem;" class="rounded float-right" src="./img/logo.png">
            </div>
            <div class="col-md-10">
                <h3>Compact Box</h3>
            </div>
            <div class="col-md-1 sair">
                <a class="nav-link" href="./controle/logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
        <div class="row segunda">
            <div class="col-md-5">
                <nav class="nav">
                    <div class="row">
                        <a class="nav-link" href="./operacoes.php">Operações</a>
                        <a class="nav-link monitor" href="./monitoramento.php">Manitoramento</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
