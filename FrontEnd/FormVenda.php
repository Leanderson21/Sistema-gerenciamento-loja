<?php 
require_once("../config.php");

// CHAMANDO A CLASSE PRODUTO
$prod_view = new Produto();
    $view_p = $prod_view->querySelect();

// CHAMANDO A CLASSE SERVICO
  $serv_view = new Servico();
    $view_s = $serv_view->querySelect();

//CHAMANDO A CLASSE FUNCIONARIO
    $func_view = new Funcionario();
        $view_f = $func_view->querySelect();

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

<select name="" id="">
<option value="">---</option>  
    <?php foreach($view_p as $valor_p){ ?> 
    <option value="<?php echo $valor_p["cod_Produto"]."<br/>";?>"><?php echo $valor_p["nome"]."<br/>"; ?></option>
    <?php } ?>
</select><br>
<!-- QUANTIDADE_PRODUTO -->
<label for="nome">Quantidade:</label>
<input type="number" name="qtdP"><br>

<!-- SERVIÇO -->
<label for="nome">Serviço:</label>

<select name="" id=""><br>
<option value="">---</option>
<?php foreach($view_s as $valor_s){ ?> 
<option value="<?php echo $valor_s["cod_Servico"]."<br/>";?>"><?php echo $valor_s["nome"]."<br/>"; ?></option>
<?php } ?>
</select><br>
<!-- QUANTIDADE_SERVIÇO -->
<label for="nome">Quantidade:</label>
<input type="number" name="qtdS"><br>

<!-- DATA  -->
<label for="nome">Data da Venda:</label>
<input type="date" name="data"><br>
<!-- OPERADOR -->
<label for="nome">Operador da venda:</label> 

<select name="" id="">
<option value="">---</option>
<?php foreach($view_f as $valor_f){ ?>
<option value="<?php  echo $valor_f["cod_Funcionario"]."<br/>" ?>"> <?php echo $valor_f["nome"]."<br/>"?> </option> 
<?php } ?>
</select><br>
<input type="submit" name = "btnCad" value="cadastrar"/> 

</form>

</body>
</html>









