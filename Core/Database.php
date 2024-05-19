<?php

namespace Core;

use PDO;

class Database
{
    protected $connection;
    protected $statement;

    public function __construct($config, $user = 'root', $password = '')
    {
        //Seting DSN
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // dd($dsn);

        // Create a PDO instance
        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        // dd($this->connection);
    }
    public function query($query, $params = [])
    {
       $this->statement = $this->connection->prepare($query);
       $this->statement->execute($params);

        return $this;
    }
    public function find(){
        return $this->statement->fetch();
    }
    public function findAll(){
        return $this->statement->fetchAll();
    }
    public function findOrFail(){
        $result=$this->find();

        if(!$result){
            abort(403);
        }
        return $result;
    }
}
