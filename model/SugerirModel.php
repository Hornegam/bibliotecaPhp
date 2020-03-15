<?php

include_once 'Conexao.php';

class SugerirModel {


    public function criar() {
        $sql = "INSERT INTO status(codEmprStatus, tipoStatus) VALUES ('$codStatus', '$status');";
        $this->conexao->executar($sql); 
    }

    public function listar(){
    }

    public function update($campo, $valor, $id){
    }

    public function delete($id){
    }


function __construct() {
    $this->conexao = Conexao::getInstance();
}

}