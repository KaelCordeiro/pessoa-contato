<html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Cadastro e Lista de Contatos</title>
      <script src="View/Contato/Js/viewContato.js"></script>
    </head> 
    <body>
      <a href="View/Contato/formContato.php">Incluir</a> 
      <br><br>
      <table border="1"> 
        <tr>  
          <th>Id</th> 
          <th>Tipo</th> 
          <th>Descrição</th> 
          <th>ID Pessoa</th> 
          <th>Ação</th> 
        </tr> 
        <?php foreach($dados as $Contato) { ?> 
        <tr> 
          <td><?=$Contato->getId(); ?></td>
          <td><?=$Contato->getTipo(); ?></td> 
          <td><?=$Contato->getDescricao(); ?></td> 
          <td><?=$Contato->getPessoa(); ?></td> 
          <td> 
            <a href="./contato.php?codigo=<?=$Contato->getId(); ?>">Editar</a> 
            <a href="javascript:func()" onclick="confirmacao(<?=$Contato->getId()?>)">Excluir</a> 
          </td> 
        </tr> 
        <?php }  ?> 
      </table> 
    </body> 
</html>