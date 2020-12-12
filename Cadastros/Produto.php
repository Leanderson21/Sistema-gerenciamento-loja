<?php

class Produto {

// ATRIBUTOS
private $nome;
private $marca;
private $preco;
private $conn;
private $inserir; // não criei getter and setter
private $validar; // não criei getter and setter


// MÉTODO CONSTRUTOR 
public function __construct(){
    $this->conn = new Conexao();
}

// INSERÇÃO DOS DADOS 
public function queryInsert($dados){
    $this->nome = $dados["nome"];
    $this->preco = $dados["preco"];
    $this->marca = $dados["marca"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO produto(nome,preco,marca) VALUES(:nome,:preco,:marca)");
    $this->inserir->bindValue(":nome", $this->nome);
    $this->inserir->bindValue(":preco", $this->preco);
    $this->inserir->bindValue(":marca", $this->marca);
    if($this->inserir->execute()){
        return "ok";
    }else {
        return "false";
    }

}
// VALIDAÇÃO DE DADOS REPETIDOS
public function validarQuery($dados){
    $this->marca = $dados["marca"];
    $this->validar = $this->conn->conectar()->prepare("SELECT * FROM produto WHERE marca=:marca");

    $this->validar->bindValue(":marca", $this->marca);
    $this->validar->execute();
    if ($this->validar->rowCount() == 0){
            return 1;
    }else {
         return 2;
    }
}


public function validarVazio($dados){
    $this->nome = $dados["nome"];
    $this->preco = $dados["preco"];
    $this->marca = $dados["marca"];
        if (empty($this->nome) || $this->nome == null || $this->nome == ""){
            return false;
        }else  if(empty($this->preco) || $this->preco == null || $this->preco == ""){
            return false;
        }else if (empty($this->marca) || $this->marca == null || $this->marca == ""){
            return false;
        }else {
            return true;
        }
}




//PUXAR TODOS OS PRODUTOS CADASTRADOS
public function querySelect(){
    $this->select = $this->conn->conectar()->prepare("SELECT * FROM produto");
    $this->select->execute();
    $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
    return $linha;
}

//GETTER AND SETTER
public function getNome()
    {
    return $this->nome;
    }

public function setNome($nome)
{
    $this->nome = $nome;

    return $this;
    }

            public function getMarca()
                {
                return $this->marca;
                }

            public function setMarca($marca)
            {
                $this->marca = $marca;

                return $this;
                }

                            public function getPreco()
                                {
                                return $this->preco;
                                }


                            public function setPreco($preco)
                            {
                                $this->preco = $preco;

                                return $this;
                            }
                            }


?>