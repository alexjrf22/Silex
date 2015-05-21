<?php

namespace Alex\Sistema\Interfaces;
use Alex\Sistema\Interfaces\ProdutoInterface;
use PDO;

interface ProdutoMapperInterface 
{
    
    public function inserir(ProdutoInterface $produto, PDO $pdo); 
    
}
