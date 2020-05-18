<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');


$promtion = "SELECT * FROM t_promotion,t_faculte
WHERE t_faculte.idfac=t_promotion.idfac";
$Rec =$bdd->query($promtion);
  ?>


<!-----------------------------Start Modal Requette--------------------------------------->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">AFFICHEZ LE PROGRAMME <span class="fa fa-binoculars"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admin_std.php?p=pgrm_std" method="POST">
          <div class="modal-body">
                      <input type="hidden" name="idStd" value="<?php print $id;?>">
                      <div class="form-group">
                        <input type="text" name="annee" class="form-control" autofocus autocomplete="off" required placeholder="Entrez une Année académique">
                      </div>
                      <div class="form-group">
                      <select name="promo" autocomplete="off" required="required" class="form-control">
                      <option selected>Choississez une promotion</option>
                      <?php  foreach($Rec as $promotion) {?>
                       <option value="<?php echo $promotion['idpromo'];?>"><?php echo $promotion['slug'];?>  &nbsp;&nbsp; <?php echo $promotion['faculte'];?>&nbsp;&nbsp; <?php echo $promotion['nom_option'];?></option>
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
<!-----------------------------End of modal student--------------- ------------------------>



<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
       <h3>Affichez Programme de Cours</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#student">
                    <span class="fa fa-binoculars"></span>
                    Afficher
            </button>
  <hr class="my-4">


</div>
</div>

<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');

    if(isset($_POST['ok'])){

      extract($_POST);

      $sql="SELECT * FROM t_promotion
      LEFT JOIN t_faculte ON t_promotion.idfac=t_faculte.idfac
      LEFT JOIN t_program ON t_promotion.idpromo=t_program.idpromo
      WHERE t_program.annee='$annee' AND t_promotion.idpromo='$promo'";
      $resultat = $bdd->query($sql);
      $data =$resultat->fetch();

      $promotion =$data['slug'];
      $option =$data['nom_option'];
      $annee =$data['annee'];

      $req=$resultat->rowCount();;
0;
      if ($req > 0) {
     ?>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-12 col-md8 ml-auto">
          <table class="table table-bordered">
            <thead class="table-light text-muted">
              <tr>
                  <th scope="col">ANNÉE ACADÉMIQUE</th>
                  <th scope="col">PROMOTION</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=$annee?></td>
                    <td><?=$promotion?> <?=$option?></td>

                </tr>
            </tbody>
          </table>
          <table class="table table-bordered text-justify">
            <thead class="table-light text-muted">
              <th scope="col">
                  SEMESTRE
              </th>
              <th scope="col">
                  COURS
              </th>
              <th scope="col">
                  ENSEIGNANTS
              </th>
              <th scope="col">
                  DÉBUT
              </th>
              <th scope="col">
                  FIN
              </th>
              <th scope="col">
                  PROCESSUSS
              </th>
              </tr>
            </thead>
            <tbody>
              <?php
               $requete="SELECT * FROM t_program
               LEFT JOIN t_promotion ON t_promotion.idpromo=t_program.idpromo
               LEFT JOIN t_cours ON t_cours.idcours=t_program.idcours
               LEFT JOIN t_enseignant ON t_enseignant.idEns=t_program.idEns
               LEFT JOIN t_caTEns ON t_caTEns.idCatEns=t_enseignant.idCatEns
               WHERE t_program.annee='$annee' AND t_promotion.idpromo='$promo'
               ORDER BY t_program.idpgrm asc";

               $res = $bdd->query($requete);
                while($Program=$res->fetch()){?>
                  <tr>
                      <td><?php echo $Program['semestre']?></td>
                      <td><?php echo $Program['cours']?></td>
                      <td><?php echo $Program['noms']?><br>
                        <?php echo $Program['prenom']?><br>
                        (<?php echo $Program['categorie']?>)
                      </td>
                      <td><?php echo $Program['debut']?></td>
                      <td><?php echo $Program['fin']?></td>
                      <td><?php echo $Program['processus']?></td>
                      </tr>
              <?php }?>
             </tbody>
          </table>
      </div>
    <?php }

 else{
    $flash="<div class='erreur'><strong>Erreur</strong> : Il y a pas d'information sur ta requete : Veuillez vérifier tes informations!</div>";

    ?>
     <div class="alert alert-danger " role="alert">
     <?php echo $flash;?>
     </div>

    <?php }?>
 <?php }?>
    </div>
  </div>
</section>
