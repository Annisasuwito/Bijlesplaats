<?php
session_start();
include "connect.php";

// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
if(isset($_POST["login"]))
{
// Hier wordt connectie gemaakt met de database
    $mysql = mysqli_connect($server,$user,$pw,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

    $name = $_POST["gebruikersnaam"];
    $password = $_POST["wachtwoord"];
    //$name = mysqli_real_escape_string($mysql,$_POST["name"]);
    //$password = mysqli_real_escape_string($mysql,$_POST["password"]);

    $resultaat = mysqli_query($mysql,"SELECT * FROM users WHERE name = '$name' AND password = '$password' LIMIT 1") or die("De selectquery op de database is mislukt!");

   $user = mysqli_fetch_assoc($resultaat);
   if(count($user)){
       $_SESSION['login']= $user;
   }
   else{
       $loginError = "Foute gebruikersnaam/wachtwoord <br/>";
           $_SESSION['login']=null;
   }

    mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");


}

if(!isset($_SESSION['login'])){

    ?>
    <html>

<head>
    <title>Login</title>
</head>
Vul hier je gegevens in
<body>
<form method="post">
        Gebruikersnaam: <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" /><br /><br />
    Wachtwoord: <input type="password" name="wachtwoord" placeholder="Wachtwoord" /><br /><br />
    <input type="submit" name="login" value="Verzend" />
</form>
</body>
</html>
    <?php
    exit();
}






