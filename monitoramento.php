<?php
include('./includes/headerAdmin.php');
include ('controle/verificaLogin.php');

include("./config/config.php");
include("./classes/DBConnection.php");
$database = new DBConnection($localhost);
?>
<br>
<div class="container pg-monitoramento">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="card">
                    <h6 class="card-header">Detalhes</h6>
                    <div class="card-body">
                        <form method="post" action="controle/dispoditivoDAO.php">
                            <div class="row">
                                <div class="col-md-12 ">

                                    <?php
                                    $tensao = "";
                                    $taxa = "";
                                    $localizacao = "";
                                    $eletronico = "";
                                    if (isset($_GET['eletronico'])) {
                                        $sql_tres = "SELECT * FROM configuracao WHERE config_id = " . $_GET['eletronico'];
                                        $rows_tres = $database->getQuery($sql_tres);
                                        foreach ($rows_tres as $row) {
                                            $tensao = $row['config_tensao'];
                                            $taxa = $row['config_taxa'];
                                            $localizacao = $row['config_localizacao'];
                                            $eletronico = $row['config_eletronico'];
                                        }

                                        $sql_um = "SELECT dpv_id FROM dispositivo WHERE usuario_usu_id = {$_SESSION['usu_id']} AND config_ativa = {$_GET['eletronico']}";
                                        $rows_um = $database->getQuery($sql_um);

                                        foreach ($rows_um as $row) {
                                            $dispositivo = $row['dpv_id'];
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

                                    <label>Selecione o dispositivo</label>
                                    <select name="dispositivo" class="custom-select">
                                        <option>
                                            <?php
                                            if($dispositivo){
                                                 echo $dispositivo;
                                            }else {
                                                echo " ";
                                            }
                                        
                                            ?></option>
                                    </select>
                                    <br><br>
                                    <label>Selecione a configuracao</label>

                                    <select id="o" onchange="teste()" name="configuracao" class="custom-select dispositivos">

                                        <?php
                                        $sql_tres = "SELECT * FROM configuracao WHERE usuario_usu_id = {$_SESSION['usu_id']}";
                                        $rows_tres = $database->getQuery($sql_tres);
                                        //echo "<option> </option>";

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
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="basic-addon1"><i class="fas fa-hand-holding-usd"></i></span>
                                        </div>
                                        <input name="gasto" value="<?php echo 'R$ ' . $gastos; ?>" class="form-control" title="Total Gasto" type="text">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="basic-addon1"><i class="fas fa-bolt"></i></span>
                                        </div>
                                        <input name="tensao" value="<?php echo $tensao; ?>" class="form-control" title="ID do dispositivo" type="text">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text " id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <input name="localizacao" value="<?php echo $localizacao; ?>" class="form-control" title="ID do dispositivo" type="text">
                                    </div>

                                    <script>
                                        function teste() {
                                            var x = document.getElementById("o");
                                            window.location = '?eletronico=' + x.value;
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
        <div class="col-md-9" style="width:100%;height:550px;" id="teste">


            <div class="card">
                <h6 class="card-header">Gráfico</h6>
                <div class="card-body">
                    <canvas class="line-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<?php
if (($handle = fopen("logs/dados.csv", "r")) !== FALSE) {
    while ($data = fgetcsv($handle, 1000, ",")) {
        $leitura[] = [
            'corrente' => $data[0],
            'time' => $data[1]
        ];
    }
}
fclose($handle);

echo "
	<script>
		var ctx = document.getElementsByClassName('line-chart');
		var chartGraph = new Chart(ctx, {
                                                    type: 'line', 
                                                    data: {
                                                    labels: 
                                                    [
	 ";
$c = 0;
foreach ($leitura as $linha) {
    if ($c == 0) {
        echo "'" . $linha['time'] . "'";
    } else {
        echo ",'" . $linha['time'] . "'";
    }
    $c++;
}
echo "
                                                    ],
                                                    datasets: [{
                                                    label: 'CORRENTE',
                                                    data: 
                                                    [ 
	 ";
$c = 0;
foreach ($leitura as $linha) {
    if ($c == 0) {
        echo $linha['corrente'];
    } else {
        echo "," . $linha['corrente'];
    }
    $c++;
}
echo "
                                                    ],
                                                    borderWidth: 3,
                                                    borderColor: 'rgba(242,100,0,0.85)',
                                                    backgroundColor: 'rgba(242,100,0,0.85)',
                                                    fill: false,
                                                    }]
                                                },
                                                options: {
                                                    scales:{
                                                        xAxes: [{
                                                            scaleLabel:{
                                                                display: true,
                                                                labelString: 'Horas'
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            scaleLabel:{
                                                                display: true,
                                                                labelString: 'Corrente'
                                                            }
                                                        }]
                                                    },
                                                }
			});
        </script>
         ";
?>

<?php
include('./includes/footer.php');
