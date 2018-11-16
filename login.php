<?php

include('./includes/header.php');
?>

<section class="container-fluid pg-login">
    <div class="row primeira">

        <div class="col-md-4"></div>

        <div class="col-md-4 box-1">
            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend box-usuario-background">
                            <span class="input-group-text box-usuario-nome" id="basic-addon1">Usuário</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Digite seu usuário" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend box-senha-background">
                            <span class="input-group-text box-senha-nome" id="basic-addon1">Senha</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Digite sua senha" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" class="btn btn-success btn-entrar">Entrar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4"></div>
    </div>
</section>

<?php

include('./includes/footer.php');
