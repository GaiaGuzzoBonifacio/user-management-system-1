<?php
namespace sarassoroberto\usm\entity;

class Interesse {

    private $interesseId;
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    

    /**
     * Get the value of interesseId
     */ 
    public function getInteresseId()
    {
        return $this->interesseId;
    }

    /**
     * Set the value of interesseId
     *
     * @return  self
     */ 
    public function setInteresseId($interesseId)
    {
        $this->interesseId = $interesseId;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
}