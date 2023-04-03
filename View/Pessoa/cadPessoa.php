<?php

use Usuario\PessoaContato\Model\Pessoa;

require_once __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/EntityManagerFactory.php';


$title = "Cadastro de Pessoas";

$p = new Pessoa();

if(isset($_POST['nome'],$_POST['cpf'])){

    $p->$nome = $_POST['nome'];
    $p->$cpf = $_POST['cpf'];
    $p->inserir();
}  
?>