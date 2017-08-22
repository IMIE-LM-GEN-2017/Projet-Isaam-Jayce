<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  		<link rel="stylesheet" href="css/materialize.css">
  		<link rel="stylesheet" href="js/materialize.js">
  		<link rel="stylesheet" href="css/style.css">
      <title>Gestionnaire de planning et de projets</title>
    </head>
    <body>
  <!--
  <form action="minichat_post.php" method="post">
    <p>
    <label for="username">Nom</label> : <input type="text" name="nom" id="nom" value="<?php if (isset($_POST['username'])) echo htmlentities(trim($_POST['username'])); ?>"/><br />
    <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
    <input type="submit" value="Envoyer" />
    </p>
  </form>
  -->

  <!--Menu-->
  <div class="menu-haut">
  <ul>
    <a class="waves-effect waves-light btn-large green" href="planning.php">Planning</a>
    <a class="waves-effect waves-light btn-large red" href="tdl.php">To Do List</a>
    <a class="waves-effect waves-light btn-large blue" href="presence.php">Présence</a>
    <a class="waves-effect waves-light btn-large black" href="logout.php">Déconnexion</a>
  </ul>
  </div>
  <!--Bandeau-->
    <nav>
      <div class="nav-wrapper purple">
        <center><h1>Contact</h1></center>
      </div>
    </nav>
  <!--Liste-->
  <div class="contact">
  <ul>
    <div class="valign-wrapper">
      <div class="c1">Monsieur X</div><a class="btn-floating blue darken-3" href="#"><i class="material-icons">mode_edit</i></a>
    </div>
    <br>
    <div class="valign-wrapper">
      <div class="c1">Monsieur X</div><a class="btn-floating blue darken-3" href="#"><i class="material-icons">mode_edit</i></a>
    </div>
    <br>
    <div class="valign-wrapper">
      <div class="c1">Monsieur X</div><a class="btn-floating blue darken-3" href="#"><i class="material-icons">mode_edit</i></a>
    </div>
    <br>
    <div class="valign-wrapper">
      <div class="c1">Monsieur X</div><a class="btn-floating blue darken-3" href="#"><i class="material-icons">mode_edit</i></a>
    </div>
    <br>
    <div class="valign-wrapper">
      <div class="c1">Monsieur X</div><a class="btn-floating blue darken-3" href="#"><i class="material-icons">mode_edit</i></a>
    </div>
    <br>
    <div class="valign-wrapper">
      <div class="c1">Monsieur X</div><a class="btn-floating blue darken-3" href="#"><i class="material-icons">mode_edit</i></a>
    </div>
    <br>
  </ul>
  </div>

<?php
// Connexion à la base de données
try
{
  $db = new PDO('mysql:host=localhost;dbname=gpp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $db->query('SELECT username, message FROM contact ORDER BY ID DESC LIMIT 0, 15');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
  echo '<p><strong>' . htmlspecialchars($donnees['username']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}
$reponse->closeCursor();

// Insertion du message à l'aide d'une requête préparée
$req = $db->prepare('INSERT INTO contact (username, message) VALUES(?, ?)');
$req->execute(array($_POST['username'], $_POST['message']));

// Redirection du visiteur vers la page de contact
header('Location: contact.php');
?>

  </body>
</html>
