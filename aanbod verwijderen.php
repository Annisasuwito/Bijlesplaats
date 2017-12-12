
<?php

include "connect.php";



$mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");



if(isset($_POST["verzend"]))

{

$advertenties = mysqli_real_escape_string($mysql,$_POST["advertenties"]);



mysqli_query($mysql,"DELETE FROM advertenties WHERE advertentienr = '$advertenties'") or die("De deletequery op de database is mislukt!");

}



$resultaat = mysqli_query($mysql,"SELECT * FROM advertenties") or die("De query op de database is mislukt!");



mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");

?>



<html>

<head>

<title> Advertentie verwijderen </title>

</head>

<body>

<form action="script6.php" method="post">

Kies een advertentie: <select name="advertenties">

<?php

// Hier worden alle advertenties uit de database getoond in de keuzelijst

while(list($advertentienr, $vaknr, $leerjaar, $titel, $text, $datum, $niveau) = mysqli_fetch_row($resultaat))

{

echo"<option value='$advertentienr'>$titel $text $datum $niveau $leerjaar $vaknr </option>";

}

?>

</select><br /><br />

<input type="submit" name="verzend" value="Verwijder advertentie" />

</form>

</body>

</html>