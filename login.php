<?php
include('./includes/header.php');

session_start();
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
            <?php
            if (isset($_SESSION['nao_autenticado'])):
                ?>
                <div class="alert alert-danger" role="alert">
                    Usuário ou senha incorretos!
                </div>
                <?php
                unset($_SESSION['nao_autenticado']);
            endif;
            ?>
            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">

                    <form method="post" action="controle/loginDAO.php"> <!--Colocar o metodo get para funcionar e depois testar com metodo post-->

                        <div class="input-group mb-3">
                            <div class="input-group-prepend box-usuario-background">
                                <span class="input-group-text box-usuario-nome" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="usuario" type="text" class="form-control" placeholder="Digite seu username">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend box-senha-background">
                                <span class="input-group-text box-senha-nome" id="basic-addon1"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="senha" type="password" class="form-control" placeholder="Digite sua senha">
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
