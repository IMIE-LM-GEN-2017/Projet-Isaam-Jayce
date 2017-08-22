<?php
// Penser a ouvrir une connexion vers mysql
require_once('includes/db.php');
require_once('includes/functions.php');

// la personne qui accède a cette page est bien passée par le formulaire de connexion.
session_start();
if (!isset($_SESSION['username'])) {
  exit();
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

<!--Menu haut-->
	<div class="menu-haut">
	<ul>
		<a class="waves-effect waves-light btn-large green" href="planning.php">Planning</a>
		<a class="waves-effect waves-light btn-large red" href="tdl.php">To Do List</a>
		<a class="waves-effect waves-light btn-large purple" href="contact.php">Contact</a>
		<a class="waves-effect waves-light btn-large black" href="logout.php">Déconnexion</a>
	</ul>
	</div>

<!--Bandeau-->
	<nav>
    <div class="nav-wrapper blue">
      <center><h1>Présence</h1></center>
    </div>
  </nav>

<!--Date et heure-->
<?php
$date = date("d-m-Y");
$heure = date("H:i:s");
echo "Nous sommes le $date et il est $heure";
?>

<!--Checkboxes-->
  <center><div class="check">
    <form action="#">
	   <p class="center-align">
		  <input type="checkbox" id="test01" />
		   <label for="test01">Monsieur X</label>
	   </p>

	   <p class="center-align">
		  <input type="checkbox" id="test02" />
		   <label for="test02">Monsieur X</label>
	   </p>

	   <p class="center-align">
		  <input type="checkbox" id="test03" />
		   <label for="test03">Monsieur X</label>
	   </p>

	   <p class="center-align">
		  <input type="checkbox" id="test04" />
		   <label for="test04">Monsieur X</label>
	   </p>

	   <p class="center-align">
		  <input type="checkbox" id="test05" />
		   <label for="test05">Monsieur X</label>
	   </p>
    </form>

<!--Bouton envoyer-->
  <br>
	 <center>
		<button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Envoyer</button>
	 </center>
  </div>
  </center>
</body>
</html>

<?php
// Voir si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
  // Voir si le fichier n'est pas trop gros
  if ($_FILES['monfichier']['size'] <= 1000000)
    {
      // Voir si l'extension est autorisée
      $infosfichier = pathinfo($_FILES['monfichier']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'png', 'txt', 'pdf', 'html', 'php');
      if (in_array($extension_upload, $extensions_autorisees))
      {
        // Valider le fichier et le stocker définitivement
        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'Liste des présences/' . basename($_FILES['monfichier']['name']));
        echo "La liste est envoyée !";
      }
    }
}
?>
