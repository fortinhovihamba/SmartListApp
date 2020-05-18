<?php
require_once('cnx.php');

if(isset($_POST['ok'])){

      extract($_POST);
      $date=date('Y-m-d H:i:s');
      $date_up=date('Y-m-d H:i:s');

      $requette ="INSERT INTO t_cote(annee,examen,idinscrit,idcours,point_obt,max,datecrea,date_update)value(?,?,?,?,?,?,?)";
      $parms    = array($annee,$examen,$idstd,$cours,$examen,$point_Obt,$point,$date);
      $resultat = $bdd->prepare($requette);
      $resultat->execute($parms);

      header ('location:../pages/admin/index.php?p=cote');
}
