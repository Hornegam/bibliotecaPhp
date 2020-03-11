<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../model/Conexao.php';
        include_once '../model/EmprestarModel.php';

        $emprestar = new EmprestarModel();
        $emprestar->setDataRet('2020-3-10');
        $emprestar->setDataDev('2020-3-17');
        ?>
    </body>
</html>