<?php 
session_start();
require_once("../config.php"); 

$validar  = new Login();
if (isset($_POST["btn-cad"] )) {
$validar->logar($_POST);
}

//impedindo que o usuario tente fazer um novo login após logar
if(isset($_SESSION["logado"]) == "sim"){
    header("location: ../index.php");
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

<h2>Logar</h2>
<form action="" method="POST">
<label for="usuario">Usuario:</label>
<input type="text" name="usuario" required><br/>
<label for="senha">Senha:</label>
<input type="password" name="senha" required><br><br>
<input type="submit" name="btn-cad" value="logar">
</form>

</body>
</html>