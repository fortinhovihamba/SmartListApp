<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');


  $promtion = "SELECT * FROM t_promotion";
  $Rec =$bdd->query($promtion);
  ?>


<!-----------------------------Start Modal Requette--------------------------------------->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">AFFICHEZ LE RÉSULTAT <span class="fa fa-binoculars"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admin_std.php?p=resultat" method="POST">
          <div class="modal-body">
                      <input type="hidden" name="idStd" value="<?php print $id;?>">
                    <div class="form-group">
                      <select name="idpromo" autocomplete="off" required="required" class="form-control">
                      <option selected>Choississez une promotion</option>
                          <?php  while($row=$Rec->fetch()) {?>
                           <option value="<?php echo $row['idpromo'];?>"><?php echo $row['slug'];?>  <?php echo $row['section'];?></option>
                                <?php }?>
                              </select></div>

                    <div class="form-group">
                      <select name="exam" class="form-control">
                        <option value="all" selected>Choississez un examen...</option>
                        <option value="Mi-session">Mi-Session..</option>
                        <option value="Session" >Session</option>
                        <option value="Deuxieme-session">Deuxième Session</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input name="annee" class="form-control" autocomplete="off" placeholder="Année Académique">
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
       <h3>Affichez Résultat</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#student">
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

        $requete="SELECT * FROM t_cote
        LEFT JOIN t_inscription ON t_inscription.id=t_cote.id
        LEFT JOIN t_cours ON t_cours.idcours=t_cote.idcours
        LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
        LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
        WHERE t_student.idstd='$idStd' AND t_promotion.idpromo='$idpromo'
        AND t_cote.exam='$exam'
        ORDER BY t_cours.idcours asc";

        $resultat=$bdd->query($requete);
        $data =$resultat->fetch();
        $promo =$data['slug'];
        $annee =$data['annee'];
        $section =$data['section'];
        $req=$resultat->rowCount();;
        $tot1=0;
        $tot2=0;
        $moyen=0;
        $m=0;
        $pourcentage=0;
        if ($req > 0) {?>

<section>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-12 col-md8 ml-auto">
    <i>Année Académique : <?=$annee;?></i><br>
    <i>Promotion : <?=$promo;?> <?=$section;?></i>
        <table class="table bg-light text-justify">
                  <thead>
                    <tr class="text-muted bg-dark">
                      <th scope="col">MATIÈRES</th>
                      <th scope="col">COTE</th>
                    </tr>
                  </thead>
                <tbody>
                <?php
                $requete="SELECT * FROM t_cote
                LEFT JOIN t_inscription ON t_inscription.id=t_cote.id
                LEFT JOIN t_cours ON t_cours.idcours=t_cote.idcours
                LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
                LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
                WHERE t_student.idstd='$idStd' AND t_promotion.idpromo='$idpromo'
                AND t_cote.exam='$exam'
                ORDER BY t_cours.idcours asc";
                $resultats=$bdd->query($requete);

                  while($st=$resultats->fetch()){
                  $tot1= $tot1 + $st['point_obt'] ;
                  $tot2= $tot2 + $st['sur'] ;
                  $m = $tot1/$tot2;
                  $moyen =$m*20;
                  $pourcentage= ($tot1*100)/$tot2;

                  ?>
                    <tr>

                                <td><?php echo $st['cours']?></td>
                                <td><?php echo $st['point_obt']?>/<?php echo $st['sur']?></td>

                                </tr>
                                <?php }?>
                </tbody>
                </table>
                <h6 class="text-right">TOTAL DE COURS : <?=$tot1;?> / <?=$tot2;?></h6>
                    <h6 class="text-right">MOYEN DE COURS : <?echo number_format($moyen, 2);?> /20</h6>
                    <h6 class="text-right" style="background-color:yellow;color:red;font-weight:bold">POURCENTAGE : <?echo number_format($pourcentage, 2);?> %</h6>

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
