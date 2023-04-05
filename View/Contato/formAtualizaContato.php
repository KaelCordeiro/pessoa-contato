<html>
<head>
    <meta charset="UTF-8">
    <title>Atualização do Contato</title>        
</head>
<body>
    <form action="/contato.php" method="post">
    <fieldset>
        <label for="nome">ID:</label>
        <input type="number" name="id" id="id" placeholder="id" required="true">
        <br><br>
        <label for="tipo">Tipo:</label>      
		<input type="radio" name="tipo" value="0"/>Telefone
        <input type="radio" name="tipo" value="1"/>Email                     
        <br><br>
        <label for="descricao">Descrição:</label>        
        <input type="text" name="descricao" id="descricao" placeholder="Descrição" required="true">
        <br><br>
        <label for="descricao">ID Pessoa:</label>        
        <input type="number" name="idPessoa" id="idPessoa" placeholder="ID Pessoa" required="true">
        <br><br>
        <button name="acao" id="acao" type="submit">Atualizar</button>         
    </fieldset>
    </form>
</body>
</html>