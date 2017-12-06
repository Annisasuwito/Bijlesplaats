<?php
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server, $user, $pw, $db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if (isset($_POST["verzend"])) {
    $email = mysqli_real_escape_string($mysql, $_POST["Email"]);
    $voornaam = mysqli_real_escape_string($mysql, $_POST["Voornaam"]);
    $achternaam = mysqli_real_escape_string($mysql, $_POST["Achternaam"]);
    $woonplaats = mysqli_real_escape_string($mysql, $_POST["Woonplaats"]);
    $telefoonnr = mysqli_real_escape_string($mysql, $_POST["Telefoon"]);
    $klantnr = mysqli_real_escape_string($mysql, $_POST["Klantnr"]);

// Hier worden de email, voornaam, achternaam, woonplaats, telefoonnr en klantnr gewijzigd in de database
    mysqli_query($mysql, "UPDATE Klanten SET Email = '$email' WHERE Klantnr = '$klantnr'") or die("De updatequery op de database is mislukt!");
    mysqli_query($mysql, "UPDATE Klanten SET Voornaam = '$voornaam' WHERE Klantnr = '$klantnr'") or die("De updatequery op de database is mislukt!");
    mysqli_query($mysql, "UPDATE Klanten SET Achternaam = '$achternaam' WHERE Klantnr = '$klantnr'") or die("De updatequery op de database is mislukt!");
    mysqli_query($mysql, "UPDATE Klanten SET Woonplaats = '$woonplaats' WHERE Klantnr = '$klantnr'") or die("De updatequery op de database is mislukt!");
    mysqli_query($mysql, "UPDATE Klanten SET Telefoonnr = '$telefoonnr' WHERE Klantnr = '$klantnr'") or die("De updatequery op de database is mislukt!");
    mysqli_query($mysql, "UPDATE Klanten SET Klantnr = '$klantnr' WHERE Klantnr = '$klantnr'") or die("De updatequery op de database is mislukt!");


// Gegevens opvragen uit de database
    $resultaat = mysqli_query($mysql, "SELECT * FROM Klanten") or die("De query op de database is mislukt!");

// Verbinding weer sluiten
    mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
}
?>

<html>
<head>
    <title>Wijzig hier uw persoonlijke gegevens</title>
</head>
<body>
<form action="script4.php" method="post">

    <?php
    // Hier worden alle gegevens uit de database getoond in de keuzelijst
    while (list($email, $voornaam, $achternaam, $woonplaats, $telefoonnr) = mysqli_fetch_row($resultaat)) {
       
    }
    ?>
    </input><br/><br/>
    Vul uw nieuwe email in: <input type="text" name="Email"/><br/><br/>


    </input><br/><br/>
    Voornaam: <input type="text" name="Voornaam"/><br/><br/>


    </input><br/><br/>
    Achternaam: <input type="text" name="Achternaam"/><br/><br/>


    </input><br/><br/>
    Woonplaats: <input type="text" name="Woonplaats"/><br/><br/>


    </input><br/><br/>
    Telefoonnr: <input type="text" name="Telefoon"/><br/><br/>
    <input type="submit" name="verzend" value="Wijzig uw gegevens"/>


</form>
</body>
</html>
