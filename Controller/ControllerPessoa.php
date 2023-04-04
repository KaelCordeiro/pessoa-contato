<?php
namespace Usuario\PessoaContato\Controller;
use Usuario\PessoaContato\Model\Pessoa;
require_once __DIR__.'/../vendor/autoload.php';

class ControllerPessoa {

    public function incluir(string $nome, string $cpf, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa->setNome($nome);
        $Pessoa->setCpf($cpf);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->inserir();
        $this->view($entityManager);
    }

    public function atualiza(int $id, string $nome, string $cpf, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);
        $Pessoa->setNome($nome);
        $Pessoa->setCpf($cpf);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->atualizar();
        $this->view($entityManager);
    }

    public function excluir(int $id, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->excluir();
        $this->view($entityManager);
    }

    public function visualiza(int $id, $entityManager){
        $Pessoa = new Pessoa();
        $Pessoa->setId($id);
        $Pessoa->setEntityManager($entityManager);
        $Pessoa->visualizarPessoa();

    }

    public function view($entityManager){
        $Pessoa = new Pessoa();
        $Pessoa->setEntityManager($entityManager);
        $dados = $Pessoa->consultarPessoa();
        require './View/Pessoa/viewPessoa.php';
    }


}
?>