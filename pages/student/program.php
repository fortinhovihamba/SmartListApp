<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');


  $requete="SELECT *
          FROM t_inscription

              LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
              LEFT JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
              LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
              WHERE
               t_student.idstd='$id'
             ORDER BY t_inscription.idinscrit asc ";
  $resultat=$bdd->query($requete);

  $y =date('Y')-1;
  $d= date('Y') ;
  ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">LANCER LA RECHERCHE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="dashboard.php?p=program" method="POST">
      <div class="modal-body">
        <div class="form-group ">
          <input type="text" class="form-control" name="annee" placeholder="Entrez l'année académique" autocomplete="off">
        </div>
      <div class="form-group ">
        <select name="promo" class="form-control">
            <option selected>Entrez la promotion</option>
            <?php

            foreach($resultat as $promo)
            {?>
              <option value="<?php echo $promo['idpromo']?>"> <?php echo $promo['slug_promo']?> <?php echo $promo['faculte']?> <?php echo $promo['_option']?>.</option>
         <?php
             }
            ?>


        </select>
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
                  WHERE
                  	t_promotion.idpromo='$promo' AND
                      t_program.annee='$annee'";
      $resultat = $bdd->query($sql);

      ?>
      <div class="container">
        <button class="btn btn-outline-success my-2 my-sm-0" style="margin-left:80%">
          <i class="fas fa-print"></i>&nbsp;PDF
        </button>
        <div class="mt-4"></div>
        <div class="jumbotron">
          <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
                      <thead>
                          <tr class="bg-dark text-white">
                            <th scope="col">ENSEIGNANT</th>
                              <th scope="col">COURS</th>
                              <th scope="col">VOULUME</th>
                              <th scope="col">DÉBUT</th>
                              <th scope="col">FIN</th>
                              <th scope="col">PROCESSUS</th>
                              <th scope="col">ACTION</th>

                          </tr>
                      </thead class="table-hover">
                      <tbody>

                          <?php
                              foreach($resultat as $row)
                              {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $row['noms']?><br>
                                    <i>(  <?php echo $row['categorie']?>)</i>
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
                                        <button class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
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
