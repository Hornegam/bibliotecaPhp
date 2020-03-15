<?php

include_once 'Conexao.php';

class SugerirModel {


    public function criar() {
        $sql = "INSERT INTO sugerir(prontuarioUser,titulo, autor,publi,genero) VALUES ('$prontuario', '$titulo','$autor','$dataPublicacao','$genero');";
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