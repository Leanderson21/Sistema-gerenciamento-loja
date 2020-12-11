<?php
// ARQUIVO DE CONFIGURAÇÕES COM OS AUTOLOADS
require_once("../config.php");
$cadP = new Produto();

// CHAMANDO OS POSTS PARA DENTRO DA CLASSE PRODUTO
if (isset($_POST["btn-cad"])){  
    // VALIDADCÃO DE CAMPOS VAZIOS
    if ($cadP->validarVazio($_POST) == null){
        echo ("<script >
                 window.alert('Campo Vazio!');
                        window.location.href='FormProduto.php';
                                                    </script>");
    }else {
    if ($cadP->validarQuery($_POST) == 1){
            if ($cadP->queryInsert($_POST) == "ok"){
                        echo ("<script >
                            window.alert('Cadastro realidado com Sucesso!');
                                window.location.href='FormProduto.php';
                                                    </script>");
    }   
    }else{
        echo ("<script >
                    window.alert('Dados repetidos!');
                        window.location.href='FormProduto.php';
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

    <h2>Cadastrar Produto</h2>
<form action="" method="POST">

<label for="nome">Nome:</label>
<input type="text" name="nome"><br/>

<label for="marca">Marca:</label>
<input type="text" name="marca"><br>

<label for="preco">Preço:</label>
<input type="text" name="preco"><br><br>

<input type="submit" name="btn-cad" value="enviar">
</form>

</body>
</html>