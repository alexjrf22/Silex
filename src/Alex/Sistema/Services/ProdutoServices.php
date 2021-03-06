<?php

namespace Alex\Sistema\Services;
use Alex\Sistema\Entity\Produto;

class ProdutoServices
{
    
    private $produto;

    public function __construct(Produto $produto) 
    {
        $this->produto = $produto;
       
    }
    //retorna um objeto produto com valores passados pelo usuario.
    public function criarProduto(array $dados)
    {
       
            $produto = $this->produto;
            (!empty($dados['id'])) ? $produto->setId($dados['id']) : null;
            $produto->setNome($dados['nome']);
            $produto->setDescricao($dados['descricao']);
            $produto->setValor($dados['valor']);
           
            return ($produto);
            
    }
        

}
