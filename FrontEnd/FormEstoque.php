<?php
require_once("../config.php"); 


$cadastrando = new Estoque();
  $exibiP = new Produto();

      $exibir = $exibiP->buscar_produtos(); 
        if(isset($_POST["btn-cad"] )) {
            if($cadastrando->validar_cadastro_repetido($_POST) == 1){
                if($cadastrando->cadastrar_estoque($_POST) == "ok"){
                    echo "<script> alert('Cadastro realizado com sucesso');
                    location.href='FormEstoque.php'; </script>";
                  }
                  }else{
                    $cadastrando->atualizar_Estoque($_POST);
                    echo "<script> alert('Dados Atualizados');location.href='FormEstoque.php'; </script>";
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
              <option value=" <?php echo $valor["id_produto"]."<br/>"; ?>"><?php echo $valor["nome"]."(". $valor["marca"].")"."<br/>";?>
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