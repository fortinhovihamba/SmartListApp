<?php
require_once('cnx.php');

if(isset($_POST['ok'])){

      extract($_POST);
      $date=date('Y-m-d H:i:s');
      $date_up=date('Y-m-d H:i:s');

        $requette ="INSERT INTO t_cote(annee,idinscrit,idcours,examen,point_obt,max,mention,date_at,date_update)value(?,?,?,?,?,?,?,?,?)";
        $parms    = array($annee,$id,$cours,$examen,$point,$max,$mention,$date,$date_up);
        $resultat = $bdd->prepare($requette);
        $resultat->execute($parms);

        header ('location:../pages/editor/dashboard.php?p=cote');




}
