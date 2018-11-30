<?php
include('./includes/header.php');

session_start();
?>

<section class="container-fluid pg-login">
    <div class="row primeira">

        <div class="col-md-6 box-1">
            <img src="img/fundologin.png" class="img-fluid" alt="Dicas">
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
