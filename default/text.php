<?php 
function getOrder(int $customer_id){
        $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
        $sth = $db->prepare("SELECT customer.id
                               FROM customer 
                               LEFT JOIN ordercustomer
                               ON customer.id=ordercustomer.customer_id
                               WHERE customer_id = ?");
        $sth->bindParam(1, $customer_id);
        $sth->execute();
        return $result = $sth->fetch();
    }
    ?>