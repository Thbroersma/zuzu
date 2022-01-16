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
        echo "<h5 class='info'>Uw gegevens</h5>";
        echo "<form method='post'>";
        echo "<p class='info'>Naam:<i class='infocustomer'> " . $_SESSION['firstname'] . " " .   $_SESSION['lastname'] . "</i></p>";
        echo "<p class='info'>Adres:<i class='infocustomer'> " . $_SESSION['address'] . "</i></p>";
        echo "<p class='info'>Postcode + plaats:<i class='infocustomer'> " . $_SESSION['postcode'] . " " .   $_SESSION['city'] . "</i></p>";
        echo "<h5 class='info'>Uw gerechten</h5>";
        echo "<p class='info'>Spicy chicken <b class='priceinfo'>&#8364; " . $_SESSION['chicken'] . "</b></p>";
        echo "<p class='info'>Spicy garnaal <b class='priceinfo'>&#8364; " . $_SESSION['garnaal'] . "</b></p>";
        echo "<p class='info'>Dragon roll <b class='priceinfo'>&#8364; " . $_SESSION['dragon'] . "</b></p>";
        echo "<p class='info'>Chicken roll <b class='priceinfo'>&#8364; " .  $_SESSION['roll'] . "</b></p>";
        echo "<p class='info'>Totaal <b class='priceinfo'>&#8364; " .  $_SESSION['total'] . "</b></p>";
        echo "<input type='submit' name='end' class='end' value='Plaats uw bestelling'>";
        echo "</form>";
    } else {
        echo "<h5 class='info'>Uw gegevens</h5>";
        echo "<label class='info'>Naam: </label><label></label><br>";
        echo "<label class='info'>Adres: </label><label></label><br>";
        echo "<label class='info'>Postcode + plaats: </label><label></label><br>";
        echo "<h5 class='info'>Uw gerechten</h5>";
        echo "<p class='info'>Spicy chicken &#8364; </p>";
        echo "<p class='info'>Spicy garnaal &#8364; </p>";
        echo "<p class='info'>Dragon roll &#8364; </p>";
        echo "<p class='info'>Chicken roll &#8364; </p>";
        echo "<p class='info'><b>Totaal &#8364; </b></p>";
    }
    if (isset($_POST['end'])) {
        echo "Uw bestelling is geplaats en we zullen hem zo snel mogelijk leveren!";
    }
    ?>
</div>
</body>
</html>