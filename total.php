<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Het totaal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styling.css">
</head>
<?php
 session_start();
?>
<body>
<h2 class="myOrder">Uw totale bestelling</h2>
<div class="card col-md-5 total">
    <br>
    <?php 
    if ($_SESSION['order'] == true) {
        echo "<label class='info'>Naam: </label><label> " . $_SESSION['firstname'] . " " .   $_SESSION['lastname'] . "</label><br>";
        echo "<label class='info'>Adres: </label><label> " . $_SESSION['address'] . "</label><br>";
        echo "<label class='info'>Postcode + plaats: </label><label> " . $_SESSION['postcode'] . " " .   $_SESSION['city'] . "</label><br>";
        
        echo "<p>" . $_SESSION['spicy'] . " &#8364; " . $_SESSION['chicken'] . "</p>";
        echo "<p> &#8364; " . $_SESSION['garnaal'] . "</p>";
        echo "<p> &#8364; " . $_SESSION['dragon'] . "</p>";
        echo "<p> &#8364; " .  $_SESSION['roll'] . "</p>";
        echo "<p>Totaal &#8364; " .  $_SESSION['total'] . "</p>";
    } else {
        echo "<label class='info'>Naam: </label><label></label><br>";
        echo "<label class='info'>Adres: </label><label></label><br>";
        echo "<label class='info'>Postcode + plaats: </label><label></label><br>";
        echo "<p class='info'> &#8364; </p>";
        echo "<p class='info'> &#8364; </p>";
        echo "<p class='info'> &#8364; </p>";
        echo "<p class='info'> &#8364; </p>";
        echo "<p class='info'>Totaal &#8364; </p>";
    }
    

    ?>
</div>
</body>
</html>