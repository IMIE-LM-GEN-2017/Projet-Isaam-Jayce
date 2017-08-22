<?php
// Connexion à la base de données
require_once('php/includes/data-base.php');
require_once('php/includes/fonctions.php');

// Définition titre page
$titrePage="Connexion à l'IMIE";
$erreur= false;
$succes= false;
if(verifierFormulaire(['username', 'password']) === true){
  $sql="SELECT * FROM users"
       ." WHERE username='"
       .mysqli_real_escape_string($connection, $_POST['username'])
       ."' AND password='"
       .mysqli_real_escape_string($connection, md5($_POST['password']))
       ."'";
  $resultat = executerRequete($connection, $sql);
  if($resultat !== false && mysqli_num_rows($resultat) > 0){
    $utilisateur = mysqli_fetch_assoc($resultat);
    $_SESSION['utilisateur'] = $utilisateur;
    $succes = true;
  }else{
    $erreur=true;
  }
}

// Headers html; <head> + titres
include ('php/parties/header.php');

if($erreur === true){
  alert('danger', 'Identifiants invalides');
}elseif($erreur === false && $succes === true){
  alert('success', 'Bienvenue, ' . $utilisateur['prenom']);
}else{
  ?> <form action="login.php" method="post">
      <input type="text" name="username" placeholder="username">
      <br>
      <input type="password" name="password" placeholder="Mot de passe">
      <br>
      <button type="submit">Connexion</button>
    </form> <?php
}

$ordreChamp = 'name';
// $ordreDirection = 'ASC';
// $champsTriables= ['id', 'name', 'address', 'zip', 'city'];
$listeDeChamps= [
  "id" => "ID",
  "name" => "Name",
  "address" => "Address",
  "zip" => "Zip",
  "city" => "City",
];

$sql = "SELECT * FROM centers ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="js/materialize.js">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
<h1><img src="imie.png" alt="IMIE"></h1>
<h2>Ecole de la filière numérique</h2>

<!--ID--><center>
      <div class="users">
      <div class="col s12">
       <form class="col s12">
             <div class="input-field col s12">
               <input id="identifiant" type="text" class="validate" placeholder="Identifiant">
             </div>
           </div>
<!--Pass-->
          <div class="col s12">
             <div class="input-field col s12">
               <input id="password" type="password" class="validate" placeholder="Password">
               <label for="password"></label>
             </div>
           </div>
         </form>
         </div>
<!--Bouton envoyer-->
      <div class="envoieusers">
       <a href="menu.php?utilisateur">
         <button class="btn waves-effect waves-light green" type="submit" name="action">Connexion</button>
       </a>
     </div>
   </body>
 </head>
     <?php
     if (isset($_POST['submit']))
         {
     include("data-base.php");
     session_start();
     $username=$_POST['username'];
     $password=$_POST['password'];
     $_SESSION['utilisateur']=$username;
     $query = mysql_query("SELECT username FROM login WHERE username='$username' and password='$password'");
      if (mysql_num_rows($query) != 0)
     {
      echo "<script language='javascript' type='text/javascript'> location.href='menu.php' </script>";
       }
       else
       {
     echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
     }
     }
     ?>
<?php
include ("parties/footer.php");
 ?>
