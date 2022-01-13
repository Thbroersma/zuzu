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

<?php
 session_start();

?>
<body class="myOrder">
<h3 class="card-title">Kies uw gerechten</h3>
    <p class="card-text">Kies u gerechten en kunt u daarna afrekenen.</p>
<form method="post" >
  <div class="row g-2">
    <div class="col-md-3">
    </div>
    <?php 
    $result = include_once("database/sushiSelect.php");
    echo "<form method='post' action='total.php'>";
    foreach ($result as &$data) {
      echo "<div class='card col-md-3'>";
      echo "<img src='" . $data['img'] . "' class='sushi card-img-top " . $data['class'] . "'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>" . $data['name'] . "</h5>";
      echo "<input type='number' name='" . $data['id'] . "'> <br>";
      echo "<p>&#8364; " . $data['price'] ."</p>";
      echo "</div>
            </div>";
    }
    echo "<div class='col-md-3'>
          </div>
          <div class='col-md-3'>
          </div>";
    $results = include_once("database/sushiSelectTwo.php");
    foreach ($results as &$data) {
      echo "<div class='card col-md-3'>";
      echo "<img src='" . $data['img'] . "' class='sushi card-img-top " . $data['class'] . "'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>" . $data['name'] . "</h5>";
      echo "<input type='number' name='" . $data['id'] . "'> <br>";
      echo "<p>&#8364; " . $data['price'] ."</p>";
      echo "</div>
            </div><br>";
    }
    echo "<div class='col-md-12'><input type='submit' value='Berekenen' name='calculate' class='price'></div>";
    echo "</form>";
    ?>
  <div class="card col-md-12">
     <div class="card-body ">
    <h5 class="card-title">Totaal</h5>
    <div class="left">
    <p class="card-text">
      De bestelling: <br>
      <?php
      $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
      
      if (isset($_POST['calculate'])) { 
        $query = $db->prepare("SELECT price, name FROM sushi");
        $query->execute();
        $sushi = $query->fetch(PDO::FETCH_ASSOC);   
        $_SESSION['chicken'] = $_POST['1'] * $sushi['price'];
        $_SESSION['garnaal'] = $_POST['2'] * $sushi['price'];
        $_SESSION['dragon'] = $_POST['3'] * $sushi['price'];
        $_SESSION['roll'] = $_POST['4'] * $sushi['price'];
        $_SESSION['total'] = $_SESSION['chicken'] + $_SESSION['garnaal'] + $_SESSION['dragon']  +$_SESSION['roll'];
        echo "<p>" . $sushi['name'] . " " . $_POST['1'] . "x" .  " &#8364; " . $_SESSION['chicken'] . "</p>";
        echo "<p>" . $sushi['name'] . " " . $_POST['2'] . "x" .  " &#8364; " . $_SESSION['garnaal'] . "</p>";
        echo "<p>" . $sushi['name'] . " " . $_POST['3'] . "x" .  " &#8364; " . $_SESSION['dragon'] . "</p>";
        echo "<p>" . $sushi['name'] . " " . $_POST['4'] . "x" .  " &#8364; " . $_SESSION['roll'] . "</p>";
        echo "Totaal &#8364; " . $_SESSION['total'];
      }
        echo "</div>
              <div class='right'>";
        
      ?>
    </p>
    <input type="submit" class="form-control" id="telephone" name="volgende" value="Ga naar afrekenen">
    <?php
    $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
    if (isset($_POST['volgende'])) {
      $id = 1;
      $newAmount = 10 - 5;
      $query = $db->prepare("UPDATE order SET $newAmount = :amount WHERE id =:id");
      $query->bindParam("amount", $newAmount);
      $query->bindParam("id", $id);
      if($query->execute()) {
        echo "De hoeveelheid is aangepast";
      } else {
        echo "Er is een fout opgetreden";
        }
      //header(Location: total.php);
    }
    ?>
  </div>
</div>
</form>

    
</body>
</html>