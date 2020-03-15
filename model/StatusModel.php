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
        $usuarios = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                $usuario = new LivroModel();
                $usuario->setTitulo($tmp->titulo);
                $usuario->setAutor($tmp->autor);
                $usuario->setPublicacao($tmp->publicacao);
                $usuario->setGenero($tmp->genero);
                $usuario->setStatus($tmp->fk_status);
                array_push($usuarios, $usuario    );
            }
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($usuarios);
        return $usuarios;
        
    }

    public function update($campo, $valor, $id){
        $sql = "UPDATE status SET $campo='$valor' WHERE codEmprStatus='$id'";
        $this->conexao->executar($sql);            
    }

    public function delete($id){
   $sql= "DELETE FROM status WHERE codEmprStatus='$id'";
    }


    function setCodStatus($codStatus){
    $this->codStatus = $codStatus;
    }
    function getCodStatus(){
        return $this->codStatus;
    }

    function setTipoStatus($status){
        $this->status = $status;
        }
        function getTipoStatus(){
            return $this->status;
        }
    

function __construct() {
    $this->conexao = Conexao::getInstance();
}

}