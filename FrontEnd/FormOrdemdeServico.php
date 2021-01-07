<?php 

require_once("../config.php");

$exibir_relatorio = new Venda();
$lista = $exibir_relatorio->ordemServico();


?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h2>Ordem de Serviço</h2>

<table border="2">

<tr>

<td> Produto </td>
<td> quantidade </td>
<td> Serviço </td>
<td> quantidade </td>
<td> total da venda </td>

</tr>

<tr>
<?php foreach($lista as $exibir) { ?> 
<td> <?php echo $exibir["p_nome"]; ?> </td>
<td> <?php echo $exibir["qtd_produto"]; ?> </td>
<td> <?php echo $exibir["s_nome"];?> </td>
<td> <?php echo $exibir["qtd_servico"];?> </td>
<td> <?php echo $exibir["tot_venda"]. " R$";?> </td>
<?php } ?> 
</tr>
</table>



</body>

</html>