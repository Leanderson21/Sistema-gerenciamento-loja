<?php 


class Estoque  {

private $qtd;
private $cod_P;
private $conn; 
private $inserir;
private $validar;
private $cod_E;
private $select;



public function __construct(){
    $this->conn = new Conexao();
}

public function queryInsert($dados){
    $this->qtd = $dados["qtd"];
    $this->cod_P = $dados["id_produto"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO estoque(quantidade , id_produto) VALUES(:qtd, :cod)");
    $this->inserir->bindValue(":qtd", $this->qtd);
    $this->inserir->bindValue(":cod", $this->cod_P);
    if ($this->inserir->execute()) {
        return "ok";
    }else {
        return "false";
    }

}

public function querySelect(){
    $this->select = $this->conn->conectar()->prepare("SELECT produto.nome, produto.id_produto FROM estoque JOIN produto");
    $this->select->execute();
    $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
    return $linha;
}


public function validarVazio($dados){
    $this->qtd = $dados["qtd"];
    $this->cod_P = $dados["id_produto"];
  
        if (empty($this->cod_P) || $this->cod_P == null || $this->cod_P == "" || $this->cod_P == "---"){
            return true;
        }else if(empty($this->qtd) || $this->qtd == null || $this->qtd == "") {
            return true;
        }
}



public function queryValidar($dados){
    $this->cod_P = $dados["id_produto"];
    $this->validar = $this->conn->conectar()->prepare("SELECT * FROM estoque WHERE id_produto=:cod_p");
    $this->validar->bindValue(":cod_p", $this->cod_P);
    $this->validar->execute();
    if ($this->validar->rowCount() == 0){
        return 1;
}else {
     return 2;
}
}

/**
 * Get the value of conn
 */ 
public function getConn()
{
return $this->conn;
}

/**
 * Set the value of conn
 *
 * @return  self
 */ 
public function setConn($conn)
{
$this->conn = $conn;

return $this;
}
}


?>