<?php
 require_once('../../app/cnx.php');

 if(isset($_POST['ok']))
 {
   extract($_POST);

   $sql = "SELECT * FROM t_program
   LEFT JOIN t_enseignant ON t_enseignant.idEns=t_program.idEns
   LEFT JOIN t_cours ON t_cours.idcours=t_program.idcours
   LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
   LEFT JOIN t_promotion ON t_promotion.idpromo=t_program.idpromo
   WHERE t_program.annee='$annee'";
   $resultat=$bdd->query($sql);
   $result=$bdd->query($sql);

   $req=$resultat->rowCount();


if($req > 0){


?>

<div style="margin-left:15%;width:9000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">PROGRAMME ACADEMIQUE DE L'ANNÉE <?=$annee; ?>  </h5>
  <div class="jumbotron" id="div-id-name">

    <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cours</th>
                        <th scope="col">Promotion</th>
                        <th scope="col">Dispensé Par</th>
                        <th scope="col">Processus de cours</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($resultat as $row)
                    {?>

                      <tr>
                          <td>
                            <?php echo $row['cours']?>
                          </td>
                          <td>
                            <?php echo $row['slug_promo']?>
                            <?php echo $row['faculte']?>
                            <?php echo $row['_option']?>

                          </td>
                          <td>
                            <?php echo $row['prenom']?><br>
                            <?php echo $row['noms']?><br>
                            (<?php echo $row['categorie']?>)
                          </td>
                          <td><?php echo $row['processus']?></td>
                          <td>
                              <a href="dashboard.php?p=detail&id= " class="btn btn-warning"><i class="fas fa-eye"></i></a>
                          </td>
                          </tr>

                  <?php
                 }
                  ?>
                </tbody>
                </table>
  </div>
</div>

<?php  }
    else
    {?>
      <div style="margin-left:3%;width:4000px; margin-top:100px">

      <div class="alert alert-danger text-center" role="alert" >
        <?php echo "Pas de progamme pour l'instant";?>
      </div>
    </div>
  <?php
  }

 }

?>
