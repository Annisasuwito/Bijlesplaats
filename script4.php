<?php 
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if(isset($_POST["verzend"]))
{
// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$artikel = mysqli_real_escape_string($mysql,$_POST["artikel"]);	
$prijs = mysqli_real_escape_string($mysql,$_POST["prijs"]);

// Hier wordt de prijs gewijzigd in de database
mysqli_query($mysql,"UPDATE artikel SET Verkoopprijs = '$prijs' WHERE Artikelnr = '$artikel'") or die("De updatequery op de database is mislukt!");	
}

// Artikelen opvragen uit de database
$resultaat = mysqli_query($mysql,"SELECT * FROM artikel") or die("De query op de database is mislukt!");

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>

<html>
<head>
<title>Prijs wijzigen</title>
</head>
<body>
<form action="script4.php" method="post">
Kies een artikel: <select name="artikel">
<?php
// Hier worden alle artikelen uit de database getoond in de keuzelijst
while(list($artikelnr,$omschrijving,$categorie,$prijs) = mysqli_fetch_row($resultaat))
{
echo"<option value='$artikelnr'>$omschrijving $categorie $prijs</option>";
}
?> 
</select><br /><br />
Vuk de nieuwe prijs in: <input type="text" name="prijs" /><br /><br />
<input type="submit" name="verzend" value="Verzend" />
</form>
</body>
</html>
