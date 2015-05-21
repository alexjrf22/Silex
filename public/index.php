<?php ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Silex | <?php echo empty($pagina) ? 'Pagina Inicial' : $pagina; ?> </title>
        <link rel="stylesheet" href="../app/css/bootstrap.css" type="text/css" />
    </head>
    <body>
        <?php
           
            require_once __DIR__ . '/../bootstrap.php';
            
            use Alex\Sistema\Mapper\ProdutoMapper;
            use Alex\Sistema\Entity\Produto;
            use Alex\Sistema\Services\ProdutoService;
            use Alex\Sistema\DB\DB;
            
            $app['pdo'] = function (){
                $objDB = new DB("mysql:host=127.0.0.1;charset=utf8", "Silex", "root", "root");
                $pdo = $objDB->getConnection();
                return $pdo;
            };
            
            $app['criar_produto'] = function (){
                $objProduto = new Produto();
                $prodServ = new ProdutoService($objProduto);
                return $prodServ;
            };


            $app['service_produto'] = function () use ($app){
                $pdo = $app['pdo'];
                $produtoMapper = new ProdutoMapper($produto, $pdo);
                return $produtoMapper;
            };

            $app->get("/", function(){
                $incluir = require_once '../view/form_prod.php';
                return $incluir;
            });
            
            $app->post("/produtos", function() use ($app){
                
                $pdo = $app['pdo'];
                
                if (isset($_POST['enviar']))
                {   
                    $dados = array("nome"=>$_POST['nome'], "descricao"=>$_POST['descricao'], "valor"=>$_POST['valor']); 
                    $produto = $app['criar_produto']->criarProduto($dados);
                    $resultado = $app['service_produto']->inserir($produto, $pdo);
                    return $resultado;
                }else
                {
                    echo 'Erro.';
                }
                        
            });
                      
            $app->run();
            
        ?>
        
        <script src="../app/js/jquery.js" type="text/javascript"></script>
        <script src="../app/js/bootstrap.min.js" type="text/javascript"></script>
        
    </body>
</html>
