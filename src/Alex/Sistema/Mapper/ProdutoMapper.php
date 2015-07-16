<?php

namespace Alex\Sistema\Mapper;
use Alex\Sistema\Entity\Produto;
use PDO;
    
class ProdutoMapper
{
    public function inserir(Produto $produto, \PDO $pdo)
    {     
        
        $query = "insert produtos (nome, descricao, valor) values (:nome, :descricao, :valor)";
        
        try
        {
            
            $inserir = $pdo->prepare($query);
            $inserir->bindValue(":nome", $produto->getNome());
            $inserir->bindValue(":descricao", $produto->getDescricao());
            $inserir->bindValue(":valor", $produto->getValor());

            return $inserir->execute() ? true : false;
            
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
    
    public function alterar(Produto $produto, PDO $pdo)
    {
        
        $query = "update produtos set nome= :nome, valor= :valor, descricao= :descricao where id= :id";
        
        try
        {
            
            $alterar = $pdo->prepare($query);
            $alterar->bindValue(":id", $produto->getId());
            $alterar->bindValue(":nome", $produto->getNome());
            $alterar->bindValue(":valor", $produto->getValor());
            $alterar->bindValue(":descricao", $produto->getDescricao());
            return $alterar->execute() ? true : false;
                   
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
            return $delete->execute() ? true : false;;
                   
        }
        catch (\PDOException $e)
        {
            return $e->getMessage();
        }
    
    }
    
}
