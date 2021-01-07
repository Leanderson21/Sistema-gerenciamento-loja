<?php

require_once ("../config.php");
extract($_POST); // pega so o valor da option do select

$exibir = new Venda();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Sua Loja Faturou <?php if (isset($_POST["tot_venda"])){
$total_venda = $exibir->dadosrelatorio($_POST);
$i = 0;
    foreach($total_venda as $listar){
        $i += $listar["tot_venda"];
    }
    echo number_format($i,2,",",".");
}else {
    echo "erro";
}
 ?> R$ nesse período</h2>

 <a href="FormRelatorio.php">Novo Relatório</a>
</body>
</html>