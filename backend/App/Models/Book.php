<?php

use App\Core\Database;

  class Book extends Product {

    public function create() {
      $query = 'INSERT INTO products (name, price, sku, type, weight)
        VALUES (?, ?, ?, ?, ?)';

      $stmt = Database::getConn()->prepare($query);

      $stmt->bindValue(1, $this->getName());
      $stmt->bindValue(2, $this->getPrice());
      $stmt->bindValue(3, $this->getSku());
      $stmt->bindValue(4, $this->getType());
      $stmt->bindValue(5, $this->getAttribute('weight'));

      if ($stmt->execute()) {
        return $this;
      }
      return null;
    }
  }