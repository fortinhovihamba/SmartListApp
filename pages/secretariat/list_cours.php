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
      <form action="dashboard.php?p=list_cours" method="POST">
          <div class="modal-body">

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
       <h3>Liste des cours</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#student">
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



              $query = "SELECT * FROM t_cours
                        LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
                        LEFT JOIN t_promotion ON t_promotion.idpromo=t_cours.idpromo
                        WHERE t_faculte.idfac='$fac' AND t_promotion.idpromo=$idpromo";

              $requeteCount="select count(*) countC from t_cours";
              $resultatCount=$bdd->query($requeteCount);
              $tabCount=$resultatCount->fetch();
              $nbrEns=$tabCount['countC'];

              $resultat=$bdd->query($query);
              $req=$resultat->rowCount();
              $result=$bdd->query($query);
              $data =$result->fetch();
              $fac =$data['faculte'];
              $promotion =$data['promotion'];

              if ($req > 0)

              {?>

                <div class="mt-4"></div>
                <button class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-xls"></i> Exporter Excel</button><div class="mt-4">
                <h2 class="bg-secondary text-center text-white">LISTE DE COURS <?=$promotion;?> <?=$fac;?></h2>
                <table class="table table-striped  table-dark">
                  <thead>
                    <tr class="text-muted bg-dark">

                      <th scope="col">Cours  <i>(Nombre de cours <?php echo $nbrEns?> )</i></th>
                      <th scope="col">Volume Horaire</th>
                      <th scope="col">Promotion</th>
                      <th scope="col">Faculté</th>

                  </tr>
                  </thead>

                  <tbody>
                        <?foreach($resultat as $cours)

                          {?>

                            <tr>
                              <td>
                                <?php echo $cours['cours']?>
                              </td>
                              <td>
                                <?php echo $cours['volHor']?>
                              </td>
                              <td>
                                <?php echo $cours['slug_promo']?>
                              </td>
                              <td>
                                <?php echo $cours['faculte']?><br>
                                <?php echo $cours['_option']?>
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
