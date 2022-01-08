<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Zuzu bestellingsformulier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styling.css">
    <!--

	Emmet een snelle manier van codes zoals ul>li.item$*5 waarbij je een ul met 5 li die item1 oplopend tot 5 heten.

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
-->
</head>
<body class="myBody ">
    
    <div class="card mb-12">
  <img src="img/sushicard.jpg" class="card-img-top homeimage" alt="...">
  <div class="card-body">
    <h5 class="card-title">Uw bestelling</h5>
    <p class="card-text">Vul uw gegevens in en op de volgende pagina kunt u uw gerechten selecteren.</p>
    <form class="row g-3" method="post">
  <div class="col-md-3">
    <label for="inputEmail4" class="form-label">Voornaam</label>
    <input type="text" class="form-control" id="inputEmail4" name="firstname" required>
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Achternaam</label>
    <input type="text" class="form-control" id="inputPassword4" name="lastname" required>
  </div><br><br>
  <div class="col-3">
    <label for="inputAddress" class="form-label">Adres</label>
    <input type="text" class="form-control" id="inputAddress"  name="address" required>
  </div>
  <div class="col-1">
    <label for="inputAddress2" class="form-label">Postcode</label>
    <input type="text" class="form-control" id="inputAddress2" name="postcode" required>
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">Stad</label>
    <input type="text" class="form-control" id="inputCity" name="city" required>
  </div>
  <div class="col-md-3">
    <label for="inputState" class="form-label">Telefoonnummer</label>
    <input type="text" class="form-control" id="telephone" name="phonenumber">

  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Emailadress</label>
    <input type="email" class="form-control" id="inputZip" name="email" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="customer">Volgende</button>
  </div>
</form>
    <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
  </div>
</div>
<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
        if (isset($_POST['customer'])) {
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
            $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_STRING);
            $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $phonenumber = filter_input(INPUT_POST, "phonenumber", FILTER_SANITIZE_STRING);
            
            $sth = $pdo->prepare('INSERT INTO customer (id, firstname, lastname, address, postcode, city, email, phonenumber) 
            VALUES(:id, :firstname, :lastname, :address, :postcode, :city, :email, :phonenumber)');
            $sth->bindParam("id", $id);      
            $sth->bindParam("firstname", $firstname);
            $sth->bindParam("lastname", $lastname);
            $sth->bindParam("address", $address);
            $sth->bindParam("postcode", $postcode);
            $sth->bindParam("city", $city);
            $sth->bindParam("email", $email);
            $sth->bindParam("phonenumber", $phonenumber);
            if ($sth->execute()) {
                echo "Uw gegevens zijn aangekomen, u kunt nu uw gerechten kiezen!";
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['address'] = $address;
                $_SESSION['postcode'] = $postcode;
                $_SESSION['city'] = $city;
                header("Location: order.php");
            }
            else {
                echo "Er is een fout opgetreden";
            }
        }  
    } 
    catch(PDOExeption $e) {
        die("Error!: " . $e->getMessage());
    }
        
    
    //include_once('defaults/users/menu.php');
    
    ?>  
</body>
</html>