<?php 



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


public function __construct(){
    $this->conn = new Conexao();
}


public function queryInsert($dados, $tot){
    $this->produto = $dados["produto"];
    $this->servico = $dados["servico"];
    $this->qtd_produto = $dados["qtd_produto"];
    $this->qtd_servico = $dados["qtd_servico"];
    $this->data_venda = $dados["data_venda"];
    $this->totVenda = $tot;
    $this->funcionario = $dados["funcionario"];
    $this->inserir = $this->conn->conectar()->prepare("INSERT INTO venda(id_produto, id_servico, qtd_produto, qtd_servico, data_venda, tot_venda , id_funcionario) VALUES(:id_produto, :id_servico,:qtd_produto, :qtd_servico, :data_venda, :tot_venda, :id_funcionario)");
    $this->inserir->bindValue(":id_produto", $this->produto);
    $this->inserir->bindValue(":id_servico", $this->servico);
    $this->inserir->bindValue(":qtd_produto", $this->qtd_produto);
    $this->inserir->bindValue(":qtd_servico", $this->qtd_servico);
    $this->inserir->bindValue(":data_venda", $this->data_venda);
    $this->inserir->bindValue(":tot_venda", $this->totVenda);
    $this->inserir->bindValue(":id_funcionario", $this->funcionario);
    $this->inserir->execute();
    
}

public function calcVenda($dados){
    $this->servico = $dados["servico"];
    $this->qtd_servico = $dados["qtd_servico"];
    $this->produto = $dados["produto"];
    $this->qtd_produto = $dados["qtd_produto"];     
    $this->buscar_preco_produto = $this->conn->conectar()->prepare("SELECT produto.preco FROM produto WHERE produto.id_produto = :id_produto");
    $this->buscar_preco_produto->bindValue(":id_produto", $this->produto);
    $this->buscar_preco_produto->execute();
    $linha = $this->buscar_preco_produto->fetchAll(PDO::FETCH_ASSOC);
    $p = $linha[0]["preco"] * $this->qtd_produto;

    //PREPARA APONTAR E VAMOS PARA GAMBIARRA....
    
    $this->buscar_preco_servico = $this->conn->conectar()->prepare("SELECT servico.preco FROM servico WHERE servico.id_servico = :id_servico");
    $this->buscar_preco_servico->bindValue(":id_servico", $this->servico);
    $this->buscar_preco_servico->execute();
    $linha2 = $this->buscar_preco_servico->fetchAll(PDO::FETCH_ASSOC);
    $p2 = $linha2[0]["preco"] * $this->qtd_servico; 
    
    return $p + $p2;
    
    

}

// Funcao para corrigir o problema da validação de campos DO ID_PRODUTO
public function validarDados($dados){
$this->produto = $dados["produto"];
$this->qtd_produto = $dados["qtd_produto"]; 
if($this->produto == "---" || $this->qtd_produto == ""){
    return null;
}else {
    return true;
}
}




}
?>