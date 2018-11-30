<?php
    include("./config/config.php");
    include("./classes/DBConnection.php");
    $database = new DBConnection($localhost);
?>
<select id="o" onchange="teste()" name="dispositivo" class="custom-select">

    <?php
        $sql_tres = "SELECT * FROM configuracao WHERE usuario_usu_id = 2";
        $rows_tres = $database->getQuery($sql_tres);
        echo "<option> </option>";
        
        foreach ($rows_tres as $row) {
            echo "<option value='".$row['config_id']."'";
            if(isset($_GET['eletronico'])){
                if($_GET['eletronico'] == $row['config_id']){
                    echo "selected";
                }
            }
            echo ">".$row['config_eletronico']."</option>";
        }
    ?>
</select>

<?php
    $tensao = "";
    $taxa = "";
    $localizacao = "";
    $eletronico = "";
    if(isset($_GET['eletronico'])){
        $sql_tres = "SELECT * FROM configuracao WHERE config_id = ".$_GET['eletronico'];
        $rows_tres = $database->getQuery($sql_tres);
        foreach ($rows_tres as $row) {
            $tensao = $row['config_tensao'];
            $taxa = $row['config_taxa'];
            $localizacao = $row['config_localizacao'];
            $eletronico = $row['config_eletronico'];
        }
    }
    
    echo "<input type='text' value='".$tensao."'>";
    echo "<input type='text' value='".$taxa."'>";
    echo "<input type='text' value='".$localizacao."'>";
    echo "<input type='text' value='".$eletronico."'>";
?>

<script>
    function teste(){
        var x = document.getElementById("o");
        window.location = '?eletronico='+x.value;
    }
</script>