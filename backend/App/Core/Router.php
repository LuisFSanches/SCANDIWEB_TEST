<?php
  namespace App\Core;

  class Router{

    private $controller;

    private $method;

    private $controllerMethod;

    private $params = [];

    function __construct(){
        
      $url = $this->parseURL();

      if (
        file_exists("../App/Controllers/" . ucfirst($url[2]) . "Controller" . ".php") 
        && $url[1] === 'api'
      ) {
          $this->controller = $url[2] . 'Controller';
          unset($url[2]);

      } elseif ($url[1] === 'api' && empty($url[2])) {
          echo ('Welcome to Scandiweb assignment, please use /product after the api');
          exit;

      } else {
          http_response_code(404);
          echo json_encode(["Error" => "Resource not found"]);
      }
      
      require_once "../App/Controllers/" . ucfirst($this->controller) . ".php";

      $this->controller = new $this->controller;

      $this->method = $_SERVER["REQUEST_METHOD"];
      
      switch ($this->method) {
          case "GET":
            $this->controllerMethod = "index";
            break;

          case "POST":
            if ($url[3] === 'deleteMany') {
              $this->controllerMethod = "deleteMany";
            } else {
              $this->controllerMethod = "store";
            }
            break;

          case "DELETE":
            $this->controllerMethod = "delete";
            if (isset($url[3]) && is_numeric($url[3])) {
                $this->params = [$url[3]];
            } else {
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