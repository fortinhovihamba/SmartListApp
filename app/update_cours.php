<?php
require_once('cnx.php');

if(isset($_POST['ok']))
{
  extract($_POST);
 $date=date('Y-m-d H:i:s');
  $requete =" UPDATE t_cours SET cours=?,volHor=?,date_update=? WHERE idcours=?";
  $params =array($cours,$vol,$date, $id);
  $resultat = $bdd->prepare($requete);
  $resultat->execute($params);

  header ('location:../pages/secretariat/dashboard.php?p=cours&d=1');
}
