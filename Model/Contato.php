<?php 
namespace Usuario\PessoaContato\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use  Usuario\PessoaContato\Model\Pessoa;
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/EntityManagerFactory.php';

/**
 * @Entity
 * @Table(name="contato")
 */
class Contato 
{

    /**
    * @ManyToOne(targetEntity="Pessoa")
    * @JoinColumn(name="idPessoa", referencedColumnName="id")
    */
    private $Pessoa;

    /**
     * @Id 
     * @Column(type="integer") 
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="boolean")
     */
    private bool $tipo;

    /**
     * @Column(type="string")
     */
    private string $descricao;

    /**
     * @var EntityManager
     */
    private $EntityManager;

    public function __construct() 
    {
        $this->Pessoa = new Pessoa();
    }

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

    public function visualizarContato()
    {
        $query =  $this->getEntityManager()->getConnection()->query(
            'SELECT * FROM  CONTATO WHERE ID = '.$this->getId()
        );
        return $query->fetchAllAssociative();
    }

    public function consultarContato()
    {
        $listContato =  $this->getEntityManager()->getConnection()->query(
            'SELECT * FROM  CONTATO'
        )->fetchAllAssociative();
        $contatos = array();
        foreach($listContato as $dadosContato){
            $Contato = new Contato();
            $Contato->setId($dadosContato["id"]);
            $Contato->setTipo($dadosContato["tipo"]);
            $Contato->setDescricao($dadosContato["descricao"]);
            $Contato->getPessoa()->setId($dadosContato["idPessoa"]);
            $contatos[] = $Contato;
        }
        return $contatos;  
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo(bool $tipo)
    {
        $this->tipo = $tipo;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


    public function getPessoa()
    {
        return $this->Pessoa;
    }
    public function setPessoa(Pessoa $pessoa)
    {
        $this->Pessoa = $pessoa;
        return $this;
    }

    /**
     * @return EntityManager
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