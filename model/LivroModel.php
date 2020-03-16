<?php

include_once 'Conexao.php';

class LivroModel {
    private $titulo;
    private $autor;
    private $publicacao;
    private $genero;

    public function criar() {
        $sql = "INSERT INTO livro
                        (
                            titulo,
                            autor,
                            publicacao,
                            genero
                        )
                        VALUES
                        (
                            '$this->titulo',
                            '$this->autor',
                            '$this->publicacao',
                            '$this->genero'   
                        );";
        try {
           //echo $sql;
           $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listar($campo = "*"){
        $sql = "SELECT $campo FROM livro;";             
        $items = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            $items = $rs->fetchAll();          
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($items);
        return $items;
    }

    public function listarItem($id){
        $sql = "SELECT * FROM livro LEFT JOIN status on livro.fk_status = status.CodEmprStatus WHERE codLivro = $id";             
        $usuarios = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                LivroModel::setTitulo($tmp->titulo);
                LivroModel::setAutor($tmp->autor);
                LivroModel::setPublicacao($tmp->publicacao);
                LivroModel::setGenero($tmp->genero);
                LivroModel::setStatus($tmp->fk_status);
            }
        }
        catch(PDOException $e)
        {
            
        }    
    }


    public function update($campo, $valor, $id){
        $sql = "UPDATE livro SET $campo='$valor' WHERE codLivro='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id){
        $sql= "DELETE FROM livro WHERE codLivro='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function getPublicacao() {
        return $this->publicacao;
    }

    function setPublicacao($publicacao) {
        $this->publicacao = $publicacao;
    }

    function getGenero() {
        return $this->genero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function getStatus($status) {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }

    function __construct() {
        $this->conexao = Conexao::getInstance();
    }
}