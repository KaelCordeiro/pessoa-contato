<html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Cadastro e Lista de Pessoas</title>
      <script src="View/Pessoa/Js/viewPessoa.js"></script>
    </head> 
    <body>
      <a href="View/Pessoa/formPessoa.php">Incluir</a> 
      <br><br>
      <table border="1"> 
        <tr>  
          <th>Id</th> 
          <th>Nome</th> 
          <th>CPF</th> 
          <th>Ação</th> 
        </tr> 
        <?php foreach($dados as $Pessoa) { ?> 
        <tr> 
          <td><?=$Pessoa->getId(); ?></td>
          <td><?=$Pessoa->getNome(); ?></td> 
          <td><?=$Pessoa->getCpf(); ?></td> 
          <td> 
            <a href="./pessoa.php?codigo=<?=$Pessoa->getId(); ?>">Editar</a> 
            <a href="javascript:func()" onclick="confirmacao(<?=$Pessoa->getId()?>)">Excluir</a> 
          </td> 
        </tr> 
        <?php }  ?> 
      </table> 
    </body> 
</html>