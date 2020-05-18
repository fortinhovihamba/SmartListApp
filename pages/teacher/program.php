<?php
require_once('../../app/cnx.php');

  $y =date('Y')-1;
  $d= date('Y') ;
  ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">LANCER LA RECHERCHE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="dashboard.php?p=program" method="POST">
      <div class="modal-body">
          <input type="hidden" name="idEns" value="<?=$id;?>" class="form-control" required autocomplete="off">
        <div class="form-group ">
          <input type="text" class="form-control" name="annee" placeholder="Entrez l'année académique" autocomplete="off">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Cancel</button>
        <button type="submit" name="ok" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-search"></i>&nbsp;Reseach</button>
      </div>
  </form>
</div>
    </div>
  </div>

<div class="container" style="margin-top:50px">
<h1 class="text-center text-info">Programme Académique <?=$y?>-<?=$d?><br>

  <button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
    Afficher
  </button>
</h1>
<br><br><hr>
</div>
<?php

  if(isset($_POST['ok']))
  {
    extract($_POST);
      $sql = " SELECT *
              	FROM t_program
              		LEFT JOIN t_promotion ON t_promotion.idpromo=t_program.idpromo
                      LEFT JOIN t_enseignant ON t_enseignant.idEns=t_program.idEns
                      LEFT JOIN t_cours ON t_cours.idcours=t_program.idcours
                      LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
                  WHERE
                  	t_enseignant.idEns='$idEns' AND
                      t_program.annee='$annee'";
      $resultat = $bdd->query($sql);
      $result = $bdd->query($sql);
      $data = $result->fetch();
      $nom = $data['noms'];
      $prenom = $data['prenom'];
      $categorie = $data['categorie'];
      $type = $data['typens'];
      ?>
      <div class="container">
        <button class="btn btn-outline-success my-2 my-sm-0" style="margin-left:80%">
          <i class="fas fa-print"></i>&nbsp;PDF
        </button>
        <div class="mt-4"></div>

        <div class="jumbotron">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
                      <thead>
                        <tr class="bg-dark text-white">
                            <th scope="col">Enseingant</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Type</th>

                        </tr>
                      </thead>
                      <tbody>
                        <td><?=$nom?> <br> <?=$prenom?></td>
                        <td><?=$categorie?></td>
                        <td><?=$type?></td>
                      </tbody>
          </table>
        </div>
          <hr>
          <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
                      <thead>
                          <tr class="bg-dark text-white">
                              <th scope="col">PROMOTION</th>
                              <th scope="col">COURS</th>
                              <th scope="col">VOULUME</th>
                              <th scope="col">DÉBUT</th>
                              <th scope="col">FIN</th>
                              <th scope="col">PROCESSUS</th>
                              <th scope="col">ACTION</th>

                          </tr>
                      </thead>
                      <tbody>

                          <?php
                              foreach($resultat as $row)
                              {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $row['slug_promo']?>
                                    <?php echo $row['faculte']?>
                                    <?php echo $row['_option']?>
                                  </td>
                                  <td>
                                    <?php echo $row['cours']?>
                                  </td>
                                  <td>
                                    <?php echo $row['volHor']?>
                                  </td>
                                  <td>
                                    <?php echo $row['debut']?>
                                  </td>
                                  <td>
                                    <?php echo $row['fin']?>
                                  </td>
                                  <td>
                                    <?php echo $row['processus']?>
                                  </td>
                                  <td>
                                      <a href="dashboard.php?p=detail&id=<?php echo $row['idpgrm'];?>">
                                        <button class="btn btn-outline-info my-2 my-sm-0"><i class="fas fa-edit"></i></button></a>
                                  </td>
                              </tr>
                                <?php
                              }

                          ?>

                      </tbody>
          </table>
        </div>
      </div>
      </div>
  <?php
  }

?>
