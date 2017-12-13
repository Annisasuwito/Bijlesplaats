<?php 
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Categori�n opvragen uit de database
$resultaat1 = mysqli_query($mysql,"SELECT * FROM advertentie") or die("De query 1 op de database is mislukt!");

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>

<html>
<head>
<title>Filter jouw opties</title>
</head>
<body>
<form action="script3.php" method="post">
Filter jouw opties: <select name="advertentie">
<?php
// Hier worden alle verschillende categori�n uit de database getoond in de keuzelijst
while(list($advertentie) = mysqli_fetch_row($resultaat1))
{
echo"<option value='$advertentie'>$advertentie</option>";
}
?> 
</select><br /><br />
<input type="submit" name="verzend" value="Verzend" />
</form>
</body>
</html>

<?php
// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
if(isset($_POST["verzend"]))
{
// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$categorie = mysqli_real_escape_string($mysql,$_POST["categorie"]);

// Gegevens opvragen uit de database
$resultaat2 = mysqli_query($mysql,"SELECT * FROM advertentie WHERE advertentie = '$advertentie'") or die("De selectquery op de database is mislukt!");

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");

// Hier worden de opgehaalde artikelen getoond
 while(list($vaknr,$leerjaar,$titel,$text, $datum, $niveau) = mysqli_fetch_row($resultaat2))
	 {
	  	echo"$resultaat2 <br />";
	 }
}
?>