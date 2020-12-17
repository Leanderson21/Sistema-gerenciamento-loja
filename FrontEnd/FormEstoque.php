<?php
require_once("../config.php"); 

//-----------------------------
$cadE = new Estoque();
  $exibiP = new Produto();
//------------------------------
      $exibir = $exibiP->querySelect(); 
        if (isset($_POST["btn-cad"] )) {
            if ($cadE->queryValidar($_POST) == 1){
                if  ($cadE->queryInsert($_POST) == "ok"){
                    echo "<script> alert('Cadastro realizado com sucesso');
                    location.href='FormEstoque.php'; </script>";
                  }
                  }else{
                    echo "<script> alert('informacoes repetidas');location.href='FormEstoque.php'; </script>";
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
<div class="cadastro-Estoque">
      <h2>Cadastrar Estoque</h2>
      <form action="" method="POST">
      <label for="nome">Nome do Produto:</label>

      <select name="id_produto" id="">
          <option value="">---</option>     
      <?php foreach($exibir as $valor){ ?> <!--chamando a variavel com o metodo para listar os produtos -->
              <option value=" <?php echo $valor["id_produto"]."<br/>"; ?>"><?php echo $valor["nome"]."<br/>";?>
              </option> 
      <?php } ?>
      </select>

      <label for="preco">Quantidade:</label>
      <input type="number" name="qtd"><br/>
      <input type="submit" name="btn-cad" value="cadastrar">
      </form>
</div>
</body>

</html>