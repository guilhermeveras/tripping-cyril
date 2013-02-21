<?php

namespace Atonbox\ContatoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contato
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_seq", type="bigint")
     */
    private $num_seq;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set num_seq
     *
     * @param integer $numSeq
     * @return Contato
     */
    public function setNumSeq($numSeq)
    {
        $this->num_seq = $numSeq;
    
        return $this;
    }

    /**
     * Get num_seq
     *
     * @return integer 
     */
    public function getNumSeq()
    {
        return $this->num_seq;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Contato
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }
}
