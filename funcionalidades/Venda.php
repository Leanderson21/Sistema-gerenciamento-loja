<?php 



class Venda {

private $conn;
private $produto;
private $servico;
private $qtd;


public function __construct(){
    $this->conn = new Conexao();
}



public function queryInsert($dado){



}


    public function querySelect(){
        $this->select = $this->conn->conectar()->prepare("SELECT produto.nome, produto.cod_Produto FROM estoque JOIN produto");
        $this->select->execute();
        $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
        return $linha;
    }




}




?>