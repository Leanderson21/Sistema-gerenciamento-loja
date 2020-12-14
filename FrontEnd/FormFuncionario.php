
<?php
//ARQUIVO DE CONFIGURAÇÃO COM OS AUTOLOADS
require_once("../config.php");
    $cadF = new Funcionario();
// CHAMANDO OS POSTS PARA DENTRO DA CLASSE FUNCIONARIO
if (isset($_POST["btn-cad"])){
      if ($cadF->queryInsert($_POST) == 1){
        echo ("<script >
                 window.alert('Cadastro realizado com sucesso');
                        window.location.href='FormFuncionario.php';
                                                    </script>");
    }else {
        echo ("<script >
                 window.alert('erro ao cadastrar');
                        window.location.href='FormFuncionario.php';
                                                    </script>");
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
    <h2>Cadastrar Funcionario</h2>
<form action="" method="POST">
<label for="nome">Nome:</label>
<input type="text" name="nome">
<input type="submit" name="btn-cad"value="enviar">
</form>

</body>
</html>