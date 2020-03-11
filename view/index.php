<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../model/Conexao.php';
        include_once '../model/LivroModel.php';
        
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        /*$usuario = new UsuarioModel();
        //$usuario->setProntuario(9003);
<<<<<<< HEAD
       // $usuario->setNome('Belta515arano');
       // $usuario->setCpf('12345678913');
       // $usuario->setRg('123456173');
       // $usuario->setSenha('abaa23');
        //$usuario->setEmissor('SP');
        //$usuario->criar();
        //$usuario->listar();
        $usuario = new LivroModel();
        
        //$usuario->setTitulo('asda');
        //$usuario->setAutor('cuzaoXico');
      // $usuario->setPublicacao('2000-02-20');
        //$usuario->setGenero('gay');
        //$usuario->criar();
        //$usuario->listar();
        //$usuario->update('titulo', 'lucas', '12');
        $usuario->delete('12');
=======
        $usuario->setNome('Beltrano');
        $usuario->setCpf('18346188912');
        $usuario->setRg('11434677');
        $usuario->setSenha('abcuuhhu');
        $usuario->setEmissor('SP');
<<<<<<< HEAD
        */
        $livro = new AgendarModel();
        /*$livro->setProntuarioUserAge('6');
        $livro->setCodLivroAge('1');
        $livro->setPublLivroAge('2000-02-02');
        $livro->criar();*/
        //$livro->listar();
        $livro->update('publAge','2050-12-12','6');


        //$usuario->insert();
=======
        $usuario->criar();
>>>>>>> 8594676711dc74cacceeec17cc2b98a1b59bce5c
        //$usuario->listar();
>>>>>>> 6437b6703b8cd93af04210a6025012a4434bfc7a
        ?>
    </body>
</html>
