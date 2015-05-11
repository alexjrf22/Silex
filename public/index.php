<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
           
            require_once '../bootstrap.php';
                            
            $app->get("/clientes", function() use ($app, $clientes){
                
                $clientes = array 
                (
                     array ("Nome" => "Alexandre", "Email" => "alexjrf22@gmail.com","CPF" => "111.111.111-11"),
                     array ("Nome" => "Jozieli", "Email" => "jozi@gmail.com","CPF" => "222.122.222-21"),
                     array ("Nome" => "Jose", "Email" => "jose@gmail.com","CNPJ" => "00.000.000/0001-00")
                 
                 );
                
               
                 return $app->Json($clientes);
               
                
            });
            
            $app->run();
            
        ?>
    </body>
</html>
