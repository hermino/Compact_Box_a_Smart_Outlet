<?php
include('./includes/headerAdmin.php');
include ('controle/verificaLogin.php');
?>
<br>
    <div class="container" style="width:78%;height:550px;" id="teste">
        <canvas class="line-chart"></canvas>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<?php
    if(($handle = fopen("logs/dados.csv", "r")) !== FALSE){
	while($data = fgetcsv($handle, 1000, ",")){
		$leitura[] = [
			 	'corrente' => $data[0],
			 	'time'     => $data[1]
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
                                                    foreach($leitura as $linha){
                                                        if($c == 0){
                                                            echo "'".$linha['time']."'";
                                                        }else{
                                                            echo ",'".$linha['time']."'";
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
                                                    foreach($leitura as $linha){
                                                        if($c == 0){
                                                            echo $linha['corrente'];
                                                        }else{
                                                            echo ",".$linha['corrente'];
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