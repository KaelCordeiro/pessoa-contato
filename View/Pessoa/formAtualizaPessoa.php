<html>
<head>
    <meta charset="UTF-8">
    <title>Atualização da Pessoa</title>        
</head>
<body>
    <form action="/pessoa.php" method="post">
    <fieldset>
        <label for="nome">ID:</label>
        <input type="number" name="id" id="id" placeholder="id" required="true">
        <br><br>
        <label for="nome">Nome:</label>        
        <input type="text" name="nome" id="nome" placeholder="Nome" required="true">	                        
        <br><br>
        <label for="cpf">CPF:</label>        
        <input type="text" name="cpf" id="cpf" placeholder="CPF" required="true">
        <br><br>
        <button name="acao" id="acao" type="submit">Atualizar</button>         
    </fieldset>
    </form>
</body>
</html>