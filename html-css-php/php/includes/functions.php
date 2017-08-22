<?php
/**
 * Cette fonction teste les valeurs "order" et "direction"
 * de la variable $_GET (la "querystring"). Elle retourne une
 * liste avec les nouvelles valeurs si elles sont valides;
 * ou les valeurs par défaut, si ce n'est pas le cas.
 */
function testOrderBy($listeDeChamps, $champParDefaut, $directionParDefaut){
  // Test du champ à trier
  if(isset($_GET['order'])){
    if(in_array($_GET['order'], $listeDeChamps)){
      $champParDefaut = $_GET['order'];
    } else {
      echo "Je ne connais pas ce champ, désolé";
    }
  }
  // Test de la direction du tri
  if(isset($_GET['direction'])){
    if(in_array($_GET['direction'], ['ASC', 'DESC'])){
      $directionParDefaut = $_GET['direction'];
    } else {
      echo "Je ne connais pas cet ordre.";
    }
  }
  return [$champParDefaut, $directionParDefaut];
}

function tableHeaders($liste){
  // [ 'id' => 'Id']
  $out = '';
  foreach($liste as $cle=>$valeur){
    $out.= "<th>";
    $out.=$valeur;
    $out.="<a href=\"?order=$cle&amp;direction=ASC\">+</a>";
    $out.="<a href=\"?order=$cle&amp;direction=DESC\">-</a>";
    $out.= "</th>";
  }
  return $out;
}

// [champ1, champ2,..]
function verifierFormulaire($champs){
  if(count($_POST)>0){
    for($i = 0; $i<count($champs); $i++){
      if(
        !isset($_POST[$champs[$i]])
        || empty($_POST[$champs[$i]])
      ){
        return false;
      }
    }
    return true;
  }
  return null;
}

function executerRequete($connection, $requeteSql){
  $resultat = false;
  if(!$resultat = mysqli_query($connection, $requeteSql)){
    alert('danger', 'Erreur SQL: <br>'.mysqli_error($connection));
    return false;
  }
  return $resultat;
}

function utilisateurEstIdentifie(){
  return isset($_SESSION)
         && isset($_SESSION['utilisateur'])
         && isset($_SESSION['utilisateur']['id']);
}

function userInfo($champ){
  if(isset($_SESSION)
         && isset($_SESSION['utilisateur'])
         && isset($_SESSION['utilisateur'][$champ])){
    return $_SESSION['username'][$champ];
  }
  return null;
}
