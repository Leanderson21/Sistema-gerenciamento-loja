<?php
require_once ("../config.php");

extract($_POST); 
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

<?php 
    if ($_POST["venda"] == "tot"){
        $exibindo_total = $exibir->total_de_vendas($_POST);
            $soma_total = 0;

        foreach($exibindo_total as $listar_total_vendas){
            $soma_total += $listar_total_vendas["tot_venda"];
    }
    echo "O total de vendas no periodo é de: ".number_format($soma_total,2,",","."). "R$ ";
    
    }elseif ($_POST["venda"] == "produto_mais_vendido"){
        $exibindo_produtos = $exibir->produto_mais_vendido($_POST);
            foreach ($exibindo_produtos as $listar_produtos){
                echo $listar_produtos["nome"]."=>". $listar_produtos["total_produto"]."<br>";
    }
    }elseif ($_POST["venda"] == "servicos_mais_realizados"){
        $exibindo_servicos = $exibir->servicos_mais_realizados($_POST);
            foreach($exibindo_servicos as $listar_servicos){
                echo $listar_servicos["nome"]."=>". $listar_servicos["total_servico"]."<br>";
            }
    }
?> 
<br>
    <a href="FormRelatorio.php">Novo Relatório</a>
</body>
</html>