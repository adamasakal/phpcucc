<?php

class Database{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=vizsga;charset=UTF8;port=3306;", "root", "");

            if($conn) {
                $this->conn = $conn;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getConnection(){
        return $this->conn;
    }
}

?>