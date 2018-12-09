<?php
include('./includes/headerAdmin.php');
include ('controle/verificaLogin.php');

include("./config/config.php");
include("./classes/DBConnection.php");
$database = new DBConnection($localhost);
?>
<br>


</section>
<div class="container pg-monitoramento">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="card form-detalhes">
                    <h6 class="card-header">Detalhes</h6>
                    <div class="card-body">
                        <form method="" action="">
                            <div class="row">
                                <div class="col-md-12 ">

                                    <?php
                                    $tensao = "";
                                    $taxa = "";
                                    $localizacao = "";
                                    $eletronico = "";
                                    $dpv = "";
                                    $status = 0;
                                    if (isset($_GET['eletronico'])) {
                                        $sql_tres = "SELECT * FROM configuracao WHERE config_id = " . $_GET['eletronico'];
                                        $rows_tres = $database->getQuery($sql_tres);
                                        foreach ($rows_tres as $row) {
                                            $tensao = $row['config_tensao'];
                                            $taxa = $row['config_taxa'];
                                            $localizacao = $row['config_localizacao'];
                                            $eletronico = $row['config_eletronico'];
                                        }


                                        $gastos = 0;
                                        $sql_quatro = "SELECT gts_total FROM gastos g INNER JOIN dispositivo d ON g.dispositivo_dpv_id = d.dpv_id INNER JOIN configuracao c ON d.config_ativa = c.config_id WHERE g.usuario_usu_id = {$_SESSION['usu_id']} AND c.config_id = {$_GET['eletronico']};";
                                        $rows_quatro = $database->getQuery($sql_quatro);
                                        foreach ($rows_quatro as $row) {
                                            $gastos += floatval($row['gts_total']);
                                        }
                                    } else {
                                        $gastos = 0;
                                    }
                                    ?>



                                    <label>Selecione a configuracao</label>
                                    <select id="eletronico" onchange="getEletronico()" name="configuracao" class="custom-select dispositivos">

                                        <?php
                                        $sql_tres = "SELECT * FROM configuracao WHERE usuario_usu_id = {$_SESSION['usu_id']}";
                                        $rows_tres = $database->getQuery($sql_tres);
                                        echo "<option value='xxx'> </option>";

                                        foreach ($rows_tres as $row) {
                                            echo "<option value='" . $row['config_id'] . "'";
                                            if (isset($_GET['eletronico'])) {
                                                if ($_GET['eletronico'] == $row['config_id']) {
                                                    echo "selected";
                                                }
                                            }
                                            echo ">" . $row['config_eletronico'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <br><br>
                                    <label>Selecione uma data</label>
                                    <select id="data" onchange="getEletronicoData()" name="dispositivo" class="custom-select">
                                        <?php
                                        if (isset($_GET['eletronico'])) {
                                            $sql_usuario_dispositivo = "SELECT * FROM dispositivo INNER JOIN usuario ON dispositivo.usuario_usu_id = usuario.usu_id INNER JOIN configuracao ON dispositivo.config_ativa = configuracao.config_id WHERE usuario.usu_id = {$_SESSION['usu_id']} AND configuracao.config_id = {$_GET['eletronico']}";
                                            $return_usuario_dispositivo = $database->getQuery($sql_usuario_dispositivo);
                                            foreach ($return_usuario_dispositivo as $row) {
                                                $usu_disp_config = $row;
                                                $status = $row['dpv_status'];
                                            }
                                        }
                                        echo "<option value='xxx'> </option>";
                                        $path = "logs/" . $usu_disp_config['usu_id'] . "/" . $usu_disp_config['dpv_id'];
                                        if (file_exists($path)) {
                                            $diretorio = dir($path);
                                            while ($arquivo = $diretorio->read()) {
                                                if ($arquivo != '.' && $arquivo != '..') {
                                                    echo "<option";
                                                    if (isset($_GET['data'])) {
                                                        if ($_GET['data'] == substr_replace($arquivo, "", -4)) {
                                                            echo " selected";
                                                        }
                                                    }
                                                    echo "> " . substr_replace($arquivo, "", -4) . "</option>";
                                                }
                                            }
                                            $diretorio->close();
                                        }
                                        ?>
                                    </select>


                                    <br><br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="basic-addon1"><i class="fas fa-hand-holding-usd"></i></span>
                                        </div>
                                        <input id="gasto" name="gasto" value="" class="form-control" title="Total Gasto" type="text">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="basic-addon1"><i class="fas fa-bolt"></i></span>
                                        </div>
                                        <input name="tensao" value="<?php echo $tensao . " V"; ?>" class="form-control" title="ID do dispositivo" type="text">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <input name="localizacao" value="<?php echo $localizacao; ?>" class="form-control" title="ID do dispositivo" type="text">
                                    </div>
                                    
                                    <button type="button" onclick="getDispositivo()" id="dpv" value="<?php echo $status; ?>" class="btn btn-success botao">
                                        <i class="fas fa-power-off"></i>
                                    </button>
                                    <?php
                                        if (isset($_GET['eletronico']) && isset($_GET['data']) && isset($_GET['status'])) { 
                                            $sql_atualizaStatus = "UPDATE dispositivo SET dispositivo.dpv_status = {$_GET['status']} WHERE dispositivo.usuario_usu_id = {$_SESSION['usu_id']} AND dispositivo.config_ativa = {$_GET['eletronico']}";
                                            $atualizaStatus = $database->runQuery($sql_atualizaStatus);
                                        }
                                    ?>
                                    <script>
                                        function getEletronico() {
                                            var x = document.getElementById("eletronico");
                                            if (x.value != "xxx") {
                                                window.location = '?eletronico=' + x.value;
                                            }
                                        }

                                        function getEletronicoData() {
                                            var x = document.getElementById("data");
                                            if (x.value != "xxx") {
                                                var url_string = window.location.href;
                                                var url = new URL(url_string);
                                                var eletronico = url.searchParams.get("eletronico");
                                                window.location = '?eletronico=' + eletronico + "&data=" + x.value;
                                            }
                                        }

                                        function getDispositivo() {
                                            var x = document.getElementById("dpv");
                                            var url_string = window.location.href;
                                            var url = new URL(url_string);
                                            var eletronico = url.searchParams.get("eletronico");
                                            var data = url.searchParams.get("data");
                                            
                                            if (x.value == "1") {
                                                window.location = '?eletronico=' + eletronico + '&data=' + data + "&status=" + 0;
                                            }else{
                                                window.location = '?eletronico=' + eletronico + '&data=' + data + "&status=" + 1;
                                            }
                                        }
                                    </script>
                                </div>
                                <!-- botoes de limpar e cadastrar -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        


        <div class="col-md-9" id="grafico" style="width:100%;height:550px;" id="teste">


            <div class="card form-grafico">
                <h6 class="card-header">Gráfico</h6>
                <div class="card-body">
                    <canvas class="line-chart"></canvas>
                </div>
            </div>
        </div>
        
        <script>
            var div = document.getElementById("grafico");
            // Criando um intervalo
            setInterval(function () {
               window.location.reload();
            }, 5000/* 1s */);

        </script>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<?php
$carregagrafico = 0;
if (isset($_GET['eletronico']) && isset($_GET['data'])) {
    if (($handle = fopen("logs/" . $usu_disp_config['usuario_usu_id'] . "/" . $usu_disp_config['dpv_id'] . "/" . $_GET['data'] . ".csv", "r")) !== FALSE) {
        while ($data = fgetcsv($handle, 1000, ",")) {
            $leitura[] = [
                'corrente' => $data[0],
                'tensao' => $data[1],
                'time' => $data[3]
            ];
        }
        $carregagrafico = 1;
        fclose($handle);
    }
}

echo "
	<script>
		var ctx = document.getElementsByClassName('line-chart');
		var chartGraph = new Chart(ctx, 
                {
                    type: 'line', 
                    data: {
                            labels: 
                                    [
	 ";
$c = 0;
if ($carregagrafico) {
    foreach ($leitura as $linha) {
        if ($c == 0) {
            echo "'" . $linha['time'] . "'";
        } else {
            echo ",'" . $linha['time'] . "'";
        }
        $c++;
    }
}

echo "
                                    ],
                            datasets: [
                                        {
                                            label: 'CORRENTE (Amperes)',
                                            data: 
                                                  [ 
	 ";
$c = 0;
if ($carregagrafico) {
    foreach ($leitura as $linha) {
        if ($c == 0) {
            echo $linha['corrente'];
        } else {
            echo "," . $linha['corrente'];
        }
        $c++;
    }
}

echo "
                                                    ],
                                            borderWidth: 3,
                                            borderColor: 'rgba(242,100,0,0.85)',
                                            backgroundColor: 'rgba(242,100,0,0.85)',
                                            fill: false,
                                        },
                                        {
                                            label: 'GASTOS (R$)',
                                            data: 
                                                  [ 
	 ";
$c = 0;
$gasto = 0;
if ($carregagrafico) {
    foreach ($leitura as $linha) {
        $gasto = $gasto + $linha['tensao'] * $linha['corrente'] * $usu_disp_config['config_taxa'];
        if ($c == 0) {
            echo $gasto;
        } else {
            echo "," . $gasto;
        }
        $c++;
    }
}

echo "
                                                    ],
                                            borderWidth: 3,
                                            borderColor: 'rgba(242,242,0,0.85)',
                                            backgroundColor: 'rgba(242,242,0,0.85)',
                                            fill: false,
                                        },
                                        {
                                            label: 'POTÊNCIA (Watts)',
                                            data: 
                                                  [ 
	 ";
$c = 0;
if ($carregagrafico) {
    foreach ($leitura as $linha) {
        if ($c == 0) {
            echo $linha['corrente'] * $linha['tensao'];
        } else {
            echo "," . $linha['corrente'] * $linha['tensao'];
        }
        $c++;
    }
}

echo "
                                                    ],
                                            borderWidth: 3,
                                            borderColor: 'rgba(14,242,103,0.85)',
                                            backgroundColor: 'rgba(14,242,103,0.85)',
                                            fill: false,
                                        }
                                      ]
                         },
                    options: {
                               scales:{
                                        xAxes: [
                                                {
                                                 scaleLabel:{
                                                             display: true,
                                                             labelString: 'Horas'
                                                            }
                                                }
                                               ],
                                        yAxes: [
                                                {
                                                 scaleLabel:{
                                                             display: true,
                                                             labelString: 'Corrente'
                                                            }
                                                }
                                               ]
                                      },
                             }
		});
        var mudagasto = document.getElementById('gasto');
        mudagasto.value = 'R$ " . round($gasto, 2) . "';
        </script>
         ";
?>

<?php
include('./includes/footer.php');
