<?php
require("config.php");
session_start();
$logado = new Login();


    if($_SESSION["logado"] == "sim"){
        $logado->logado($_SESSION["funcionario"]);
    }else {
        header("location: FrontEnd/FormLogin.php");
    }    

if(!empty($_GET["sair"]) == "sim"){
    $logado->deslogado();
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

<h1> Bem Vindo <u><?php echo $_SESSION["nome"]?></u> </h1>
<a href="?sair=sim"><span>sair</span></a>

</body>

</html>

