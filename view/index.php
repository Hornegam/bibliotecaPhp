<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../model/Conexao.php';
        include_once '../model/UsuarioModel.php';
        include_once '../model/AgendarModel.php';

        //TO INSERINDO UM TESTE AQUI DO DANIEL
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        /*$usuario = new UsuarioModel();
        //$usuario->setProntuario(9003);
        $usuario->setNome('Beltrano');
        $usuario->setCpf('12346188912');
        $usuario->setRg('11234677');
        $usuario->setSenha('abc');
        $usuario->setEmissor('SP');
        */
        $livro = new AgendarModel();
        /*$livro->setProntuarioUserAge('6');
        $livro->setCodLivroAge('1');
        $livro->setPublLivroAge('2000-02-02');
        $livro->criar();*/
        //$livro->listar();
        $livro->update('publAge','2050-12-12','6');


        //$usuario->insert();
        //$usuario->listar();
        ?>
    </body>
</html>
