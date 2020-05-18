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
        <h5 class="modal-title" id="exampleModalLabel">AFFICHEZ LE COMPTE ENSEIGNANT <span class="fa fa-binoculars"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="dashboard.php?p=listcomptense" method="POST">
          <div class="modal-body">

                    <div class="form-group">
                      <input class="form-control" type="text" name="name" placeholder="Entrez le nom de l'enseignant">
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
       <h3>Compte Enseignant</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#student">
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



              $requete="SELECT * FROM t_comptens
              LEFT JOIN t_enseignant ON t_enseignant.idEns=t_comptens.idEns
              WHERE t_enseignant.noms like '%name%'";
              $resultat=$bdd->query($requete);

              $requeteCount="select count(*) countE from t_comptens";
              $resultatCount=$bdd->query($requeteCount);
              $tabCount=$resultatCount->fetch();
              $nbrEns=$tabCount['countE'];

              $resultat=$bdd->query($query);
              $req=$resultat->rowCount();

              if ($req > 0)

              {?>

                <div class="mt-4"></div>
                <button class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-xls"></i> Exporter Excel</button><div class="mt-4">
                  <h5 class="p-3 mb-2 bg-dark text-white text-center">COMPTE ENSEIGNANT <i>(Nombre de compte trouvé <?php echo $nbrEns?> )</i> </h5>

                <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                  <th scope="col">Nom & Postnom</th>
                                  <th scope="col">Prénom</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Rôle de l'utilisateur</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <?php

                                    foreach($resultat as $enseignant)
                                    {
                                      ?>

                                      <td>

                                        <?php echo $enseignant['noms']?><br>
                                      </td>
                                      <td>
                                        <?php echo $enseignant['prenom']?><br>
                                      </td>
                                      <td>
                                        <?php echo $enseignant['email']?>
                                      </td>
                                      <td>
                                        <?php echo $enseignant['role']?>
                                      </td>
                                      <td>
                                        <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=editens&id=<?php echo $enseignant['idEns']?>">
                                          <span class="fas fa-edit"></span>
                                        </a> &nbsp;
                                        <a class="btn btn-sm btn-outline-danger" href="dashboard.php?p=deletens&id=<?php echo $enseignant['idEns']?>">
                                          <span class="fas fa-trash"></span>
                                        </a> &nbsp;

                                      </td>
                                <?php
                                  }

                                  ?>
                                </tr>
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
