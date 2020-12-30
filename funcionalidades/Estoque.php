<?php 


class Estoque  {

private $qtd;
private $id_p;
private $conn; 
private $inserir;
private $validar;
private $cod_E;
private $select;
private $busca;
private $atualizar;

public function __construct(){
    $this->conn = new Conexao();
}

public function queryInsert($dados){
    $this->qtd = $dados["qtd"];
    $this->id_p = $dados["id_produto"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO estoque(quantidade , id_produto) 
    VALUES(:qtd, :id_p)");
    $this->inserir->bindValue(":qtd", $this->qtd);
    $this->inserir->bindValue(":id_p", $this->id_p);
    if ($this->inserir->execute()) {
        return "ok";
    }else {
        return "false";
    }

}

public function querySelect(){
    $this->select = $this->conn->conectar()->prepare("SELECT produto.nome, produto.id_produto 
    FROM estoque JOIN produto");
    $this->select->execute();
    $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
    return $linha;
}

public function validarVazio($dados){
    $this->qtd = $dados["qtd"];
    $this->id_p = $dados["id_produto"];

        if (empty($this->id_p) || $this->id_p == null || $this->id_p == "" || $this->id_p == "---"){
            return true;
 }else if(empty($this->qtd) || $this->qtd == null || $this->qtd == "") {
            return true;

        }
}

public function AtualizarRepetidos($dados){
    
    $this->id_p = $dados["id_produto"];
    $this->busca = $this->conn->conectar()->prepare("SELECT quantidade FROM estoque WHERE id_produto = 
    :id_produto");
    $this->busca->bindValue("id_produto", $this->id_p);
    $this->busca->execute();
    $linha = $this->busca->fetchAll(PDO::FETCH_ASSOC);
    $this->qtd = $linha[0]["quantidade"] + $dados["qtd"];
    $this->atualizar = $this->conn->conectar()->prepare("UPDATE estoque SET quantidade =:quantidade WHERE 
    id_produto =:id_produto");
    $this->atualizar->bindValue(":quantidade", $this->qtd);
    $this->atualizar->bindValue(":id_produto", $this->id_p);
    $this->atualizar->execute();
}

public function queryValidar($dados){

    $this->id_p = $dados["id_produto"];
    $this->validar = $this->conn->conectar()->prepare("SELECT * FROM estoque WHERE id_produto=:id_p");
    $this->validar->bindValue(":id_p", $this->id_p);
    $this->validar->execute();
    if ($this->validar->rowCount() == 0){
        return 1;
    }else {
        return 2;
    }
    }
}

?>