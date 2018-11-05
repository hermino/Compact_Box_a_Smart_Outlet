<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Listar Dados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/dist/css/bootstrap.min.css">
        <script src="style/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        require_once('./config/arguments.php');

        if (isset($_GET['id'])) {
            $sql = "SELECT valor FROM status WHERE id = " . $_GET['id'] . " LIMIT 1 ";
            $rows = $database->getQuery($sql);
            ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <?php
                    foreach ($rows as $row) {
                        echo "\n" . json_encode(array('valor' => $row["valor"], 'error' => false));
                        return;
                    }
                    ?>
                </li>
            </ul>
            <?php
        }
        echo json_encode(array('error' => true));
        ?>
    </body>
</html>