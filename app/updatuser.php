<?php
require_once('cnx.php');

if(isset($_POST['ok']))
{
  extract($_POST);
 $date=date('d-m-Y H:i:s');
  $requete =" UPDATE t_users SET name=?,prenom=?,sexe=?,tel=?,adress=?,email=?,role=?,date_update=?
              WHERE iduser=?";
  $params =array($name,$prenom,$sexe,$tel,$adresse,$email,$role,$date, $id);
  $resultat = $bdd->prepare($requete);
  $resultat->execute($params);

  header ('location:../pages/admin/dashboard.php?p=users&d=2');
}
