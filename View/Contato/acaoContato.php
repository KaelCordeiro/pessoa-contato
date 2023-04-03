<?php

header('Content-Type: text/html; charset=UTF-8');
	
	$acao = '';
	if (isset($_GET["acao"]))
		  $acao = $_GET["acao"];
	
	if ($acao == "excluir"){
		$codigo = 0;
		if (isset($_GET["id"])){
		  	$codigo = $_GET["id"];
			excluir($codigo);
		}
	}else{
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
	
	function excluir($codigo){
		$sql = 'DELETE FROM '.$GLOBALS['tb_contato'].
		       ' WHERE id =  '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		header("location:listContato.php");
	}

	function alterar($codigo){
		$vet = carregarTelaParaVetor();
		$sql = 'UPDATE '.$GLOBALS['tb_contato'].
		       ' SET tipo = "'.$vet['tipo'].
		       '" WHERE id = '.$codigo;
        $sql1 = 'UPDATE '.$GLOBALS['tb_contato'].
		        ' SET descricao = "'.$vet['descricao'].
		        '" WHERE id = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql,$sql1);
		header("location:cadContato.php?acao=editar&id=$codigo");
	}
	
	function inserir(){	
		$vet = carregarTelaParaVetor();
		$sql = 'INSERT INTO '.$GLOBALS['tb_pessoa'].
		       '(tipo,descricao,idPessoa)'. 
		       'VALUES ("'.$vet['tipo'].
		       '","'.$vet['descricao'].
               '","'.$vet['idPessoa'].
               '")';
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$codigo = mysqli_insert_id($GLOBALS['conexao']);
		header("location:cadContato.php?acao=editar&id=$codigo");
	}
	
	function carregarTelaParaVetor(){
		$vet = array();
		$vet['id'] = $_POST["id"];
		$vet['tipo'] = $_POST["tipo"];
        $vet['descricao'] = $_POST["descricao"];
        $vet['idPessoa'] = $_POST["idPessoa"];
		return $vet;		
	}	
		
	function carregaBDParaVetor($codigo){
		$sql = 'SELECT * FROM '.$GLOBALS['tb_contato'].
		       ' WHERE id = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$dados = array();
		while ($row = mysqli_fetch_array($result)){
			$dados['id'] = $row['id'];
			$dados['tipo'] = $row['tipo'];
            $dados['descricao'] = $row['descricao'];
            $dados['idPessoa'] = $row['idPessoa'];
		}   
		return $dados;               
	}
?>