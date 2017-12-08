<?php
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server, $user, $pw, $db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");


// Gegevens opvragen uit de database
$resultaat = mysqli_query($mysql, "SELECT * FROM advertenties ORDER BY titel") or die("De selectquery op de database is mislukt!");
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");

// Hier worden de opgehaalde artikelen getoond
while (list($vaknr, $leerjaar, $advertentienr, $titel, $text, $datum, $niveau) = mysqli_fetch_row($resultaat)) {
    echo "$titel $text $datum $niveau $leerjaar $vaknr $advertentienr <br />";
}
?>

