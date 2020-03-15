<?php

include_once 'Conexao.php';

class StatusModel {

    private $codStatus;
    private $status;


    public function criar($codStatus, $status) {
        $sql = "INSERT INTO status(codEmprStatus, tipoStatus) VALUES ('$codStatus', '$status');";
        $this->conexao->executar($sql);            
    }

    public function listar(){
        $sql = "SELECT * FROM status";
        $this->conexao->executar($sql);            
    }

    public function update($campo, $valor, $id){
        $sql = "UPDATE status SET $campo='$valor' WHERE codEmprStatus='$id'";
        $this->conexao->executar($sql);            
    }

    public function delete($id){
   $sql= "DELETE FROM status WHERE codEmprStatus='$id'";

    }


function __construct() {
    $this->conexao = Conexao::getInstance();
}

}