<?php
use Usuario\PessoaContato\Controller\ControllerPessoa;
header('Content-Type: text/html; charset=UTF-8');
require_once 'vendor/autoload.php';
require 'src/EntityManagerFactory.php';

$acao = '';
$ControllerPessoa = new ControllerPessoa();
$acao = null;
if (isset($_POST["acao"])) {
	$acao = $_POST["acao"];
}
if (isset($_GET["acao"])) {
	$acao = $_GET["acao"];
}
if ($acao != null) {
	if ($acao == 3) {
		$codigo = $_GET["id"];
		$ControllerPessoa->excluir($codigo, $entityManager);
	} else {
		if ($acao == 1) {
			$nome = $_POST["nome"];
			$cpf = $_POST["cpf"];
			$ControllerPessoa->incluir($nome, $cpf, $entityManager);
		}
		else {
			$codigo = $_POST["id"];
			$nome = $_POST["nome"];
			$cpf = $_POST["cpf"];
			$ControllerPessoa->atualiza($codigo, $nome, $cpf, $entityManager);
			}
	}
	header('location:pessoa.php');
} else {
	$ControllerPessoa->view($entityManager);
}
?>