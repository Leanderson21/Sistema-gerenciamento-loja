<?php 


class Estoque  {

private $conn; 
private $quantidade;
private $id_produto;
private $inserir;
private $validar;
private $buscar;
private $atualizar;

public function __construct(){
    $this->conn = new Conexao();
}

public function cadastrar_estoque($dados){
    $this->quantidade = $dados["qtd"];
    $this->id_produto = $dados["id_produto"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO estoque(quantidade , id_produto) 
    VALUES(:qtd, :id_p)");
    $this->inserir->bindValue(":qtd", $this->quantidade);
    $this->inserir->bindValue(":id_p", $this->id_produto);
    if ($this->inserir->execute()) {
        return "ok";
    }else {
        return "false";
    }

}

public function atualizar_Estoque($dados){
    
    $this->id_produto = $dados["id_produto"];
    $this->buscar = $this->conn->conectar()->prepare("SELECT quantidade FROM estoque WHERE id_produto = 
    :id_produto");
    $this->buscar->bindValue("id_produto", $this->id_produto);
        $this->buscar->execute();
    $linha = $this->buscar->fetchAll(PDO::FETCH_ASSOC);
    $this->quantidade = $linha[0]["quantidade"] + $dados["qtd"];
    $this->atualizar = $this->conn->conectar()->prepare("UPDATE estoque SET quantidade =:quantidade WHERE 
    id_produto =:id_produto");
    $this->atualizar->bindValue(":quantidade", $this->quantidade);
    $this->atualizar->bindValue(":id_produto", $this->id_produto);
        $this->atualizar->execute();
}

public function validar_cadastro_repetido($dados){

    $this->id_produto = $dados["id_produto"];
    $this->validar = $this->conn->conectar()->prepare("SELECT * FROM estoque WHERE id_produto=:id_p");
    $this->validar->bindValue(":id_p", $this->id_produto);
    $this->validar->execute();
    if ($this->validar->rowCount() == 0){
        return 1;
    }else {
        return 2;
    }
  }
}

/*
public function querySelect(){
    $this->select = $this->conn->conectar()->prepare("SELECT produto.nome, produto.id_produto 
    FROM estoque JOIN produto");
    $this->select->execute();
    $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
    return $linha;
}
*/

/*
public function validarVazio($dados){
    $this->qtd = $dados["qtd"];
    $this->id_p = $dados["id_produto"];
    if (empty($this->id_p) || $this->id_p == null || $this->id_p == "" || $this->id_p == "---"){
            return true;
}else if(empty($this->qtd) || $this->qtd == null || $this->qtd == "") {
            return true;

        }
}
*/

?>