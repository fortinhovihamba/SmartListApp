
      <?php
      require_once('cnx.php');


      if(isset($_POST['ok'])){

            extract($_POST);

            $requette ="UPDATE t_student
            SET matricule='$cours',noms='$cours',prenom='$cours',sexe='$cours',mdps='$cours',date_at='$date_at'
             WHERE  idstd='$idstd'";
            $parms    = array($cours);
            $resultat = $bdd->prepare($requette);
            $resultat->execute($parms);

            header ('location:../pages/admin/index.php?p=cours');
      }
