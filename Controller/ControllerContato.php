<?php

namespace Usuario\PessoaContato\Controller;
use Usuario\PessoaContato\Model\Contato;
require_once __DIR__.'/../vendor/autoload.php';

class ControllerContato {

    public function incluirContato(bool $tipo, string $descricao, int $id, $entityManager){
        $Contato = new Contato();

        $pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);

        $Contato->setTipo($tipo);
        $Contato->setDescricao($descricao);
        $Contato->setPessoa($pessoa);
        $Contato->setEntityManager($entityManager);
        $Contato->inserir();
        $this->viewContato($entityManager);
    }

    public function atualizaContato(int $idCont, bool $tipo, string $descricao, int $id, $entityManager){
        $pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);

        $Contato = $entityManager->find('Usuario\PessoaContato\Model\Contato', $idCont);
        $Contato->setTipo($tipo);
        $Contato->setDescricao($descricao);
        $Contato->setPessoa($pessoa);
        $Contato->setEntityManager($entityManager);
        $Contato->atualizar();
        $this->viewContato($entityManager);
    }

    public function excluirContato(int $id, $entityManager){
        $Contato = new Contato();
        $Contato = $entityManager->find('Usuario\PessoaContato\Model\Contato', $id);
        $Contato->setEntityManager($entityManager);
        $Contato->excluir();
        $this->viewContato($entityManager);
    }

    public function visualizaContato(int $id, $entityManager){
        $Contato = new Contato();
        $Contato->setId($id);
        $Contato->setEntityManager($entityManager);
        $Contato->visualizarContato();
    }

    public function viewContato($entityManager){
        $Contato = new Contato();
        $Contato->setEntityManager($entityManager);
        $dados = $Contato->consultarContato();
        require './View/Contato/viewContato.php';
    }


}
?>