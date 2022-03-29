<?php

class Product extends DB
{
  private $table = "products";
  private $conn;
  public function __construct()
  {
   
    $this->conn=$this->connect();
  }
  public function getAllProducts()
  {
    $tmp=$this->conn->prepare('SELECT * FROM `'.$this->table.'`');
    $tmp->execute();
    return $tmp->fetchAll();
    
  }
  public function insertProduct($data){
  //  return $this->conn->insert($this->table,$data);
  $tmp=$this->conn->prepare('INSERT INTO `'. $this->table.'`(name,price,description,qty) VALUES(:name,:price,:description,:qty)');
  $tmp->bindParam(':name',$data['name']);
  $tmp->bindParam(':price',$data['price']);
  $tmp->bindParam(':description',$data['description']);
  $tmp->bindParam(':qty',$data['qty']);
  return $tmp->execute();
  }
  

  public function getRow($id)
  {
    $tmp=$this->conn->prepare('SELECT * FROM `'.$this->table.'` WHERE id='.$id);
    $tmp->execute();
    return $tmp->fetch();
  }

  public function updateProduct($id,$data)
  {
    $tmp=$this->conn->prepare('UPDATE `'. $this->table.'` SET name=:name,price=:price,description=:description,qty=:qty WHERE id='.$id);
    $tmp->bindParam(':name',$data['name']);
    $tmp->bindParam(':price',$data['price']);
    $tmp->bindParam(':description',$data['description']);
    $tmp->bindParam(':qty',$data['qty']);
    return $tmp->execute();
    
    // return $tmp->update($this->table,$data);
  }
}






















?>