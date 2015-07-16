<?php

namespace Alex\Sistema\Entity;

class Produto 
{
    public $id;
    public $nome;
    public $descricao;
    public $valor;
            
    public function getId() {
        return $this->id;
    }

    public  function getNome() {
        return $this->nome;
    }

    public  function getDescricao() {
        return $this->descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public  function setId($id) {
        $this->id = $id;
    }

    public  function setNome($nome) {
        $this->nome = $nome;
        return $this->nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this->descricao;
    }

    public function setValor($valor) {
        $this->valor = $valor;
        return $this->valor;
    }

}
