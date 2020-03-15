<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       // include_once '../model/AgendarModel.php';
       // include_once '../model/comentarModel.php';
       // include_once '../model/EmprestarModel.php';
       // include_once '../model/LivroModel.php';
       // include_once '../model/StatusModel.php';
       // include_once '../model/SugerirModel.php';
        include_once '../model/UsuarioModel.php';
       
       //$status = new StatusModel();
       //$status->criar(4,"Teste");
       //$status->listar();
       //$status->update("tipoStatus", "Disponível", 0);
       
       //$livro = new LivroModel();
       //var_dump($livro->listarLivro(1));
       
       //$sugerir = new SugerirModel();

        /*
       private $prontuario;
       private $rg;
       private $cpf;
       private $nome;
       private $senha;
       private $emissor;
       private $conexao;
        */
        
        //Teste Usuario para agendar
       
        $user = new UsuarioModel();
        //listarItem passa por parametro do prontuario, e busca as informações do usuario especifico
        $user->listarItem(6);
        $user->agendar(1);
        //$user->comentar(1,"Ah o livro é muito zica");
        
        
       ?>


</body>
</html>