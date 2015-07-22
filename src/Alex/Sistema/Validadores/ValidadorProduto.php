<?php
namespace Alex\Sistema\Validadores;

use Alex\Sistema\Entity\Produto;
use Alex\Sistema\Abstracts\AbstractValidador;

class ValidadorProduto extends AbstractValidador
{
    private $produto;
    private $erros = array();
    
    public function validarProduto(Produto $produto)
    {
        $this->produto = $produto;
        $this->erros = array('nome' => null, 'descricao' => null, 'valor' => null);
        
        if($this->isEmpty($this->produto->getNome()))
        {
            $this->erros['nome'] = "{{ Nome }} Não pode estar vazio.";
            //$this->erros .= "{{ Nome }} Não pode estar vazio."."<br>";
        } elseif ($this->minStrLength($this->produto->getNome(), 3)) {
            $this->erros['nome'] = "{{ Nome }} Não pode conter menos que 3 caracteres.";
            //$this->erros .= "{{ Nome }} Não pode conter mais que 255 caracteres."."<br>";
        } elseif ($this->maxStrLength($this->produto->getNome(), 255)) {
            $this->erros['nome'] = "{{ Nome }} Não pode conter mais que 255 caracteres.";
            //$this->erros .= "{{ Nome }} Não pode conter mais que 255 caracteres."."<br>";
        }
        
        if($this->isEmpty($this->produto->getDescricao()))
        {
            $this->erros['descricao'] = "{{ Descrição }} Não pode estar vazio.";
            //$this->erros .= "{{ Descrição }} Não pode estar vazio."."<br>";
        } elseif ($this->minStrLength($this->produto->getDescricao(), 20)) {
            $this->erros['descricao'] = "{{ Descrição }} Não pode conter menos que 20 caracteres.";
            //$this->erros .= "{{ Descrição }} Não pode conter menos que 20 caracteres."."<br>";
        }
        
        if($this->isEmpty($this->produto->getValor()))
        {
            $this->erros['valor'] = "{{ Valor }} Não pode estar vazio.";
            //$this->erros .= "{{ Valor }} Não pode estar vazio."."<br>";
        } elseif (!$this->isNumeric($this->produto->getValor())) {
            $this->erros['valor'] = "{{ Valor }} Deve ser numérico.";
            //$this->erros .= "{{ Valor }} Deve ser numérico."."<br>";
        } elseif (!$this->isNaturalNumber($this->produto->getValor())) {
            $this->erros['valor'] = "{{ Valor }} Não pode ser negativo.";
            //$this->erros .= "{{ Valor }} Não pode ser negativo."."<br>";
        } elseif ($this->isZero($this->produto->getValor())){
            $this->erros['valor'] = "{{ Valor }} Não pode ser zero.";
            //$this->erros .= "{{ Valor }} Não pode ser zero."."<br>";
        }
        // verifica se algum erro foi encontrado
        foreach($this->erros as $erro)
        {
            if ($erro <> null)
            {
                return $this->erros;
            }
          
        }
        
        return true;
                  
    }
}
