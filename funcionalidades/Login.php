<?php 


class Login {


private $usuario;
private $senha;
private $conn;
private $buscar;

public function __construct(){
    $this->conn = new Conexao();
}


public function logar($dados){
    $this->usuario = $dados["usuario"];
    $this->senha = $dados["senha"];
    $this->buscar = $this->conn->conectar()->prepare("SELECT * FROM login WHERE usuario = :usuario AND senha = :senha ");
    $this->usuario->bindValue("usuario", $this->usuario);
    $this->senha->bindValue("senha", $this->senha);
    $this->buscar->execute();
        if($this->buscar->rowCount() == 0){
            header(location: ../FrontEnd/FromLogin.php);
        }else{
            session start();
            $linha = $this->buscar->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["funcionario"] = $linha["id_funcionario"];
            $_SESSION["logado"] = "sim";
            header(location: ../FrontEnd/FromVenda.php);
        }
}





}











?>