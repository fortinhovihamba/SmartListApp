
      <?php
      require_once('cnx.php');


      if(isset($_POST['ok'])){

            extract($_POST);

            $date=date('Y-m-d H:i:s');
            $date_up=date('Y-m-d H:i:s');

            $requette ="INSERT INTO t_cours (idfac,idpromo,cours,volHor,description_cours       ,date_at,date_update)value(?,?,?,?,?,?,?)";
            $parms    = array($fac,$promo,$cours,$volCours,$pres,$date,$date_up);
            $resultat = $bdd->prepare($requette);
            $resultat->execute($parms);
            header ('location:../pages/secretariat/dashboard.php?p=cours');
      }
