<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Relatorio de vendas</h2>
<form action="Form_Exibir_Relatorio.php" method="POST">
<label for="">Selecione o relatótio desejado</label>
    <select name="venda" id="">
            <option value="">----</option>
            <option value="tot">Total de venda no período</option>
            <option value="produto_mais_vendido">Produtos mais vendidos</option>
            <option value="servicos_mais_realizados">Serviços mais realizados</option>
    </select>
    <label for="nome">Selecione o periodo desejado:</label><br><br>
            <label for="periodo_1">Periodo 1:</label>
            <input type="date" name="data1"><br/>
            <label for="periodo_2">Periodo 2:</label>
            <input type="date" name="data2"><br/><br>
    <input type="submit" value="Gerar Relatório">
</form>
</body>
</html>
