<?php

class Conexao {

    private $senha;
    private $usuario;
    private $base;
    private $host;
    private $conexao;
    private static $instance;

    private function __construct() {
        $this->set("127.0.0.1", "biblioteca", "root", "");
        $this->conectar();
    }

    public function set($host, $base, $usuario, $senha) {
        $this->host = $host;
        $this->base = $base;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function conectar() {
        try {
            $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->base", $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conectado <br>";
        } catch (PDOException $e) {
            echo 'ERRO DE CONEXAO: ' . $e->getMessage();
        }
    }
    
    public function executar($sql){
        try {
            if(isset($this->conexao)){
                $this->conexao->exec($sql);
                echo "inserido";
            }
        } catch (PDOException $e) {
            echo 'ERRO DE CONEXAO: ' . $e->getMessage();
        }
    }
    
    public function carregar($sql){
        try {
            $result= array();
            if(isset($this->conexao)){
                $result= $this->conexao->query($sql);
                echo "inserido";
            }
        } catch (PDOException $e) {
            echo 'ERRO DE CONEXAO: ' . $e->getMessage();
        } 
        return $result;
        
    }
}


