<?php
spl_autoload_register(function ($class){
    require(__DIR__."/src/$class.php");
});

function get_method() {
    return $_SERVER['REQUEST_METHOD'];
}

header("Content-Type: application/json; charset=utf-8");
header(" Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");



$uri = explode("/", $_SERVER['REQUEST_URI']);

if(isset($uri[3])){
    $endpoint = $uri[3];
} else{
    echo "invalid endpoint";
    return;
}

http_response_code(404);

$db = new Database();
$employeeController = new EmployeeController($db);

switch($endpoint){
    case "new":
        if(get_method()=="POST"){
            $employeeController->CreateEmployee();
        }
        break;
    case "delete":
        if(get_method()=="DELETE"){
            $employeeController->DeleteEmployee();
        }
        break;
    case "get":
        if(get_method()=="GET"){
            $employeeController->GetEmployee();
        }
        break;
    case "update":
        if(get_method()=="PATCH"){
            $employeeController->UpdateEmployee();
        }
        break;
    default:
        break;
}


?>
