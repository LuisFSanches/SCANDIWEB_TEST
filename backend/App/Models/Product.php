<?php

use App\Core\Database;
  class Product {
    private $name;
    private $price;
    private $sku;
    private $type;
    private $attributes;

    public function setName($name) {
      $this->name = $name;
    }

    public function getName() {
      return $this->name;
    }

    public function setPrice($price) {
      $this->price = $price;
    }

    public function getPrice() {
      return $this->price;
    }

    public function setSku($sku) {
      $this->sku = $sku;
    }

    public function getSku() {
      return $this->sku;
    }

    public function setType($type) {
      $this->type = $type;
    }

    public function getType() {
      return $this->type;
    }

    public function setAttributes($attributes) {
      $this->attributes = $attributes;
    }

    public function getAttribute($attribute) {
      return $this->attributes->$attribute;
    }

    public function getAllAttributes() {
      return $this->attributes;
    }

    public function findAll() {
      $query = 'SELECT * FROM products';

      $stmt = Database::getConn()->prepare($query);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } else {
        return null;
      }
    }

    public function findById($id) {
      $query = 'SELECT * FROM products WHERE id = :id';

      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function findBySku($sku) {
      $query = 'SELECT * FROM products WHERE sku = :sku';

      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':sku', $sku);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return null;
      }
    }

    public function delete($id) {
      $query = 'DELETE FROM products WHERE id = :id';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
    }
  }