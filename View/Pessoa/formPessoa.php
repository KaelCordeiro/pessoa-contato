<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pessoa</title>        
</head>
<body>
    <form action="/pessoa.php" method="post">
    <fieldset>
        <input type="number" name="id" id="id" readonly>
        <br><br>
        <label for="nome">Nome:</label>        
        <input type="text" name="nome" id="nome" placeholder="Nome" required="true">	                        
        <br><br>
        <label for="cpf">CPF:</label>        
        <input type="text" name="cpf" id="cpf" placeholder="CPF" required="true">
        <br><br>
        <button name="acao" value="1" id="acao" type="submit">Cadastrar</button>         
    </fieldset>
    </form>
</body>
</html>