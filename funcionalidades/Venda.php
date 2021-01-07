<?php 

// CLASSE QUE IRA REALIZAR TODAS AS FUNCIONALIDADES DA TELA DE VENDA

class Venda {

    private $conn;
    private $produto;
    private $servico;
    private $qtd_servico;
    private $qtd_produto;
    private $data_venda;
    private $totVenda;
    private $buscar_preco_produto;
    private $buscar_preco_servico;
    private $inserir;
    private $funcionario;
    private $atualizar;
    private $busca_estoque;
    private $buscar_relatorio;
    private $valor_total_servico;
    private $valor_total_produto;
    private $data_1;
    private $data_2;


public function __construct(){
    $this->conn = new Conexao();
}

public function atualizarEstoque($dados){

    $this->produto = $dados["produto"];  
    $this->busca_estoque = $this->conn->conectar()->prepare("SELECT quantidade FROM estoque WHERE 
    id_produto = :id_produto");
    $this->busca_estoque->bindValue(":id_produto", $this->produto);
    $this->busca_estoque->execute();
    $linha = $this->busca_estoque->fetchAll(PDO::FETCH_ASSOC);
    if (isset(($linha[0]["quantidade"]))){
    $this->qtd_produto = ((int)$linha[0]["quantidade"] - (int)$dados["qtd_produto"]);
    $this->atualizar = $this->conn->conectar()->prepare("UPDATE estoque SET quantidade=:qtd_produto WHERE 
    id_produto = :id_produto");
    $this->atualizar->bindValue(":id_produto", $this->produto);
    $this->atualizar->bindValue(":qtd_produto", $this->qtd_produto);
    $this->atualizar->execute();
    }
}

// INSERINDO OS DADOS NA TABELA  VENDA
public function queryInsert($dados, $tot){

if ($dados["produto"] == ""){  // VALIDAR ID PRODUTO PARA RECEBER VALOR NULL CASO O CAMPO NAO SEJA PREENCHIDO   
    $this->produto = null;
}else {
    $this->produto = $dados["produto"];
}   
if($dados["qtd_produto"] == ""){
    $this->qtd_produto = 0;
}else {
    $this->qtd_produto = $dados["qtd_produto"];
}    
if ($dados["servico"] == ""){ 
    $this->servico = null;
}else {
    $this->servico = $dados["servico"];
}   
if($dados["qtd_servico"] == ""){
    $this->qtd_servico = 0;
}else {
    $this->qtd_servico = $dados["qtd_servico"];
}    

    $this->qtd_servico = $dados["qtd_servico"];
    $this->data_venda = $dados["data_venda"];
    $this->totVenda = $tot;
    $this->funcionario = $dados["funcionario"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO venda(id_produto, id_servico, qtd_produto, 
    qtd_servico, data_venda, tot_venda , id_funcionario) VALUES(:id_produto, :id_servico,:qtd_produto, 
    :qtd_servico, :data_venda, :tot_venda, :id_funcionario)");
    $this->inserir->bindValue(":id_produto", $this->produto);
    $this->inserir->bindValue(":id_servico", $this->servico);
    $this->inserir->bindValue(":qtd_produto", $this->qtd_produto);
    $this->inserir->bindValue(":qtd_servico", $this->qtd_servico);
    $this->inserir->bindValue(":data_venda", $this->data_venda);
    $this->inserir->bindValue(":tot_venda", $this->totVenda);
    $this->inserir->bindValue(":id_funcionario", $this->funcionario);
    if($this->inserir->execute()){
        return 1;
    }else {
        return 0;
    }
}

// FUNÇÃO QUE IRÁ CALCULAR OS VALORES INSERIDOS NA VENDA DE PRODUTOS E SERVIÇOS
public function calcVenda($dados){

    $this->servico = $dados["servico"];
    $this->qtd_servico = $dados["qtd_servico"];
    $this->buscar_preco_servico = $this->conn->conectar()->prepare("SELECT servico.preco FROM servico WHERE 
    servico.id_servico = :id_servico");
    $this->buscar_preco_servico->bindValue(":id_servico", $this->servico);
    $this->buscar_preco_servico->execute();
    $listar2 = $this->buscar_preco_servico->fetchAll(PDO::FETCH_ASSOC);
    if (isset($listar2[0]["preco"])){
    $this->valor_total_servico = $listar2[0]["preco"] * $this->qtd_servico; 
    } 

    $this->produto = $dados["produto"];
    $this->qtd_produto = $dados["qtd_produto"];                   
    $this->buscar_preco_produto = $this->conn->conectar()->prepare("SELECT produto.preco FROM produto 
    WHERE produto.id_produto = :id_produto");
    $this->buscar_preco_produto->bindValue(":id_produto", $this->produto);
    $this->buscar_preco_produto->execute();
    $linha = $this->buscar_preco_produto->fetchAll(PDO::FETCH_ASSOC);
    if (isset($linha[0]["preco"])){
    $this->valor_total_produto = $linha[0]["preco"] * $this->qtd_produto;
    }
    return $this->valor_total_servico + $this->valor_total_produto;
}

//FUNÇÃO PARA CALCULAR VALOR TOTAL DOS SERVIÇOS
public function calcVendaServico($dados){
    $this->servico = $dados["servico"];
    $this->qtd_servico = $dados["qtd_servico"];
    $this->buscar_preco_servico = $this->conn->conectar()->prepare("SELECT servico.preco FROM servico WHERE 
    servico.id_servico = :id_servico");
    $this->buscar_preco_servico->bindValue(":id_servico", $this->servico);
    $this->buscar_preco_servico->execute();
    $listar = $this->buscar_preco_servico->fetchAll(PDO::FETCH_ASSOC);
    $valor_total_servico = $listar[0]["preco"] * $this->qtd_servico; 

    return $valor_total_servico;    
}


// NAO PRECISO DELA POR AGORA
public function validarTot($dados){

    $this->produto = $dados["produto"];
    $this->qtd_produto = $dados["qtd_produto"]; 
    $this->servico = $dados["servico"];
    $this->qtd_servico = $dados["qtd_servico"];
    if ($this->produto == "---" || $this->qtd_produto == ""){
        return null;
    }else {
        return true;
    }
}

  
public function ordemServico(){

    $buscar_id = $this->conn->conectar()->prepare("SELECT MAX(id_venda) FROM venda"); // BUSCANDO O MAIOR ID DA TABELA VENDA
    $buscar_id->execute();
    $linha = $buscar_id->fetchAll(PDO::FETCH_ASSOC);
    $this->buscar_relatorio = $this->conn->conectar()->prepare("SELECT produto.nome as p_nome, servico.nome as s_nome, venda.qtd_produto, venda.qtd_servico, venda.tot_venda  FROM venda JOIN produto ON  produto.id_produto = venda.id_produto JOIN servico ON  servico.id_servico = venda.id_servico WHERE id_venda = :id_venda ");
    $this->buscar_relatorio->bindValue(":id_venda", $linha[0]["MAX(id_venda)"]);
    $this->buscar_relatorio->execute();
    $dados_venda = $this->buscar_relatorio->fetchAll(PDO::FETCH_ASSOC);
    return $dados_venda;
}


public function dadosrelatorio($dados){

    $this->data_1 = $dados["data1"];
    $this->data_2 = $dados["data2"];
    $d = $this->conn->conectar()->prepare("SELECT * FROM venda WHERE data_venda BETWEEN :data1 and :data2");
    $d->bindValue(":data1", $this->data_1);
    $d->bindValue(":data2", $this->data_2);
    $d->execute();
    $linha = $d->fetchAll(PDO::FETCH_ASSOC);
      return $linha;  
    
}


public function validarVazio($dados){

$this->produto = $dados["produto"];
$this->qtd_produto = $dados["qtd_produto"];
$this->servico = $dados["servico"];
$this->qtd_servico = $dados["qtd_servico"];
$this->data_venda = $dados["data_venda"];
$this->funcionario = $dados["funcionario"];

if (  $this->produto == "----" ){

    return false;
}else {
    return true;
}



}



}
?>