<?php 

// GAMBIARRA 1(CRIAR UM INSERT SO PARA FORCAR O VALOR DO PRODUTO NULO E A QTD =0)
// GAMBIARRA 2(CRIAR UM OPTION NO FORMULARIO QUE RECEBA OS VALORE NULL E 0)

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


// 
    $vender = new Venda();
    if(isset($_POST["btnCad"])){
         if($vender->validarDados($_POST) == "true"){ 
            $tot =  $vender->calcVenda($_POST) + $vender->calcVendaServico($_POST);   
         }else{

             $tot =  $vender->calcVendaServico($_POST); // aqui deveria pegar a funcao exclusiva para calcular serviço
         }
         $vender->queryInsert($_POST, $tot); 
         
        
       
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
<input type="date" name="data_venda" required><br>

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









