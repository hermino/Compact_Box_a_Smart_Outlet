<?php include ('includes/header.php'); ?>

<section>
    <div class="container pg-cadastro">
        <div  class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="card formulario-cadastro">
                    <h5 class="card-header">Cadastro</h5>
                    <div class="card-body">

                        <form method="post" action="controle/cadastrarDAO.php" > <!--Colocar a URL do arquivo-->

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="nome" required="required" title="Informe seu nome Completo" type="text" class="form-control" placeholder="Seu nome">
                            </div>

                            <!-- senha do usuario -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text " id="basic-addon1"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="senha" required="required" title="Informe sua senha" type="password" class="form-control" placeholder="Sua senha">
                            </div>

                            <!-- confirmar senha -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text " id="basic-addon1"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="confSenha" required="" title="Confirme a sua senha" type="password" class="form-control" placeholder="Confirmar senha">
                            </div>

                            <!-- Email do usuario -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text " id="basic-addon1"><i class="fas fa-at"></i></span>
                                </div>
                                <input name="email" required="" title="Informe seu E-mail" type="email" class="form-control" placeholder="seu E-mail">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Selecione a função</label>
                                    <select name="funcao" class="custom-select">
                                        <option >usuario</option>
                                        <option >administrador</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <!-- botoes de limpar e cadastrar -->
                            <div>
                                <input type="submit" title="Clique para cadastrar" value="Cadastrar" class="btn btn-success btn-entrar btn-entrar">
                                <input type="reset"  title="Clique para limpar os campos" value="Limpar" class="btn btn-success btn-entrar btn-limpar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>


<?php include ('includes/footer.php'); ?>
