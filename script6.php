<?php
include "connect.php";

$mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

if(isset($_POST["verzend"]))
{
$artikel = mysqli_real_escape_string($mysql,$_POST["artikel"]);

mysqli_query($mysql,"DELETE FROM artikel WHERE Artikelnr = '$artikel'") or die("De deletequery op de database is mislukt!");
}

$resultaat = mysqli_query($mysql,"SELECT * FROM artikel") or die("De query op de database is mislukt!");

mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>

<html>
<head>
<title>Artikel verwijderen</title>
</head>
<body>
<form action="script6.php" method="post">
Kies een artikel: <select name="artikel">
<?php
// Hier worden alle artikelen uit de database getoond in de keuzelijst
while(list($artikelnr,$omschrijving,$categorie,$prijs) = mysqli_fetch_row($resultaat))
{
echo"<option value='$artikelnr'>$omschrijving $categorie $prijs</option>";
}
?>
</select><br /><br />
<input type="submit" name="verzend" value="Verwijder artikel" />
</form>
</body>
</html>
