<?php
require_once('cnx.php');

if(isset($_POST['ok']))
{
  extract($_POST);
 $date=date('Y-m-d H:i:s');
  $requete =" UPDATE t_program SET annee=?,idEns=?,idpromo=?,idcours=?,debut=?,fin=?,processus=?,date_at=?,date_update=?
              WHERE idpgrm=?";
  $params =array($annee,$idprg,$idpromo,$idcours,$debut,$fin,$processus,$date_at,$date, $idprg);
  $resultat = $bdd->prepare($requete);
  $resultat->execute($params);

  header ('location:../pages/teacher/dashboard.php');
}
