<?php
session_start();
// Penser a ouvrir une connexion vers mysql
require_once('includes/db.php');
require_once('includes/functions.php');

// la personne qui accède a cette page est bien passée par le formulaire de connexion.
if(isset($_GET['id']) AND $_GET ['id'] > 0)
{
  $getid = intval($_GET['id']);
  $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
}
?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="js/materialize.js">
		<link rel="stylesheet" href="css/style.css">
    <title>Gestionnaire de planning et de projets</title>
	</head>
	<body>
		<h2>Le Gestionnaire de Planning et de Projets</h2>
		<div class="monmenu">
			<ul>
				<div class="m1">
					<a class="waves-effect waves-light btn-large green" href="planning.php">Planning</a>
				</div>
				<div class="m1">
					<a class="waves-effect waves-light btn-large red" href="tdl.php">To Do List</a>
				</div>
				<div class="m1">
					<a class="waves-effect waves-light btn-large blue" href="presence.php">Présence</a>
				</div>
				<div class="m1">
					<a class="waves-effect waves-light btn-large purple" href="contact.php">Contact</a>
				</div>
				<div class="m1">
					<a class="waves-effect waves-light btn-large black" href="logout.php">Déconnexion</a>
				</div>
			</ul>
		</div>
	</body>
</html>
