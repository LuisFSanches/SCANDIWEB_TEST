<?php
  namespace App\Core;

  class Router{

    private $controller;

    private $method;

    private $controllerMethod;

    private $params = [];

    function __construct(){
        
      $url = $this->parseURL();

      if(file_exists("../App/Controllers/" . ucfirst($url[1]) . "Controller" . ".php")){
          $this->controller = $url[1] . 'Controller';
          unset($url[1]);

      }elseif(empty($url[1])){

          echo "Welcome to...";

          exit;

      }else{
          http_response_code(404);
          echo json_encode(["Error" => "Resource not found"]);
      }
      
      require_once "../App/Controllers/" . ucfirst($this->controller) . ".php";

      $this->controller = new $this->controller;

      $this->method = $_SERVER["REQUEST_METHOD"];
      
      switch($this->method){
          case "GET":
            if(isset($url[2])){
                $this->controllerMethod = "find";
                $this->params = [$url[2]];
            }else{
                $this->controllerMethod = "index";
            }
            
            break;

          case "POST":
            if ($url[2] === 'deleteMany') {
              $this->controllerMethod = "deleteMany";
            } else {
              $this->controllerMethod = "store";
            }
            break;

          case "PUT":
            $this->controllerMethod = "update";
            if(isset($url[2]) && is_numeric($url[2])){
                $this->params = [$url[2]];
            }else{
                http_response_code(400);
                echo json_encode(["Error" => "An id is required"]);
                exit;
            }
            break;

          case "DELETE":
            $this->controllerMethod = "delete";
            if(isset($url[2]) && is_numeric($url[2])){
                $this->params = [$url[2]];
            }else{
                http_response_code(400);
                echo json_encode(["Error" => "An id is required"]);
                exit;
            }
            break;

          default: 
            echo "Method not found";
            exit;
            break;
      }

      call_user_func_array([$this->controller, $this->controllerMethod], $this->params);
      
    }

    private function parseURL(){
      return explode("/", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
    }
}