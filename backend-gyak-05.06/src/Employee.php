<?php
class Employee{
    private $id;
    private $name;
    private $email;
    private $position;
    private $created_at;
    private $updated_at;
    private $conn;

    public function __construct(Database $db) {
        $this->conn = $db->getConnection();
    }

    public function CreateEmployee($name, $email, $position) : bool {
        $stmt = $this->conn->prepare("CALL CreateEmployee (:name, :email, :position)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':position', $position);
        $stmt->execute();

        $rows = $stmt->rowCount();
                return $rows;

        if($rows){
            return true;
        }
        else{
            return false;
        }
    }

    public function DeleteEmployee($id) : bool {
        $stmt = $this->conn->prepare("CALL DeleteEmployee (:id)");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $rows = $stmt->rowCount();
            return $rows;

        if($rows){
            return true;
        }
        else{
            return false;
        }
    }

    public function GetEmployee($id) {
        $stmt = $this->conn->prepare("CALL GetEmployee (:id)");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        
    }

    public function UpdateEmployee($id, $name, $email, $position) : bool {
        $stmt = $this->conn->prepare("CALL UpdateEmployee (:id, :name, :email, :position)");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":position", $position);
        $stmt->execute();

        $rows = $stmt->rowCount();
            return $rows;

        if($rows){
            return true;
        }
        else{
            return false;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPosition(){
        return $this->position;
    }

    public function setPosition($position){
        $this->position = $position;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function getUpdated_at(){
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;
    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }
}




?>