<?php
require_once('cnx.php');


if(isset($_POST['ok'])){

      extract($_POST);

      $date_up=date('Y-m-d H:i:s');

  $requete ="UPDATE t_enseignant SET noms=?,prenom=?,sexe=?,nationalite=?,adresse=?,categorie=?,typens=?,description=?,date_update=?
              WHERE idEns=?";

  $params=array($name,$prenom,$sexe,$nation,$adresse,$categorie,$typEns,$desc,$date_up, $idEns);
  $resultat = $bdd->prepare($requete);
  $resultat->execute($params);


        header ('location:../pages/secretariat/dashboard.php?p=enseignant'); 
}
