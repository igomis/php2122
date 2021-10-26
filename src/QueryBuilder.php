<?php


namespace App;


class QueryBuilder
{
    protected $conn;

    /**
     * QueryBuilder constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function selectAll($table){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table}");

        $stpdo->execute();
        return $stpdo->fetchAll(\PDO::FETCH_OBJ);
    }

    public function find($table,$id){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table} WHERE `id` = :id ");
        $stpdo->bindParam(":id",$id);
        $stpdo->execute();

        return $stpdo->fetch(\PDO::FETCH_ASSOC);
    }

    public function insert($table,$parametres){
        $stpdo = $this->conn->prepare(insert($table,$parametres));
        foreach ($parametres as $key => $value){
            $stpdo->bindValue(":$key",$value);
        }
        $stpdo->execute();
    }

    public function login($table,$email,$password){
        $stpdo = $this->conn->prepare("SELECT * FROM $table WHERE email = :email");
        $stpdo->bindValue(":email",$email);
        $stpdo->execute();
        $user = $stpdo->fetch(\PDO::FETCH_OBJ);
        if (password_verify($password, $user->password)) return $user;
        return null;
    }
    public function selectWhereUnique($table,$key,$value){
        $stpdo = $this->conn->prepare("SELECT * FROM {$table} WHERE `$key` = :value ");
        $stpdo->bindParam(":value",$value);
        $this->execute($stpdo);

        return $stpdo->fetch(\PDO::FETCH_OBJ);
    }

    public function execute(&$stpdo){
        try {
            $stpdo->execute();
        } catch (\PDOException $exception){
            echo ('Error amb la base de dades: '.$exception->getMessage());
            die();
        }
    }

    public function update($table,$parametres,$primaryKey,$id){
        $stpdo = $this->conn->prepare(update($table,$parametres,$primaryKey));
        foreach ($parametres as $key => $value){
            $stpdo->bindValue(":$key",$value);
        }
        $stpdo->bindParam(":id",$id);
        $this->execute($stpdo);
    }



}