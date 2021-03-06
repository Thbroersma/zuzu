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
  $_SESSION['order'] = false;
?>
<body class="myOrder">
<h3 class="card-title">Kies uw gerechten</h3>
    <p class="card-text">Kies u gerechten en kunt u daarna afrekenen.</p>
<form method="post" >
  <div class="row g-2">
    <div class="col-md-3">
    </div>
    <?php 
    $sush = include_once("database/sushiSelect.php");
    echo "<form method='post' action='total.php'>";
    foreach ($sush as &$data) {
      echo "<div class='card col-md-3'>";
      echo "<img src='" . $data['img'] . "' class='sushi card-img-top " . $data['class'] . "'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>" . $data['name'] . "</h5>";
      echo "<input type='number' name='" . $data['id'] . "'min=0 max='" . $data['amount'] . "'value=0> <br>";
      echo "<p>&#8364; " . $data['price'] ."</p>";
      echo "</div>
            </div>";
    }
    echo "<div class='col-md-3'>
          </div><div class='col-md-3'>
          </div>";
    $sushis = include_once("database/sushiSelectTwo.php");
    foreach ($sushis as &$data) {
      echo "<div class='card col-md-3'>";
      echo "<img src='" . $data['img'] . "' class='sushi card-img-top " . $data['class'] . "'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>" . $data['name'] . "</h5>";
      echo "<input type='number' name='" . $data['id'] . "'min=0 max='" . $data['amount'] . "'value=0> <br>";
      echo "<p>&#8364; " . $data['price'] ."</p>";
      echo "</div>
            </div><br>";
    }
    echo "<div class='col-md-3'>
          </div>";
    if (isset($_POST['calculate'])) { 
      $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
      $query = $db->prepare("SELECT id, name, price FROM sushi");
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      echo "  
      <div class='card col-md-2 totalOrder'>
      <h4>De bestelling:</h4> <br>";
      $_SESSION['chickenAmount'] = $_POST['1']; 
      $_SESSION['garnaalAmount'] = $_POST['2'];
      $_SESSION['dragonAmount'] = $_POST['3'];
      $_SESSION['rollAmount'] = $_POST['4'];
      $_SESSION['chicken'] = $_POST['1'] * 4.50; 
      $_SESSION['garnaal'] = $_POST['2'] *  4.50;
      $_SESSION['dragon'] = $_POST['3'] *  4.50;
      $_SESSION['roll'] = $_POST['4'] * $data['price'];
        foreach($result as &$data) {
          $_SESSION[$data['id']] = $_POST[$data['id']] * $data['price'];  
          echo "<p>" . $data['name'] . " " . $_POST[$data['id']] . "x" .  " &#8364; " . $_SESSION[$data['id']]. "</p>";
        }
      $_SESSION['total'] = $_SESSION['1'] + $_SESSION['2'] + $_SESSION['3']  +$_SESSION['4'];      
      echo "<p>Totaal &#8364; " . $_SESSION['total'] . "</p>";
      echo "</div>";
      } else {
        echo "  
      <div class='card col-md-2 totalOrder'>
      <h4 class='totalBalance'>De bestelling:</h4> <br>";
      echo "Totaal &#8364; 0";
      echo "</div>";
      }
    echo "<div class='col-md-12'><input type='submit' value='Berekenen' name='calculate' class='price'></div>";
    echo "</form>";
    ?>
  <div class="card col-md-12">
     <div class="card-body "> 
    <input type="submit" class="form-control submit" id="telephone" name="volgende" value="Ga naar afrekenen">
    <?php
    $db = new PDO("mysql:host=localhost;dbname=zuzu", "root", "");
    if (isset($_POST['volgende'])) {
      $_SESSION['order'] = true;
 
      header("Location: total.php");
    }
    ?>
  </div>
</div>
</form>
</body>
</html>