<?php 


class Login {


private $usuario;
private $senha;
private $conn;
private $buscar;
private $id_func;
private $nome;

public function __construct(){
    $this->conn = new Conexao();
}


public function logar($dados){

    $this->usuario = $dados["usuario"];
    $this->senha = $dados["senha"];
    try {
    $this->buscar = $this->conn->conectar()->prepare("SELECT * FROM login WHERE usuario = :usuario AND senha = :senha ");
    $this->buscar->bindValue(":usuario", $this->usuario);
    $this->buscar->bindValue(":senha", $this->senha);
    $this->buscar->execute();
        if($this->buscar->rowCount() == 0){
            echo ("<script >
                            window.alert('LOGIN OU SENHA INVALIDOS');
                                window.location.href='FormLogin.php';
                               </script>");  
             
        }else{
            session_start();
            $linha = $this->buscar->fetch(PDO::FETCH_ASSOC);
            $_SESSION["funcionario"] = $linha["id_funcionario"];
            $_SESSION["logado"] = "sim";
            header("location: ../index.php");
        }
    }catch(PDOException $e){
        return $e->getMessage();
    }
    
}

public function logado($dados){
    $this->id_func = $dados;
    $this->buscar = $this->conn->conectar()->prepare("SELECT nome FROM funcionario WHERE id_funcionario =:id_func ");
    $this->buscar->bindValue(":id_func", $this->id_func);
    $this->buscar->execute();
        $buscar_nome = $this->buscar->fetch(PDO::FETCH_ASSOC);
        $_SESSION["nome"] = $buscar_nome["nome"];
}

public function deslogado(){
    session_destroy();
    header("location: ../zuriel/FrontEnd/FormLogin.php");
}


}











?>