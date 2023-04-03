<?php

use Usuario\PessoaContato\Model\Pessoa;
use Usuario\PessoaContato\Controller\controllerPessoa;

include "Controller/controllerPessoa.php";

    $p = new Pessoa();
    $cp = new controllerPessoa();
?>


<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>        
</head>
<body>
    <?php include 'index.php'; ?>
    <form action="cadPessoa.php" id="form" method="post">
    <fieldset>
        <legend><?php echo $title; ?></legend>
        <input type="hidden" name="id" id="id" value="<?php echo $p['id'];?>">
        <label for="nome">Nome</label>        
        <input type="text" name="nome" id="nome" value="<?php echo $p['nome'];?>"
        placeholder="Nome" required="true">	                        
        <br><br>
        <label for="cpf">CPF</label>        
        <input type="text" name="cpf" id="cpf" value="<?php echo $p['cpf'];?>"
        placeholder="CPF" required="true">
        <br><br>
        <button name="acao" value="salvar" id="acao" type="submit">Cadastrar</button>         
    </fieldset>
    </form>
</body>
</html>