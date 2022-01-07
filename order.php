<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Uw bestelling</title>
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
    

<div class="card order" style="width: 25rem; margin-left:22rem;">
<img src="chicken.jpg" class="sushi card-img-top " alt="...">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <input type="number" class="form-control" id="telephone" name="phonenumber">
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 25rem;">
<img src="garnaal.jpg" class="sushi card-img-top " alt="...">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <input type="number" class="form-control" id="telephone" name="phonenumber">
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card text-center" style="width: 25rem;">
<img src="roll.png" class="sushi card-img-top " alt="...">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <input type="number" class="form-control" id="telephone" name="phonenumber">
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card text-end" style="width: 25rem;">
<img src="dragon.png" class="sushi card-img-top " alt="...">

  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <input type="number" class="form-control" id="telephone" name="phonenumber">
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<?php/*
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
                header
            }
            else {
                echo "Er is een fout opgetreden";
            }
        }  
    } 
    catch(PDOExeption $e) {
        die("Error!: " . $e->getMessage());
    }
        */
    
    //include_once('defaults/users/menu.php');
    
    ?>  
</body>
</html>