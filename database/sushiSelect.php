<?php
  try {
    $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
    $query = $db->prepare("SELECT id, name, img, class, price, amount FROM sushi WHERE id < 3");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }  
   
  catch(PDOExeption $e) {
      die("Error!: " . $e->getMessage());
  }   

    ?>  