<?php
require_once('cnx.php');

if(isset($_POST['ok']))
{
  extract($_POST);
 $date=date('d-m-Y H:i:s');
  $requete =" UPDATE t_comptstd SET tel=?,email=?,date_update=?
              WHERE idcmptstd=?";
  $params =array($tel,$email,$date, $id);
  $resultat = $bdd->prepare($requete);
  $resultat->execute($params);

  header ('location:../pages/admin/dashboard.php?p=comptstd&d=2');
}
