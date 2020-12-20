<?php

class Conexao {
 private $host;
 private $user;
 private $password;
 private $db; 
 private static $pdo;

        public function __construct(){
            $this->host = "localhost";
            $this->db ="zuriel";
            $this->user = "root";
            $this->password = "";
        }

public function conectar(){

    try{
        if(is_null(self::$pdo)){ 
        self::$pdo = new PDO ("mysql:host=".$this->host.";dbname=".$this->db , $this->user , $this->password);
            }
        return self::$pdo;
                }catch(PDOException $e){   
            }
        } 
    }
?>