<?php
include('includes/headerAdmin.php');
?>
<!-- Primeira caixa -->
<section class="container pg-add-dpv">
    <div class="row primeira">
        <div class="col-md-12">
            <div class="card formulario-add-dpv">
                <h5 class="card-header">Adicionar Dispositivo</h5>
                <div class="card-body">

                    <form method="get" action="" >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input name="" class="form-control" title="Digite a localização do dispositivo" placeholder="Localização do dispositivo" required="required" type="text" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- senha do usuario -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-plug"></i></span>
                                    </div>
                                    <input name="" class="form-control" title="Digite qual dispositivo está conectado" placeholder="Dispositivo conectado" required="required" type="text" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- confirmar senha -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-lightbulb"></i></span>
                                    </div>
                                    <input name="" class="form-control" title="Está Ativo" placeholder="Dispositivo Ativo?" required="required" type="text" aria-label="Username" aria-describedby="basic-addon1">
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
    </div>

    <div class="row segunda">
        <div class="col-md-8">
            <div class="card formulario-opr-dpv">
                <h5 class="card-header">Operações do Dispositivo</h5>
                <div class="card-body">

                    <form method="get" action="" >
                        <div class="row">
                            <div class="col-md-12">
                                <label>Selecione o dispositivo</label>
                                <select class="custom-select">
                                    <option ></option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-bolt"></i>-</span>
                                    </div>
                                    <input name="" class="form-control" title="Digite o limite de tensão minima" placeholder="Tensão mínima" required="required" type="text" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- senha do usuario -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-bolt"></i>+</span>
                                    </div>
                                    <input name="" class="form-control" title="Digite o limite de tensão máxima" placeholder="Tensão máxima" required="required" type="text" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1"><i class="fas fa-bolt"></i></span>
                                    </div>
                                    <input name="" class="form-control" title="Digite a tensão" placeholder="Tensão" required="required" type="text" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- senha do usuario -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text wats" id="basic-addon1">W/hr</span>
                                    </div>
                                    <input name="" class="form-control" title="Wats por hora" type="text" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="submit" title="Clique para atualizar" value="Atualizar" class="btn btn-success btn-entrar btn-atualizar">
                            <input type="reset"  title="Clique para limpar os campos" value="Limpar" class="btn btn-success btn-entrar btn-limpar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</section>

<?php include("includes/footer.php");
