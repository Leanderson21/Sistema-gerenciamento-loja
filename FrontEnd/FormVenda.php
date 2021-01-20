<?php 
require_once("../config.php");

        $prod_view = new Produto();
             $serv_view = new Servico();
                $func_view = new Funcionario();
                    $vender = new Venda();

                $view_p = $prod_view->buscar_produtos();
            $view_s = $serv_view->querySelect();
        $view_f = $func_view->querySelect();
                
        if(isset($_POST["btnCad"])){
            $tot =  $vender->calcular_Venda($_POST); 
                $vender->atualizar_Estoque($_POST);       
                    $vender->inserir_dados_venda($_POST, $tot);
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
    <h2>Cadastrar Venda</h2>
<form action="" method="POST">

<!-- PRODUTO -->
<label for="nome">Produto:</label>
<select name="produto" id="">
<option value="">----</option>   
    <?php foreach($view_p as $valor_p){ ?> 
    <option value="<?php echo $valor_p["id_produto"]."<br/>";?>"><?php echo $valor_p["nome"]."<br/>"; ?></option>
    <?php } ?>
</select><br>

<!-- QUANTIDADE_PRODUTO -->
<label for="nome">Quantidade:</label>
<input type="number" name="qtd_produto"><br>

<!-- SERVIÇO -->
<label for="nome">Serviço:</label>
        <select name="servico" id=""><br>
        <option value="">---</option>
        <?php foreach($view_s as $valor_s){ ?> 
        <option value="<?php echo $valor_s["id_servico"]."<br/>";?>"><?php echo $valor_s["nome"]."<br/>"; ?></option>
        <?php } ?>
</select><br>

    <!-- QUANTIDADE_SERVIÇO -->
    <label for="nome">Quantidade:</label>
        <input type="number" name="qtd_servico"><br>

    <!-- DATA  -->
    <label for="nome">Data da Venda:</label>
        <input type="date" name="data_venda" default-value="0" required><br>

    <!-- OPERADOR -->
<label for="nome">Operador da venda:</label> 
<select name="funcionario" id=""required>
        <option value="">---</option>
        <?php foreach($view_f as $valor_f){ ?>
        <option value="<?php  echo $valor_f["id_funcionario"]."<br/>" ?>"> <?php echo $valor_f["nome"]."<br/>"?> </option> 
        <?php } ?>
</select><br>

<input type="submit" name = "btnCad" value="cadastrar"/> 
</form>
</body>
</html>

