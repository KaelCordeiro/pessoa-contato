<?php 
namespace Usuario\PessoaContato\Model;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/EntityManagerFactory.php';

/**
 * @Entity @Table(name="pessoa")
 */
class Pessoa 
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $nome;

    /**
     * @Column(type="string")
     */
    private string $cpf;

    private $EntityManager;
    
    public function inserir() {
        $this->getEntityManager()->persist($this);
        $this->getEntityManager()->flush();

        return true;
    }

    public function atualizar(){
        $this->getEntityManager()->flush();
        return true;
        
    }

    public function excluir(){
        $this->getEntityManager()->remove($this);
        $this->getEntityManager()->flush();
        return true;
    }

    public function visualizarPessoa()
    {
        return $this->getEntityManager()->find('Usuario\PessoaContato\Model\Pessoa', $this->getId());
    }

    public function consultarPessoa()
    {
        return $this->getEntityManager()->getRepository("Usuario\PessoaContato\Model\Pessoa")->findAll();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setCPF(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Get the value of EntityManager
     */ 
    public function getEntityManager()
    {
        return $this->EntityManager;
    }

    /**
     * Set the value of EntityManager
     *
     * @return  self
     */ 
    public function setEntityManager($EntityManager)
    {
        $this->EntityManager = $EntityManager;
        return $this;
    }


}
?>