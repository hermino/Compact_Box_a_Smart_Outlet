<?php include("includes/header.php"); ?>


<section>
    <div class="container pg-cadastro">
        <div  class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="card formulario-cadastro">
                    <h5 class="card-header">Cadastro</h5>
                    <div class="card-body">

                        <form method="post" action="controle/cadastrarDAO.php" > <!--Colocar a URL do arquivo-->

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Selecione a função</label>
                                    <select name="funcao" class="custom-select">
                                        <option >usuario</option>
                                        <option >administrador</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Selecione a função</label>
                                    <select name="funcao" class="custom-select">
                                        <option >usuario</option>
                                        <option >administrador</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Selecione a função</label>
                                    <select name="funcao" class="custom-select">
                                        <option >usuario</option>
                                        <option >administrador</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
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


<?php include("includes/footer.php");
