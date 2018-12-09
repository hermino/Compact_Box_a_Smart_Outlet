<?php

//      include('./includes/headerAdmin.php');
include("./config/config.php");
include("./classes/DBConnection.php");
$database = new DBConnection($localhost);
session_start();
if (isset($_GET['IDdisp']) && isset($_GET['valor'])) {
    $sql_usuario_dispositivo = "SELECT * FROM dispositivo INNER JOIN configuracao ON dispositivo.conf
ig_ativa = configuracao.config_id WHERE dispositivo.dpv_id = '" . $_GET['IDdisp'] . "'";
    $return_usuario_dispositivo = $database->getQuery($sql_usuario_dispositivo);
    foreach ($return_usuario_dispositivo as $row) {
        echo $row['usuario_usu_id'];
        if (!file_exists("logs/" . $row['usuario_usu_id'])) {
            //echo "nao existe logs/usuario<br>"
            criaPasta("logs/" . $row['usuario_usu_id']);
        }
        if (!file_exists("logs/" . $row['usuario_usu_id'] . "/" . $row['dpv_id'])) {
            //echo "nao existe logs/usuario/dispositivo<br>";
            criaPasta("logs/" . $row['usuario_usu_id'] . "/" . $row['dpv_id']);
        }
        date_default_timezone_set('America/Manaus');
        $diretorio = "logs/" . $row['usuario_usu_id'] . "/" . $row['dpv_id'] . "/" . date("Y-m-d") . ".csv";
        $dataTime = date("d/m/Y,H:i:s");
        $conteudo = $_GET['valor'] . "," . $row['config_tensao'] . "," . $dataTime;
        $abre = fopen($diretorio, 'a');
        fputcsv($abre, explode(',', $conteudo));
        fclose($abre);
        echo "{" . $row['dpv_status'] . "}";
    }
}

function criaPasta($caminho) {
    mkdir($caminho, 0777, true);
}

//      include('./includes/footer.php');
?>