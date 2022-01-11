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
    <div class="col-md-2">
    <?php 
    $result = include_once("database/sushiSelect.php");
    echo "<form method='post' action='total.php'>";
    foreach ($result as &$data) {
      echo "<div class='card col-md-4'>";
      echo "<img src='" . $data['img'] . "' class='sushi card-img-top'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>" . $data['name'] . "</h5>";
      echo "<input type='number' name='" . $data['id'] . "'> <br>";
      echo "</div>
            </div>";
    }
    echo "<input type='submit' value='Verzenden' name='submit'>";
    echo "</form>";
    ?>
    </div>
    <div class="card col-md-4">
      <img src="img/chicken.jpg" class="sushi card-img-top " alt="...">
      <div class="card-body ">
        <h5 class="card-title">Spicy chicken</h5>
        <input type="number" class="form-control" id="telephone" name="spicy-chicken" min=0 max=100>
      </div>
    </div>
 
  <div class="card col-md-12">
     <div class="card-body ">
    <h5 class="card-title">Totaal</h5>
    <p class="card-text">
      Bestelling voor: <br>
      <?php
      
        echo $_SESSION['firstname'] . " " .   $_SESSION['lastname'] . "<br>" . $_SESSION['address'] . "<br>" . $_SESSION['postcode'] . " " . $_SESSION['city'];
      ?>
    </p>
    <input type="submit" class="form-control" id="telephone" name="volgende" value="Ga naar afrekenen">
   
  </div>
</div>
</form>

    
</body>
</html>