<?php

namespace Alex\Sistema\Services;
use Alex\Sistema\Interfaces\ProdutoInterface;

class ProdutoServices
{
    
    private $produto;

    public function __construct(ProdutoInterface $produto) 
    {
        $this->produto = $produto;
       
    }
    //retorna um objeto produto com valores passados pelo usuario.
    public function criarProduto(array $dados)
    {
       
            $produto = $this->produto;
            
            $nome = $produto->setNome($_POST['nome']);
            $descricao = $produto->setDescricao($_POST['descricao']);
            $valor = $produto->setValor($_POST['valor']);

            return ($produto);
            
    }
        

}
