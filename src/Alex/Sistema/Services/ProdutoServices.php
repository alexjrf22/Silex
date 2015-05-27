<?php

namespace Alex\Sistema\Services;
use Alex\Sistema\Interfaces\ProdutoInterface;
use PDO;
    
class ProdutoServices 
{
    public function inserir(ProdutoInterface $produto, \PDO $pdo)
    {     
        
        $query = "insert produtos (nome, descricao, valor) values (:nome, :descricao, :valor)";
        
        try
        {
            
            $inserir = $pdo->prepare($query);
            $inserir->bindValue(":nome", $produto->getNome($nome));
            $inserir->bindValue(":descricao", $produto->getDescricao($descricao));
            $inserir->bindValue(":valor", $produto->getValor($valor));

            return $inserir->execute();
            
        }  
        catch (\PDOException $e)
        {
            return $e->getMessage();
        }
        
    }
    
    public function selecionar(PDO $pdo)
    {
        
        $query = "select * from produtos";
        
        try
        {
            
            $select = $pdo->prepare($query);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_ASSOC); 
                        
        }catch (\PDOException $e)
        {
            return $e->getMessage();
        }
    
    }
    
    public function selecionarRow($id, PDO $pdo)
    {
        
        $query = "select * from produtos where id = :id";
        
        try
        {
            
            $select = $pdo->prepare($query);
            $select->bindValue(":id", $id);
            $select->execute();
            return $select->fetch(PDO::FETCH_ASSOC); 
                        
        }catch (\PDOException $e)
        {
            return $e->getMessage();
        }
    
    }
    
    public function alterar($id, ProdutoInterface $produto, PDO $pdo)
    {
        
        $query = "update produtos set nome=:nome, valor=:valor, descricao=:descricao where id=:id";
        
        try
        {
            
            $alterar = $pdo->prepare($query);
            $alterar->bindValue(":id", $id);
            $alterar->bindValue(":nome", $produto->getNome($nome));
            $alterar->bindValue(":valor", $produto->getValor($valor));
            $alterar->bindValue(":descricao", $produto->getDescricao($descricao));
            return $alterar->execute();
                   
        }
        catch (\PDOException $e)
        {
            return $e->getMessage();
        }
    
    }
    
      public function deletar($id, PDO $pdo)
    {
        
        $query = "delete from produtos where id=:id";
        
        try
        {
            
            $delete = $pdo->prepare($query);
            $delete->bindValue(":id", $id);
            return $delete->execute();
                   
        }
        catch (\PDOException $e)
        {
            return $e->getMessage();
        }
    
    }
    
}
