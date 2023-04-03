<?php

use Doctrine\ORM\EntityManager;
use Usuario\PessoaContato\Model\Pessoa;
use Usuario\PessoaContato\Model\Contato;
require_once __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/EntityManagerFactory.php';

class ControllerContato {

    public function incluirContato(bool $tipo, string $descricao, int $id, $entityManager){
        $Contato = new Contato();

        $pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);

        $Contato->setTipo($tipo);
        $Contato->setDescricao($descricao);
        $Contato->setPessoa($pessoa);
        $Contato->setEntityManager($entityManager);
        $Contato->inserir();
        echo 'Contato Criado ID '.$Contato->getId()."\n";
    }

    public function atualizaContato(int $idCont, bool $tipo, string $descricao, int $id, $entityManager){
        $pessoa = $entityManager->find('Usuario\PessoaContato\Model\Pessoa', $id);

        $Contato = $entityManager->find('Usuario\PessoaContato\Model\Contato', $idCont);
        $Contato->setTipo($tipo);
        $Contato->setDescricao($descricao);
        $Contato->setPessoa($pessoa);
        $Contato->setEntityManager($entityManager);
        $Contato->atualizar();
        echo 'Contato ID '.$Contato->getId(). ' atualizada' ."\n";
    }

    public function excluirContato(int $id, $entityManager){
        $Contato = new Contato();
        $Contato = $entityManager->find('Usuario\PessoaContato\Model\Contato', $id);
        $Contato->setEntityManager($entityManager);
        $Contato->excluir();
        echo 'Contato excluído com sucesso!';
    }

    public function visualizaContato(int $id, $entityManager){
        $Contato = new Contato();
        $Contato->setId($id);
        $Contato->setEntityManager($entityManager);
        $Contato->visualizarContato();
    }

    public function consultaContato($entityManager){
        $Contato = new Contato();
        $Contato->setEntityManager($entityManager);
        foreach ($Contato->consultarContato() as $Contato) {
            echo $Contato->getId().' '.$Contato->getDescricao().' | ';
        }
    }


}
?>