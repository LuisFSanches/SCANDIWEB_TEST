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

      $productModel->name = $body->name;
      $productModel->price = floatval($body->price);
      $productModel->sku = $body->sku;
      $productModel->type = $body->type;
      $productModel->size = $body->size;
      $productModel->weight = $body->weight;
      $productModel->height = $body->height;
      $productModel->width = $body->width;
      $productModel->length = $body->length;

      $productModel = $productModel->create();
      
      if ($productModel) {
        http_response_code(201);
        echo json_encode($productModel);
        return;
      } 

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