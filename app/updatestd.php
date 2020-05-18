
      <?php
      require_once('cnx.php');


      if(isset($_POST['ok'])){

            extract($_POST);
            $date=date('Y-m-d H:i:s');

              //Get image name

              $requette ="UPDATE t_student
                            SET name=?,prenom=?,sexe=?,nationalite=?,tel=?,email=?,adresse =?,datecrea=?,date_update=?
                                WHERE  idstd=?";
              $parms    = array($nom,$prenom,$sexe,$nation,$tel,$email,$adresse,$datecrea,$date, $idstd);
              $resultat = $bdd->prepare($requette);
              $resultat->execute($parms);



              header ('location:../pages/student/dashboard.php');
