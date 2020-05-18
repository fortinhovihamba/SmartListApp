<?php
require_once('cnx.php');

      if(isset($_POST['ok'])){

            extract($_POST);

            $date=date('Y-m-d H:i:s');
            $date_up=date('Y-m-d H:i:s');
            $processus ="Bientôt encours";

            $requette ="INSERT INTO t_program(annee,idEns,idpromo,idcours,debut,fin,processus,date_at,date_update)value(?,?,?,?,?,?,?,?,?)";
            $parms    = array($annee,$idEns,$promo,$cours,$debut,$fin,$processus,$date,$date_up);
            $resultat = $bdd->prepare($requette);
            $resultat->execute($parms);

            header ('location:../pages/secretariat/dashboard.php?p=programme');
      }
