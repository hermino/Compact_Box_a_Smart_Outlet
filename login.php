<?php
include('./includes/header.php');
?>

<section class="container-fluid pg-login">
    <div class="row primeira">

        <div class="col-md-2"></div>

        <div class="col-md-4 box-1">
            <!--<div class="row">
                <div class="card-columns">
                    <div class="card">
                        <img class="card-img-top" src="./img/gastos.png" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">Tenha controle sobre os seus gastos</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-columns">
                    <div class="card">
                        <img class="card-img-top" src="./img/economia.png" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">Economize energia, assim seu bolso agradece e o meio ambiente também</h6>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="card-columns">
                    <div class="card">
                        <img class="card-img-top" src="./img/controle.png" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">Controle tudo remotamente pela aplicação do Compact Box</h6>
                        </div>
                    </div>
                </div>
-->
        </div>

    <div class="col-md-4 box-2">
        <div class="card">
            <h5 class="card-header">Login</h5>
            <div class="card-body">

                <form method="get" action=""> <!--Colocar o metodo get para funcionar e depois testar com metodo post-->

                    <div class="input-group mb-3">
                        <div class="input-group-prepend box-usuario-background">
                            <span class="input-group-text box-usuario-nome" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Digite seu usuário" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend box-senha-background">
                            <span class="input-group-text box-senha-nome" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Digite sua senha" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" class="btn btn-success btn-entrar">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>
</div>
</section>

<?php

include('./includes/footer.php');
