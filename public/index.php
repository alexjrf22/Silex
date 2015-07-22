
<?php
    
    //mostrar erros se houver 
    ini_set("display_errors", true);
    error_reporting(E_ALL);
    
    require_once __DIR__ . '/../bootstrap.php';
    require_once 'servicos.php';
    require_once 'rotas.php';
    use Symfony\Component\HttpFoundation\Request;
    
    //api para listar todos os produtos.
    $app->get("/api/produtos", function () use ($app){

        $pdo = $app['pdo']; 
        $produtos = $app['service_produto']->selecionar($pdo);
        return $app->json($produtos);

    });

    //api para listar um produto especifico atraves de sua id.
    $app->get("/api/produtos/{id}", function ($id) use ($app){

        $pdo = $app['pdo'];
        $produto = $app['service_produto']->selecionarRow($id, $pdo);
        return $app->json($produto);

    });

    //inserindo um produto.
    $app->post("/api/produtos", function (Request $request) use ($app){

        $pdo = $app['pdo'];
        $validador = $app['validar_produto'];

        $dados['nome'] = $request->get('nome');
        $dados['valor'] = $request->get('valor');
        $dados['descricao'] = $request->get('descricao');
        $produto = $app['criar_produto']->criarProduto($dados);
        
        $produtoValidate = $validador->validarProduto($produto);
            
        $validacao = ($produtoValidate === true) ? false : $produtoValidate;
        
        if ($validacao === false)
        {
           $resultado = $app['service_produto']->inserir($produto, $pdo);
           
           if(is_bool($resultado) && $resultado == true)
           {
               return $app->json(['sucesso'=> "Produto Cadastrado com Sucesso!"]);
           }else
           {
               return $app->json($resultado);
           } 
        }else
        {
            return $app->json($validacao); 
        }
                

    });

    //alterando um produto especifico.
   $app->put("/api/produtos/{id}", function ($id, Request $request) use ($app){

        $pdo = $app['pdo'];
        $dados['id'] = $id;
        $dados['nome'] = $request->get('nome');
        $dados['valor'] = $request->get('valor');
        $dados['descricao'] = $request->get('descricao');
        $produto = $app['criar_produto']->criarProduto($dados);
        $resultado = $app['service_produto']->alterar($produto, $pdo);
       
       if(is_bool($resultado) && $resultado == true)
       {
           return $app->json(['sucesso'=> "Produto Alterado Com Sucesso!"]);
       }else
       {
           return $app->json($resultado);
       } 

    });

    //removendo um registro.
    $app->delete("/api/produtos/{id}", function ($id) use ($app){

    $pdo = $app['pdo'];
    $resultado = $app['service_produto']->deletar($id, $pdo);

       if(is_bool($resultado) && $resultado == true)
       {
           return $app->json(['sucesso'=> "Produto Deletado Com Sucesso!"]);
       }else
       {
           return $app->json($resultado);
       } 

    });

    $app->run();
    
    




