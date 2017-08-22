<?php
$server = "127.0.0.1";
$username = "vagrant";
$password = "";
$db = "root";
// Créer la connexion:
$connection = mysqli_connect($server, $username, $password, $db);

// Test de la connexion:
if (!$connection) {
  die("Impossible de se connecter à la base de données");
}
var_dump(isset($_GET["order"]));
?>
