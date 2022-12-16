<?php

use App\Core\Controller;

  class ProductController extends Controller {
    
    public function index() {
      $productModel = $this->model("Product");

      $products = $productModel->findAll();
      if (!$products) {
        http_response_code(204);
        exit;
      }

      echo json_encode($products, JSON_UNESCAPED_UNICODE);
    }

    public function store() {

      $body = $this->getRequestBody();
      $productModel = $this->model("Product");

      $checkSku = $productModel->findBySku($body->sku);

      if ($checkSku) {
        http_response_code(400);
        echo json_encode(["Error" => "Product already registered"]);
        exit;
      }

      $modelByType = $this->model($body->type);

      $modelByType->setName($body->name);
      $modelByType->setPrice(floatval($body->price));
      $modelByType->setSku($body->sku);
      $modelByType->setType($body->type);
      $modelByType->setAttributes($body);

      $modelByType = $modelByType->create();
      
      if ($modelByType) {
        http_response_code(201);
        echo json_encode($body);
        return;
      };

      http_response_code(500);
    }

    public function delete($id) {
      $productModel = $this->model("Product");
      $checkProduct = $productModel->findById($id);

      if (!$checkProduct) {
        http_response_code(404);
        echo json_encode(["Error" => "Product not found"]);
        return;
      }
      $productModel->delete($id);
      http_response_code(200);
      echo json_encode(["Success" => "Product deleted"]);
    }


    public function deleteMany() {
      $body = $this->getRequestBody();
      $productModel = $this->model("Product");

      if (count($body->ids) === 0) {
        http_response_code(404);
        echo json_encode(["Error" => "No product selected"]);
        return;
      }
      
      foreach($body->ids as $id) {
        $checkProduct = $productModel->findById($id);
        if ($checkProduct) {
          $productModel->delete($id);
        }
      }
      http_response_code(200);
      echo json_encode(["Success" => "Products deleted"]);
    }
  }