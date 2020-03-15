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
    
    public function listar(){
        $sql = 'SELECT * FROM livro;';             
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
                array_push($usuarios, $usuario);
            }
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($usuarios);
        return $usuarios;
    }

    public function listarItem($id){
        $sql = "SELECT * FROM livro; WHERE codLivro = $id";             
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