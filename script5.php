<?php 

include "connect.php";

$mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

if(isset($_POST["verzend"]))
{
$artikelnr = mysqli_real_escape_string($mysql,$_POST["artikelnr"]);	
$omschrijving = mysqli_real_escape_string($mysql,$_POST["omschrijving"]);
$categorie = mysqli_real_escape_string($mysql,$_POST["categorie"]);
$verkoopprijs = mysqli_real_escape_string($mysql,$_POST["verkoopprijs"]);

mysqli_query($mysql,"INSERT INTO artikel(Artikelnr,Omschrijving,Categorie,Verkoopprijs) VALUES('$artikelnr','$omschrijving','$categorie','$verkoopprijs')") or die("De insertquery op de database is mislukt!");	
}

mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>

<html>
<head>
<title>Artikel toevoegen</title>
</head>
<body>
<form action="script5.php" method="post">
Vul het artikelnummer in: <input type="text" name="artikelnr" /><br /><br />
Vul de omschrijving in: <input type="text" name="omschrijving" /><br /><br />
Vul de categorie in: <input type="text" name="categorie" /><br /><br />
Vul de verkoopprijs in: <input type="text" name="verkoopprijs" /><br /><br />
<input type="submit" name="verzend" value="Voeg artikel toe" />
</form>
</body>
</html>
