<?php 
require_once ("../config.php");
extract($_POST); // pega so o valor da option do select
$exibir = new Venda();

if (isset($_POST["tot_venda"]) && isset($_POST["btn-cad"]) ){
    
    $nova = $exibir->produtomaisvendido();

     foreach ($nova as $listar){
            echo $listar["nome"]."=>". $listar["total"]."<br>";
        }
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Relatorio de vendas</h2>
<form action="" method="POST">
    <label for="">Selecione o relatótio desejado</label>
<select name="tot_venda" id="">
<option value="">----</option>
<option value="tot_venda">Total de venda no período</option>
<option value="prod">Produtos mais vendidos</option>
<option value="">Serviços mais realizados</option>
</select>

<input type="submit" name="btn-cad" value="enviar">
</form>

</body>
</html>