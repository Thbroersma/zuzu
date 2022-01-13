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
<h2>Uw totale bestelling</h2>
<div class="col-md-5 total">
    <br>
    <?php 
    echo "<label class='info'>Naam: </label><label> " . $_SESSION['firstname'] . " " .   $_SESSION['lastname'] . "</label><br>";
    echo "<label class='info'>Adres: </label><label> " . $_SESSION['address'] . "</label><br>";
    echo "<label class='info'>Postcode + plaats: </label><label> " . $_SESSION['postcode'] . " " .   $_SESSION['city'] . "</label><br>";
    
    echo "<p> &#8364; " . $_SESSION['chicken'] . "</p>";
    echo "<p> &#8364; " . $_SESSION['garnaal'] . "</p>";
    echo "<p> &#8364; " . $_SESSION['dragon'] . "</p>";
    echo "<p> &#8364; " .  $_SESSION['roll'] . "</p>";
    echo "<p>Totaal &#8364; " .  $_SESSION['total'] . "</p>";

    ?>
</div>
</body>
</html>