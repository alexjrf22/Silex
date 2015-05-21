<?php
    $pagina = 'Cadastro De Produtos';
?>


        
        <h3>Cadastro De Produtos</h3>
        
        <form id="form-prod" method="post" action="/produtos">
            
            <label id="nome">Produto:</label>
            <input type="text" name="nome" required /><br>
            
            <label id="valor">Valor:</label>
            <input type="text" name="valor" required /><br>
            
            <label id="descricao">Descrição:</label>
            <textarea name="descricao"></textarea><br>
            
            <input name="enviar" value="Enviar" type="submit" />
            
        </form>  
        
        
