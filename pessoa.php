<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'vendor/autoload.php';
require 'src/EntityManagerFactory.php';

$acao = '';
if (isset($_GET["acao"]))
	$acao = $_GET["acao"];

if ($acao == "excluir"){
	$codigo = 0;
	if (isset($_POST["id"])){
		$codigo = $_POST["id"];
		excluir($codigo);
	}
} else {
	if (isset($_POST["acao"])){
		$acao = $_POST["acao"];
		if ($acao == "salvar"){
			$codigo = 0;
			if (isset($_POST["id"])){
				$codigo = $_POST["id"];
				if ($codigo == 0)
					inserir();
				else
					alterar($codigo);
			}
		}
	}
}
?>