<?php

class EmployeeController{
    private Employee $employee;

    public function __construct($db) {
        $this->employee = new Employee($db);
    }

    public function CreateEmployee(){
        $data = json_decode(file_get_contents("php://input"), true);

        if(!isset($data["name"]) || !isset($data["email"]) || !isset($data["position"])){
            http_response_code(415);
        }

        $req = $this->employee->CreateEmployee($data["name"],$data["email"], $data["position"]);

        if($req){
            http_response_code(200);
            return true;
            echo "Sikeres létrehozás!";
        }else{
            return http_response_code(415);
        }
    }

    public function DeleteEmployee(){
        $data = json_decode(file_get_contents("php://input"), true);

        if(!isset($data["id"])){
            http_response_code(404);
        }

        $req = $this->employee->DeleteEmployee($data["id"]);

        if($req){
            http_response_code(200);
            return true;
            echo "Sikeres törlés!";
        }else{
            http_response_code(404);
        }
    }

    public function GetEmployee(){
        $data = json_decode(file_get_contents("php://input"), true);

        if(!isset($data["id"])){
            http_response_code(404);
        }

        echo json_decode(($this->employee->GetEmployee($data['id'])));
        http_response_code(200);
    }

    public function UpdateEmployee(){
        $data = json_decode(file_get_contents("php://input"), true);

        if(!isset($data["id"]) || !isset($data["name"]) || !isset($data["email"]) || !isset($data["position"])){
            http_response_code(415);
        }

        $req = $this->employee->UpdateEmployee($data["id"],$data["name"],$data["email"], $data["position"]);

        if($req){
            http_response_code(200);
            return true;
            echo "Sikeres módosítás!";
        }else{
            return http_response_code(404);
        }
    }
}

?>