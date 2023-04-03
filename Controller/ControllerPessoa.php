<?php
use Usuario\PessoaContato\Model\Pessoa;
require_once __DIR__.'/../vendor/autoload.php';

class ControllerPessoa {

    public function incluirPessoa(string $nome, string $cpf, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa->setNome($nome);
        $Pessoa->setCpf($cpf);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->inserir();
    }

    public function atualizaPessoa(int $id, string $nome, string $cpf, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);
        $Pessoa->setNome($nome);
        $Pessoa->setCpf($cpf);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->atualizar();
    }

    public function excluirPessoa(int $id, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->excluir();
    }

    public function visualizaPessoa(int $id, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa->setId($id);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->visualizarPessoa();

    }

    public function view($entityManager){
        $Pessoa = new Pessoa();
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->consultarPessoa();
    }


}
?>