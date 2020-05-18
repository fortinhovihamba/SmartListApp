<?php
require_once('cnx.php');

if(isset($_POST['ok'])){

      extract($_POST);

      $date=date('Y-m-d H:i:s');
      $date_up=date('Y-m-d H:i:s');

      $requette ="INSERT INTO t_inscription (idstd,idpromo,idfac,annee,datecrea,date_update)value(?,?,?,?,?,?)";
      $parms    = array($idstd,$promo,$fac,$annee,$date,$date_up);
      $resultat = $bdd->prepare($requette);
      $resultat->execute($parms);

      header ('location:../pages/editor/dashboard.php?p=list_Inscription');
}
