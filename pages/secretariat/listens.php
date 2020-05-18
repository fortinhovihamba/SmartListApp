<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');


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
        <h5 class="modal-title" id="exampleModalLabel">AFFICHEZ LES ENSEIGNANTS <span class="fa fa-binoculars"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="dashboard.php?p=listens" method="POST">
          <div class="modal-body">

                    <div class="form-group">
                    <select name="fac" autocomplete="off" required="required" class="form-control">
                    <option selected>Choississez une faculte</option>
                    <?php  foreach($result as $fac) {?>
                     <option value="<?php echo $fac['idfac'];?>"><?php echo $fac['faculte'];?> <?php echo $fac['_option'];?></option>
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
       <h3>Liste des enseignants</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#student">
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



              $query = "SELECT * FROM t_enseignant
                        LEFT JOIN t_faculte ON t_faculte.idfac=t_enseignant.idfac
                        WHERE t_faculte.idfac='$fac'";

              $requeteCount="select count(*) countE from t_enseignant";
              $resultatCount=$bdd->query($requeteCount);
              $tabCount=$resultatCount->fetch();
              $nbrEns=$tabCount['countE'];

              $resultat=$bdd->query($query);
              $req=$resultat->rowCount();
              $result=$bdd->query($query);
              $data =$result->fetch();
              $fac =$data['faculte'];

              if ($req > 0)

              {?>
                <div class="mt-4"></div>
                <button class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-xls"></i> Exporter Excel</button><div class="mt-4">
                <h2 class="bg-secondary text-center text-white">LISTE DE COURS DE L'<?=$fac;?></h2>
                <table class="table table-striped  table-dark">
                  <thead>
                    <tr class="text-muted bg-dark">

                        <th scope="col">Enseignant <i>(Nombre de cours <?php echo $nbrEns?> )</i></th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Nationalité</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>

                  </tr>
                  </thead>

                  <tbody>
                        <?foreach($resultat as $enseignant)

                          {?>

                            <tr>
                              <td>

                               <?php echo $enseignant['noms']?>
                                <?php echo $enseignant['prenom']?><br>
                                (<?php echo $enseignant['categorie']?>)
                              </td>
                              <td>
                                <?php echo $enseignant['sexe']?>
                              </td>
                              <td>
                                <?php echo $enseignant['nationalite']?>
                              </td>
                              <td>
                                <?php echo $enseignant['tel']?>
                              </td>
                              <td>
                                <?php echo $enseignant['email']?>
                              </td>
                            </tr>

                        <?php   }
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
