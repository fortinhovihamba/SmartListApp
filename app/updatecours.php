
      <?php
      require_once('cnx.php');
      
      
      if(isset($_POST['ok'])){
      
            extract($_POST);
            $date = date('Y-m-d h:i:s');
            $requette ="UPDATE t_cours SET cours=?,volCours=?,
            PreCours=?,date_modif='$date'
            WHERE  idcours='$idcours'";
            $parms    = array($cours,$volCours,$pres,$date);
            $resultat = $bdd->prepare($requette);
            $resultat->execute($parms);
      
            header ('location:../pages/admin/admin.php?p=cours');
      }