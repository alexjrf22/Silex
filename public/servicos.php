<?php

    use Alex\Sistema\Mapper\ProdutoMapper;
    use Alex\Sistema\Entity\Produto;
    use Alex\Sistema\Services\ProdutoServices;
    use Alex\Sistema\Validadores\ValidadorProduto;
    use Alex\Sistema\DB\DB;
    
//instanciando uma nova conexão com DB
    $app['pdo'] = function (){
        $objDB = new DB("mysql:host=127.0.0.1;charset=utf8", "Silex", "root", "root");
        $pdo = $objDB->getConnection();
        return $pdo;
    };
    
    //criando um produto;
    $app['criar_produto'] = function (){
        $objProduto = new Produto();  
        $produto = new ProdutoServices($objProduto);
        return $produto;
    };
    
    $app['validar_produto'] = function (){
        $validador = new ValidadorProduto(); 
        return $validador;
    };
    
    //cria um mapeamento relacionado ao produto. Esse serviço possui um leke de opções 
    //(inserir, deletar, alterar e selecionar um ou mais registros da tabela produtos.)
    $app['service_produto'] = function () use ($app){
        $pdo = $app['pdo'];
        $servico = new ProdutoMapper($produto, $pdo);
        return $servico;
    };
