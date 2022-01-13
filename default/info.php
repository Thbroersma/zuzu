<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
        $sth = $db->prepare("SELECT * FROM sushi");
        $sth->execute();
        $result = $sth->fetch();
        $count = $sth->rowCount();
        if ($count === 1) {
            echo "
            <form method='post'>
                <label for=''>Spicy chicken</label>
                <input type='number' min=0 max=100 name='beef'>
                <span>&#8364; " . $result['spicy_chicken'] . "</span><br>
                <label for=''>Spicy beef </label>
                <input type='number' min=0 max=100 name='spicy_beefy'>
                <span>&#8364; " . $result['spicy_chicken'] . "</span><br>
                <label for=''>Spicy tuna</label>
                <input type='number' min=0 max=100 name='spicy_tuna'>
                <span>&#8364; " . $result['spicy_tuna'] . "</span><br>
                <label for=''>Loempia's </label>
                <input type='number' min=0 max=100 name='loempia'>
                <span>&#8364; " . $result['loempia'] . "</span><br>
                <label for=''>Crispy Crab </label>
                <input type='number' min=0 max=100 name='crispy_crab'>
                <span>&#8364; " . $result['crispy_crab'] . "</span><br>
                <label for=''>Crispy Vegi </label>
                <input type='number' min=0 max=100 name='crispy_vegi'>
                <span>&#8364; " . $result['crispy_vegi'] . "</span><br>
                <input type='submit' name='order' value='Volgende stap'>
            </form>";
            
        }
    }
    catch (PDOException $e){
        die("Error!: " . $e->getMessage());
    }/*
    global $id;
    try {
        $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
        $query = $db->prepare("SELECT id FROM customer WHERE firstname = '$id'");
        $query->execute();
        $result = $query->fetch();
        $count = $sth->rowCount();
        if ($count === 1) {
            $idCustomer = $result['id'];
            echo "<input type='text' name='idCustomer' value='" . $idCustomer . "'>";
        }
    }
    catch (PDOException $e){
        die("Error!: " . $e->getMessage());
    }*/
?>
    
