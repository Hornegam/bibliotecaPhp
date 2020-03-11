<?php

include_once 'Conexao.php';

class AgendarModel {

    private $prontuarioUserAge;
    private $codLivroAge;
    private $publLivroAge;
    private $conexao;

    public function criar() {
        $sql = "INSERT INTO agendar
                        (
                            prontuarioUserAge,
                            codLivroAge,
                            publAge
                        )
                        VALUES
                        (
                            '$this->prontuarioUserAge',
                            '$this->codLivroAge',
                            '$this->publLivroAge'  
                        );";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listar(){
        $sql = 'SELECT * FROM agendar;';             
        $usuarios = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                $agendar = new AgendarModel();
                $agendar->setProntuarioUserAge($tmp->prontuarioUserAge);
                $agendar->setcodLivroAge($tmp->codLivroAge);
                $agendar->setpublLivroAge($tmp->publAge);
                array_push($usuarios, $agendar);
            }
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($usuarios);
        return $usuarios;
    }

    public function update($campo, $valor, $id){
        $sql = "UPDATE agendar SET $campo='$valor' WHERE prontuarioUserAge='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($idPr,$idLiv){
        $sql= "DELETE FROM agendar WHERE prontuario='$idPr' and codLivroAge='$idLiv'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



//------------- GETTERS and SETTERS --------------------------------------------    
    function getProntuarioUserAge() {
        return $this->prontuarioUserAge;
    }

    function getCodLivroAge() {
        return $this->codLivroAge;
    }
    
    function getPublLivroAge() {
        return $this->publLivroAge;
    }

    function setProntuarioUserAge($prontuarioUserAge) {
        $this->prontuarioUserAge = $prontuarioUserAge;
    }

    function setCodLivroAge($codLivroAge) {
        $this->codLivroAge = $codLivroAge;
    }

    function setPublLivroAge($publLivroAge) {
        $this->publLivroAge = $publLivroAge;
    }

    function __construct() {
        $this->conexao = Conexao::getInstance();
    }

}
