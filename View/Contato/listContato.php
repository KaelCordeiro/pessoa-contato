<?php

    $title = "Lista de Contatos";
    $procurar = '';
	if (isset($_POST["procurar"]))
        $procurar = $_POST["procurar"];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
</head>
<body>
    <?php include 'index.php'; ?>
    <form method="post">
    <fieldset>
        <legend><?php echo $title; ?></legend>
        <input type="text"   name="procurar" list="contatos"
               id="procurar" size="37" value="<?php echo $procurar;?>">
        <datalist id="contatos">
        <?php 
            $sql = 'SELECT * FROM '.$tb_contato;
            $result = mysqli_query($conexao,$sql);
            while ($row = mysqli_fetch_array($result))
                echo '<option value="'.$row['id'].'">';
        ?>
        </datalist>
        <input type="submit" name="acao" id="acao">
        <a href="cadContato.php">Novo cadastro de Contato</a>
        <br><br>
        <table width="60%">
	    <tr><th align="center"><b>Código</b></th>
            <th align="center"><b>Tipo<b></th> 
            <th align="center"><b>Descrição</b></th> 
            <th align="center"><b>ID Pessoa</b></th> 
            <th width="20"><b>Alterar</b></th>
            <th width="20"><b>Excluir</b></th>
	    </tr>
        <?php
            $sql = 'SELECT * FROM '.$tb_contato.
                   '"';
            echo $sql;
            $result = mysqli_query($conexao,$sql);
            $cont = 0;
            while ($row = mysqli_fetch_array($result)){ 
            if ($cont % 2 == 0)
                echo '<tr>';
            else
                echo '<tr class="sombra">';
            $cont++;
        ?>
	        <td align="center"><?php echo $row['id'];?></td>
            <td align="center"><?php echo $row['tipo'];?></td> 
            <td align="center"><?php echo $row['descricao'];?></td>    
            <td align="center"><?php echo $row['idPessoa'];?></td> 
            
            <td align="center"><a href="cadContato.php?acao=editar&id=<?php echo $row['id'];?>">Editar</a></td>
            <td align="center"><a href="javascript:excluirRegistro('acaoContato.php?acao=excluir&id=<?php echo $row['id'];?>')">Excluir</a></td>
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
    <br>
</body>
</html>