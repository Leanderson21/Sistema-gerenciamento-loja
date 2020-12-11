<?php


class BuscaEstoque  {

private $select;
private $conn;


public function __construct(){
    $this->conn = new Conexao();
}


public function querySelect(){
    $this->select = $this->conn->conectar()->prepare("SELECT produto.nome, produto.cod_Produto FROM estoque JOIN produto");
    $this->select->execute();
    $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
    return $linha;
}

}
?>
