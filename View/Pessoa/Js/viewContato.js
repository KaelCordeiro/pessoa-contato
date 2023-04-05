function confirmacao(id) {
    var resposta = confirm("Deseja excluir o contato?");
    if (resposta == true) {
         window.location.href = "contato.php?acao=3&id="+id;
    }
}