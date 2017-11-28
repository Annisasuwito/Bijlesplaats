<?php
include "login.php";
?>
<html>
<head>
<title>Categorie</title>
</head>
<body>
<form action="script2.php" method="post">
Vul een categorie in: <input type="text" name="categorie" /><br /><br />
<input type="submit" name="verzend" value="Verzend" />
</form>
</body>
</html>

<?php

include "connect.php";
// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
if(isset($_POST["login"]))
{

    $name = mysqli_real_escape_string($mysql,$_POST["name"]);
    $password = mysqli_real_escape_string($mysql,$_POST["password"]);

    // Hier wordt connectie gemaakt met de database
    $mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
    $categorie = mysqli_real_escape_string($mysql,$_POST["categorie"]);

// Gegevens opvragen uit de database
    $resultaat = mysqli_query($mysql,"SELECT * FROM artikel WHERE categorie = '$categorie'") or die("De selectquery op de database is mislukt!");
    mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");

// Hier worden de opgehaalde artikelen getoond
    while(list($artikelnr,$omschrijving,$categorie,$prijs) = mysqli_fetch_row($resultaat))
    {
        echo"$artikelnr $omschrijving $categorie $prijs <br />";
    }
}
?>
<a href="uitloggen.php">Uitloggen</a>
