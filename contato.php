<?php
use Usuario\PessoaContato\Controller\ControllerContato;
header('Content-Type: text/html; charset=UTF-8');
require_once 'vendor/autoload.php';
require 'src/EntityManagerFactory.php';

$acao = '';
$ControllerContato = new ControllerContato();
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
		$ControllerContato->excluirContato($id, $entityManager);
	} else {
		if ($acao == 1) {
			$tipo = $_POST["tipo"];
			$descricao = $_POST["descricao"];
            $id = $_POST["idPessoa"]; 
			$ControllerContato->incluirContato($tipo, $descricao, $id, $entityManager);
		}
		else {
            $idCont = $_POST["id"];
			$tipo = $_POST["tipo"];
			$descricao = $_POST["descricao"];
            $id = $_POST["idPessoa"]; 
			$ControllerContato->atualizaContato($idCont, $tipo, $descricao, $id, $entityManager);
		}
		
	}
	header('location:contato.php');
} else {
	$ControllerContato->viewContato($entityManager);
}
?>