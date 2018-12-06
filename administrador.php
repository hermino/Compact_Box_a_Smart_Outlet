<?php
include('includes/headerAdmin.php');
include ('./controle/verificaLogin.php');

include("./config/config.php");
include("./classes/DBConnection.php");
$database = new DBConnection($localhost);
?>
<section class="container pg-admin">
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">
            <div class="card form-add-dpv">
                <h5 class="card-header">Cadastrar Dispositivo</h5>
                <div class="card-body">
                    <form method="post" action="controle/cadastraDisp.php">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- confirmar senha -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-lightbulb"></i></span>
                                    </div>
                                    <input name="dispositivo" class="form-control" title="ID do dispositivo" type="text">
                                </div>
                            </div>
                            <!-- botoes de limpar e cadastrar -->
                        </div>
                        <div>
                            <input type="submit" title="Clique para cadastrar" value="Cadastrar" class="btn btn-success btn-cadastrar">
                            <input type="reset"  title="Clique para limpar os campos" value="Limpar" class="btn btn-success btn-limpar">
                        </div>
                    </form>
                </div>
            </div>



        </div>
        <div class="col-md-2"></div>

    </div>
</section>
