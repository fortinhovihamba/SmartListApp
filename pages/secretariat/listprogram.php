<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');


$query = "SELECT * FROM t_promotion";
$resultats=$bdd->query($query);

$sql = "SELECT * FROM t_faculte";
$result=$bdd->query($sql);
  ?>


<!-----------------------------Start Modal Requette--------------------------------------->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">AFFICHEZ LA LISTE COURS <span class="fa fa-binoculars"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="dashboard.php?p=listprogram" method="POST">
          <div class="modal-body">

                    <div class="form-group">
                      <input class="form-control" type="text" name="annee" placeholder="Entrez l'année académique">
                    </div>

                    <div class="form-group">
                    <select name="fac" autocomplete="off" required="required" class="form-control">
                    <option selected>Choississez une faculte</option>
                    <?php  foreach($result as $fac) {?>
                     <option value="<?php echo $fac['idfac'];?>"><?php echo $fac['faculte'];?> <?php echo $fac['_option'];?></option>
                          <?php }?>
                            </select>
                    </div>

                    <div class="form-group">
                    <select name="idpromo" autocomplete="off" required="required" class="form-control">
                    <option selected>Choississez une promotion</option>
                    <?php  foreach($resultats as $promotion) {?>
                     <option value="<?php echo $promotion['idpromo'];?>"><?php echo $promotion['slug_promo'];?></option>
                          <?php }?>
                            </select>
                    </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal"><i class="far fa-window-close"></i> Cancel</button>
            <button type="submit" name="ok"class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-search"></i> Recherche</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-----------------------------End of modal student--------------------------------------->



<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
       <h3>Liste des programmes</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#student">
                    <span class="fa fa-binoculars"></span>
                    Afficher
            </button>
    </div>
</div>
<section>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-12 col-md8 ml-auto">
<div class="card-title">
          <?php
            if(isset($_POST['ok']))
            {
              extract($_POST);



              $query = "SELECT * FROM t_program
              LEFT JOIN t_enseignant ON t_enseignant.idEns=t_program.idEns
              LEFT JOIN t_cours ON t_cours.idcours=t_program.idcours
              LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
              LEFT JOIN t_promotion ON t_promotion.idpromo=t_program.idpromo
              WHERE t_program.annee='$annee' AND t_promotion.idpromo='$idpromo'AND t_faculte.idfac='$fac'";

              $requeteCount="select count(*) countP from t_program";
              $resultatCount=$bdd->query($requeteCount);
              $tabCount=$resultatCount->fetch();
              $nbrEns=$tabCount['countP'];

              $resultat=$bdd->query($query);
              $req=$resultat->rowCount();
              $result=$bdd->query($query);
              $data =$result->fetch();
              $fac =$data['faculte'];
              $option =$data['_option'];
              $promotion =$data['promotion'];

              if ($req > 0)

              {?>

                <div class="mt-4"></div>
                <button class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-xls"></i> Exporter Excel</button><div class="mt-4">
                  <h5 class="p-3 mb-2 bg-dark text-white text-center">PROGRAMME ACADEMIQUE DE L'ANNÉE <?=$annee; ?>  </h5>

                  <div class="mt-4">
                    <table class="table">
                      <tr>
                        <th scope="col">Promotion :</th>
                        <td><?=$promotion?></td>
                      </tr>
                      <tr>
                        <th scope="col">Faculté :</th>
                        <td>
                          <?=$fac?>
                          <?=$option?>
                        </td>
                      </tr>
                    </table>
                <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Cours</th>
                                    <th scope="col">Dispensé Par</th>
                                    <th scope="col">Processus de cours</th>
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
                                          <?php echo $row['prenom']?><br>
                                          <?php echo $row['noms']?><br>
                                          (<?php echo $row['categorie']?>)
                                        </td>
                                        <td><?php echo $row['processus']?></td>

                                        </tr>

                                <?php
                               }
                                ?>
                              </tbody>
                </table>
            <?php
          }
            else
            {
                $flash="<div class='erreur'><strong>Erreur</strong> : Il y a pas d'information sur ta requete : Veuillez vérifier tes informations!</div>";
                ?>
                 <div class="alert alert-danger " role="alert">
                 <?php echo $flash;?>
            <?php }?>

          <?php  }

          ?>

</div>
</div>
</div>
</div>
</section>
