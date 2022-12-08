<?php

use App\Core\Database;

  class Product {

    public $id;
    public $name;
    public $price;
    public $sku;
    public $type;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;

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

    public function create() {
      $query = 'INSERT INTO products (name, price, sku, type, size, weight, height, width, length)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $this->name);
      $stmt->bindValue(2, $this->price);
      $stmt->bindValue(3, $this->sku);
      $stmt->bindValue(4, $this->type);
      $stmt->bindValue(5, $this->size);
      $stmt->bindValue(6, $this->weight);
      $stmt->bindValue(7, $this->height);
      $stmt->bindValue(8, $this->width);
      $stmt->bindValue(9, $this->length);

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }

    public function delete($id) {
      $query = 'DELETE FROM products WHERE id = :id';
      $stmt = Database::getConn()->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
    }
  }