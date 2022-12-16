<?php

namespace App\Core;

class Controller{

  public function model($model){
    $lowerCaseType = strtolower($model);
    $modelType = ucwords($lowerCaseType);
    require_once "../App/Models/" . $modelType . ".php";  
      
    return new $model;
  }

  protected function getRequestBody(){
    $json = file_get_contents("php://input");
      
    $obj = json_decode($json);
    return $obj;
  }
}