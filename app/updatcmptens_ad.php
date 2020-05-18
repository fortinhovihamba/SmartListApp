<?php
require_once('cnx.php');

if(isset($_POST['ok']))
{
  extract($_POST);
 $date=date('d-m-Y H:i:s');
  $requete =" UPDATE t_comptens SET tel=?,email=?,date_update=?
              WHERE idcomptens=?";
  $params =array($tel,$email,$date, $id);
  $resultat = $bdd->prepare($requete);
  $resultat->execute($params);

  header ('location:../pages/admin/dashboard.php?p=comptens&d=2');
}
