<html>
<head>

</head>
<body>
    <h3>Kies uw gerechten</h3>
    <?php
        session_start();
        $id = $_SESSION['name'];?>
    <?php
        include_once('default/info.php');
        //include_once('default/text.php');
    ?>

    <?php
        
        
        $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
        $query = $db->prepare("SELECT * FROM amount");
        $query->execute();
        $result = $query->fetch();
        $count = $query->rowCount();
        if ($count === 1) {
            $chickenAmount = $result['chicken_amount'];
            $beefAmount = $result['beef_amount'];
            $tunaAmount = $result['tuna_amount'];
            $loempaAmount = $result['loempia_amount'];
            $crabAmount = $result['crab_amount'];
            $vegiAmount = $result['vegi_amount'];
            echo "Hoeveelheid sushi chicken " . $chickenAmount . "<br>";
            echo "Hoeveelheid sushi beef " . $beefAmount . "<br>";
            echo "Hoeveelheid sushi tuna " . $tunaAmount . "<br>";
            echo "Hoeveelheid loempia " . $loempaAmount . "<br>";
            echo "Hoeveelheid sushi crab " . $crabAmount . "<br>";
            echo "Hoeveelheid sushi vegi " . $vegiAmount . "<br>";
        }
        $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
        $query = $db->prepare("SELECT id FROM customer WHERE firstname = '$id'");
        $query->execute();
        $result = $query->fetch();
        $count = $query->rowCount();
        if ($count === 1) {
            $idCustomer = $result['id'];
            echo $_SESSION['name'] . " ". $idCustomer . "<br>";
        }
       
        

        try {
            /*$type = 'testing';
            $reporter = "John O'Hara";
            $query = "INSERT INTO contents (type, reporter, description) 
                        VALUES(?, ?, 'whatever')";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $type, $reporter);
            $stmt->execute();*/
            $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
            if (isset($_POST['order'])) {
                $chicken = FILTER_INPUT(INPUT_POST, 'spicy_chicken', FILTER_VALIDATE_FLOAT);
                $beef = FILTER_INPUT(INPUT_POST, 'spicy_beefy', FILTER_VALIDATE_FLOAT);
                $tuna = FILTER_INPUT(INPUT_POST, 'spicy_tuna', FILTER_VALIDATE_FLOAT);
                $loempia = FILTER_INPUT(INPUT_POST, 'loempia', FILTER_VALIDATE_FLOAT);               
                $crab = FILTER_INPUT(INPUT_POST, 'crispy_crab', FILTER_VALIDATE_FLOAT);
                $vegi = FILTER_INPUT(INPUT_POST, 'crispy_vegi', FILTER_VALIDATE_FLOAT);
                $idOrder = $idCustomer;
                $idSushi = 1;
                $query = $db->prepare("INSERT INTO ordercustomer (spicy_chicken, spicy_beefy, spicy_tuna, loempia, crispy_crab, crispy_vegi, customer_id, sushi_id)
                    VALUES (:spicy_chicken, :spicy_beefy, :spicy_tuna, :loempia, :crispy_crab, :crispy_vegi, :customer_id, :sushi_id)");
                $query->bindParam("spicy_chicken", $chicken);
                $query->bindParam("spicy_beefy", $beef);
                $query->bindParam("spicy_tuna", $tuna);
                $query->bindParam("loempia", $loempia);
                $query->bindParam("crispy_crab", $crab);
                $query->bindParam("crispy_vegi", $vegi);
                $query->bindParam("customer_id", $idOrder);
                $query->bindParam("sushi_id", $idSushi);
                if ($query->execute()) {
                    echo "
                    <p class='registration'>U bestelling is gelukt</p>";
                    header("Location: total.php");
                    
                } else {
                    echo "De start van de bestelling is nog niet gelukt, controleer alle velden.";
                }
            }
            
        }
        catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
    ?>
   
</body>
</html>