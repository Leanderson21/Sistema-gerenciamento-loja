<?php

// CLASSE QUE IRÁ REALIZAR AS FUNCIONALIDADES DA TELA DE SERVICO DO SISTEMA

class Servico {

    private $nome;
    private $desc;
    private $preco;
    private $conn;
    private $inserir;
    private $validar;

    public function __construct(){
        $this->conn = new Conexao();
    }    

public function queryInsert($dado){
    $this->nome = $dado["nome"];
    $this->desc = $dado["descricao"];
    $this->preco = $dado["preco"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO servico(nome,descricao,preco) VALUES(:nome,:descricao,:preco)");
    $this->inserir->bindValue(":nome", $this->nome);
    $this->inserir->bindValue(":descricao", $this->desc);
    $this->inserir->bindValue(":preco", $this->preco);
    if($this->inserir->execute()){
        return "ok";
    }else {
        return "false";
    }

}
// FUNÇÃO PARA VALIDAR OS DADOS REPETIDOS
    public function queryValidar($dado){
        $this->nome = $dado["nome"];
        $this->validar = $this->conn->conectar()->prepare("SELECT * FROM servico WHERE nome=:nome");
        $this->validar->bindValue(":nome",$this->nome);
            if ($this->validar->rowCount() == 0){
                return 1;
            }else {
                return 2;
            }
        }


//FUNÇÃO PARA VALIDAR CAMPO VAZIO 
    public function validaVazio($dado){
        $this->nome = $dado["nome"];
        $this->desc = $dado["descricao"];
        $this->preco = $dado["preco"];
                if  (empty($this->nome) || $this->nome == null || $this->nome == "")   {
                return 0;
            }else if(empty($this->desc) || $this->desc == null || $this->desc == "")   {
                return 0;
            }else if(empty($this->preco) || $this->preco == null || $this->preco == ""){
                return 0;
            }else {
                return 1;
            }
  
    }
    
        public function querySelect(){
            $this->select = $this->conn->conectar()->prepare("SELECT * FROM servico");
            $this->select->execute();
            $linha = $this->select->fetchAll(PDO::FETCH_ASSOC);
            return $linha;
        }



    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */ 
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
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