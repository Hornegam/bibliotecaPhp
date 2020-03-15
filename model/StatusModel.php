<?php

include_once 'Conexao.php';

class StatusModel {



    public function criar() {
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