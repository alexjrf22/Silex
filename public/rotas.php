<?php

    //rota principal leva ao formulario de cadastro para produtos.
    $app->get("/cadastrar", function() use ($app){
        return $app['twig']->render('form_prod.twig');
    })->bind("cadastrar");
    
    //rota para inserir um produto novo.
    $app->post("/inserir", function() use ($app){

        $pdo = $app['pdo'];

        if (isset($_POST['enviar']))
        {   
            $dados = array("nome"=>$_POST['nome'], "descricao"=>$_POST['descricao'], "valor"=>$_POST['valor']); 
            $produto = $app['criar_produto']->criarProduto($dados);
            $resultado = $app['service_produto']->inserir($produto, $pdo);
            
            if ($resultado > 0){
                
                return $app['twig']->render('prod_inserido.twig');
                
            }else
            {
                return $resultado;
            }   
                
        }else
        {
            echo 'Erro ao tentar cadastrar produto.';
        }

    })->bind("inserir");
     
    //rota para selecionar todos os produtos.
    $app->get("/", function() use ($app){

        $pdo = $app['pdo'];
        
        $produtos = $app['service_produto']->selecionar($pdo);
        
        if ($produtos > 0)
        {
             return $app['twig']->render('prodSel.twig',["produtos" => $produtos]);
        }
        else
        {
            return $produtos;
        }
        
    })->bind("index");
    
    $app->get("/produto", function () use ($app){
        
        $pdo = $app['pdo'];
        $id = $_GET['id'];
        $produto = $app['service_produto']->selecionarRow($id, $pdo);

        return $app['twig']->render('prod_alt.twig', ["produto" => $produto]);
        
    })->bind("produto");
    
    $app->post("/alterar", function() use ($app){

        $pdo = $app['pdo'];
        (int)$id = $_REQUEST['id'];

        if (isset($_POST['alterar']))
        {   
           
           $dados = array("id"=>$id, "nome"=>$_POST['nome'], "descricao"=>$_POST['descricao'], "valor"=>$_POST['valor']); 
           $produto = $app['criar_produto']->criarProduto($dados);
           $resultado = $app['service_produto']->alterar($produto, $pdo);
            
            if ($resultado > 0){
                
                return $app['twig']->render('alterado_sucess.twig');
                
            }else
            {
                return $resultado;
            }   
                
        }else
        {
            echo 'Erro ao tentar alterar produto.';
        }

    })->bind("alterar");
     
    $app->get("/deletar", function() use ($app){

        $pdo = $app['pdo'];
        (int)$id = $_GET['id'];

        if (!empty($id))
        {   
           
            $resultado = $app['service_produto']->deletar($id, $pdo);
            
            if ($resultado > 0){
                
                return $app['twig']->render('deletado_sucess.twig');
                
            }else
            {
                return $resultado;
            }   
                
        }else
        {
            echo 'Erro ao tentar deletar produto.';
        }

    })->bind("deletar");

