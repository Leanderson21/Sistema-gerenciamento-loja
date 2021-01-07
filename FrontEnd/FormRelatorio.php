
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Relatorio de vendas</h2>
<form action="FormExibirRelatorioTotVenda.php" method="POST">
    <label for="">Selecione o relatótio desejado</label>
<select name="tot_venda" id="">
<option value="">----</option>
<option value="tot_venda">Total de venda no período</option>
<option value="">Produtos mais vendidos</option>
<option value="">Serviços mais realizados</option>
</select>
<label for="nome">Selecione o periodo desejado:</label><br><br>
<label for="preco">Periodo 1:</label>
<input type="date" name="data1"><br/>
<label for="preco">Periodo 1:</label>
<input type="date" name="data2"><br/><br>
<input type="submit" value="Gerar Relatório">
</form>

</body>
</html>
