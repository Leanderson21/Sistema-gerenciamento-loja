<?php

class Funcionario{

private $nome;
private $conn;
private $inserir; // não criei getter and setter

public function __construct(){
    $this->conn = new Conexao();
}

public function queryInsert($dado){
    $this->nome = $dado["nome"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO funcionario(nome) VALUE(:nome)");
    $this->inserir->bindValue(":nome",$this->nome);
   if ($this->inserir->execute()) {
       return 1;
   } else {
       return 2;
   }
}

public function querySelect(){
    $this->select = $this->conn->conectar()->prepare("SELECT * FROM funcionario");
    $this->select->execute();
    $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
    return $linha;
}



public function validarVazio($dados){
    $this->nome = $dados["nome"];
  
        if (empty($this->nome) || $this->nome == null || $this->nome == ""){
            return false;
        }else {
            return true;
        }
}



//GETTERS AND SETTERS
public function getNome()
{
return $this->nome;
}

public function setNome($nome)
{
$this->nome = $nome;

return $this;
}
}


?>