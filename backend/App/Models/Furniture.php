<?php

use App\Core\Database;

  class Furniture extends Product {

    public function create() {
      $query = 'INSERT INTO products (name, price, sku, type, height, width, length)
        VALUES (?, ?, ?, ?, ?, ?, ?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $this->getName());
      $stmt->bindValue(2, $this->getPrice());
      $stmt->bindValue(3, $this->getSku());
      $stmt->bindValue(4, $this->getType());
      $stmt->bindValue(5, $this->getAttribute('height'));
      $stmt->bindValue(6, $this->getAttribute('width'));
      $stmt->bindValue(7, $this->getAttribute('length'));

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }
  }