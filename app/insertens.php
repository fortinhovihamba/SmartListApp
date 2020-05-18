<?php
require_once('cnx.php');


if(isset($_POST['ok'])){

      extract($_POST);

      $date=date('Y-m-d H:i:s');
      $date_up=date('Y-m-d H:i:s');

      $requette ="INSERT INTO t_enseignant (idfac,noms,prenom,sexe,nationalite,adresse,categorie,typens,description,datecre_at,date_update)value(?,?,?,?,?,?,?,?,?,?,?)";
      $parms    = array($fac,$name,$prenom,$sexe,$nation,$adresse,$categorie,$typEns,$desc,$date,$date_up);
      $resultat = $bdd->prepare($requette);
      $resultat->execute($parms);

      header ('location:../pages/secretariat/dashboard.php?p=enseignant'); 
}
