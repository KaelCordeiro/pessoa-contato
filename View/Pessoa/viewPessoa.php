<html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Pessoas</title> 
    </head> 
    <body> 
      <table border="1"> 
        <tr> 
          <td>Id</td> 
          <td>Nome</td> 
        </tr> 
        <?php foreach($dados as $pessoa) { ?> 
        <tr> 
          <td><?php echo $pessoa['id']; ?></td>
          <td><?php echo $pessoa['nome']; ?></td> 
          <td> 
            <a href="usu_editar.php?codigo=<?php echo $pessoa['id']; ?>">Editar</a> 
            <a href="javascript:excluirRegistro('acaoPessoa.php?acao=excluir&id=<?php echo $pessoa['id'];?>')">Excluir</a> 
          </td> 
        </tr> 
        <?php }  ?> 
      </table> 
    </body> 
</html>