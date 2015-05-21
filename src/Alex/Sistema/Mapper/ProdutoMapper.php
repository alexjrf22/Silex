<?php

namespace Alex\Sistema\Mapper;
use Alex\Sistema\Interfaces\ProdutoInterface;
use PDO;
use Alex\Sistema\Interfaces\ProdutoMapperInterface;

class ProdutoMapper implements ProdutoMapperInterface
{
    public function inserir(ProdutoInterface $produto, PDO $pdo)
    {     
        
        $query = "insert produtos (nome, descricao, valor) values (:nome, :descricao, :valor)";
        $inserir = $pdo->prepare($query);
        $inserir->bindValue(":nome", $produto->getNome($nome));
        $inserir->bindValue(":descricao", $produto->getDescricao($descricao));
        $inserir->bindValue(":valor", $produto->getValor($valor));

        $inserir->execute();
        
        if ($inserir->rowCount() > 0)
        {
            return 'Produto inserido com sucesso.';
        }else
        {
            return 'Produto não foi inserido';
        }
        
        
    }
}
