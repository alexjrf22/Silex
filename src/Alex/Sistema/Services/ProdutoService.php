<?php

namespace Alex\Sistema\Services;
use Alex\Sistema\Interfaces\ProdutoInterface;

class ProdutoService 
{
    
    private $produto;

    public function __construct(ProdutoInterface $produto) 
    {
        $this->produto = $produto;
       
    }
  
    public function criarProduto(array $dados)
    {
       
            $produto = $this->produto;
            
            $nome = $produto->setNome($_POST['nome']);
            $descricao = $produto->setDescricao($_POST['descricao']);
            $valor = $produto->setValor($_POST['valor']);

            return ($produto);
            
    }
        

}

