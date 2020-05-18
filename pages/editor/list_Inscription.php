
<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;
  
 if(isset($_POST['ok']))
  {
    extract($_POST);
    $requete="SELECT * FROM t_inscription
            LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
            LEFT JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
            LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo 
            WHERE t_promotion.idpromo='$promo' AND t_faculte.idfac='$fac'";
  $resultat=$bdd->query($requete);

  $req = $bdd->query($requete);
  $data = $req->fetch();


  $promotion = $data['promotion'];
  $faculte = $data['faculte'];
  $option = $data['_option'];
  $annee = $data['annee'];
  }

?>
 

  <!-----------------------------Start Modal Student--------------------------------------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="Enseignant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include ('../formModal/_formRapportInscrit.php');?>
  </div>
<!-----------------------------End of modal Cours--------------------------------------->

<!-----------------------------Start Modal UpdateCours--------------------------------------->
<!-- Button trigger modal -->

<div style="margin-left:20%;width:5000px"> 

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">ÉTUDIANTS INSCRITS EN <span class="text-warning" style="text-transform: uppercase;"> <?php echo $promotion;?> <?php echo $faculte;?> <?php echo $option;?></span> </p>
       </div>
       <div class="col-md-4">
       <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#Enseignant">
            <span class="fa fa-file-excel-o"></span>
                  EXPORTER EXCEL
              </button>
       </div>
     </div>
    <div class="jumbotron" id="div-id-name">
      <p>ANNÉE ACADÉMIQUE <?=$annee;?></p><hr>
        <table class="table bg-light text-center">
      <thead>
        <tr class="text-muted bg-dark">

          <th scope="col">Noms</th>
          <th scope="col">Prénom</th>
          <th scope="col">Sexe</th>
          <th scope="col">Nationalité</th>

      </tr>
      </thead>
      <tbody>
        <tr>
          <?php

            foreach($resultat as $row)
            {
              ?>

              <td>
                <?php echo $row['name']?>
              </td>
              <td>
                <?php echo $row['prenom']?>
              </td>
              <td>
                <?php echo $row['sexe']?>
              </td>
              <td>
                <?php echo $row['nationalite']?>
              </td>

        <?php
          }

          ?>
        </tr>
      </tbody>
    </table>
    </div>
  
</div>







