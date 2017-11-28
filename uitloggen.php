<?php
session_start();
$_SESSION['login']=null;// lege array van de sessie maken
session_destroy(); // beindig de sessie
header("Location: login.php"); //terug verwijzen naar de inlog pagina
exit; //en je header netjes afsluiten
?>