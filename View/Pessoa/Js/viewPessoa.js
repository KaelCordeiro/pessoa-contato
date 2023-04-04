function confirmacao(id) {
    var resposta = confirm("Deseja excluir a pessoa?");
    if (resposta == true) {
         window.location.href = "pessoa.php?acao=3&id="+id;
    }
}