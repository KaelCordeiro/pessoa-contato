<?php
namespace Usuario\PessoaContato\View;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/EntityManagerFactory.php';

$title = "Cadastro de Contatos";
    include 'Controller/controllerContato.php';
    include 'acaoContato.php';
    $acao = '';
    $codigo = '';
    $dados;
    if (isset($_GET["acao"]))
        $acao = $_GET["acao"];
    if ($acao == "editar"){
        if (isset($_GET["id"])){
            $codigo = $_GET["id"];
            $dados = carregaBDParaVetor($codigo); 
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>        
</head>
<body>
    <?php include 'index.php'; ?>
    <form action="acaoContato.php" id="form" method="post">
    <fieldset>
        <legend><?php echo $title; ?></legend>
        <input type="readonly" name="id" id="codigo" value="<?php if ($acao == "editar") echo $dados['id']; else echo "0";?>">
        <label for="nome">Nome</label>        
        <input type="text" name="nome" id="nome" value="<?php if ($acao == "editar") echo $dados['nome'];?>"
        placeholder="Nome" required="true">	                        
        <br><br>
        <label for="nome">Descricao</label>        
        <input type="text" name="descricao" id="descricao" value="<?php if ($acao == "editar") echo $dados['descricao'];?>"
        placeholder="Descricao" required="true">
        <br><br>
        <label for="nome">ID Pessoa</label>        
        <input type="text" name="idPessoa" id="idPessoa" value="<?php if ($acao == "editar") echo $dados['idPessoa'];?>"
        placeholder="IDPessoa" required="true">
        <button name="acao" value="salvar" id="acao" 
        type="submit">Cadastrar</button>
        <a href="listContato.php">Consultar</a>         
    </fieldset>
    </form>
</body>
</html>
