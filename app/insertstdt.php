<?php
require_once('cnx.php');

if(isset($_POST['ok'])){

    extract($_POST);

    $date=date('Y-m-d H:i:s');
    $date_up=date('Y-m-d H:i:s');
    $mdps = sha1($password);

      $requette ="INSERT INTO t_student(name,prenom,sexe,nationalite,tel,email,adresse,datecrea,date_update)value(?,?,?,?,?,?,?,?,?)";
      $parms    = array($name,$prenom,$sexe,$nationalite,$tel,$email,$adresse,$date,$date_up);
      $resultat = $bdd->prepare($requette);
      $resultat->execute($parms);


      header ('location:../pages/editor/dashboard.php?p=student');
}
