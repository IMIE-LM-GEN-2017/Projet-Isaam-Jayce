<? php

function utilisateurEstIdentifie(){
  return isset($_SESSION)
         && isset($_SESSION['utilisateur'])
         && isset($_SESSION['utilisateur']['id']);
}

function executerRequete($connection, $requeteSql){
  $resultat = false;
  if(!$resultat = mysqli_query($connection, $requeteSql)){
    alert('danger', 'Erreur SQL: <br>'.mysqli_error($connection));
    return false;
  }
  return $resultat;
}

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

?>
