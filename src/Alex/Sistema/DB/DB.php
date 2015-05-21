<?php

namespace Alex\Sistema\DB;
use Alex\Sistema\Interfaces\DBInterface;

class DB implements DBInterface
{

    private $pdo;
    
  
    public function __construct($dsn, $dbname, $user, $pass)
    {
        try {
            $this->pdo = new \PDO($dsn, $user, $pass, array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ));
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
            $this->pdo->exec("USE $dbname");
        } catch (\PDOException $ex) {
            echo "Connection failure: " . $ex->getMessage();
        }
    }
    
    public function getConnection()
    {
        return $this->pdo;
    }
}
