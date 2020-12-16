<?php

require_once("../config.php");
$CadS = new Servico();
    if (isset($_POST["btnCad"])){
            if($CadS->validaVazio($_POST) == 0){
                echo ("<script>
                window.alert('Campo vazio!');
                        window.location.href='FormServico.php';
                                                    </script>"); 
            }else {
      if ($CadS->queryValidar($_POST) == 1){
         if ($CadS->queryInsert($_POST) == "ok"){  
            echo ("<script>
                    window.alert('Cadastro realizado com sucesso!');
                            window.location.href='FormServico.php';
                                                        </script>");
      }else{
        echo ("<script>
                    window.alert('Não consegui cadastrar, entre em contato com o suporte!!');
                            window.location.href='FormServico.php';
                                                        </script>");
      }      
    }else {
        echo ("<script>
                    window.alert('Dados repetidos!');
                            window.location.href='FormServico.php';
                                                        </script>");
    }
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
    <h2>Cadastrar Serviço</h2>
<form action="" method="POST">

<label for="nome">Nome:</label>
<input type="text" name="nome" required><br/>

<label for="preco">Preço:</label>
<input type="text" name="preco" required><br>

<label for="descricao">descrição:</label>
<input type="text" name="descricao" required><br><br>

<input type="submit" name = "btnCad" value="enviar"/>
</form>

</body>
</html>