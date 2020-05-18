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
        <form action="dashboard.php?p=resultat" method="POST">
      <div class="modal-body">
          <input type="hidden" name="idStd" value="<?=$id;?>" class="form-control" required autocomplete="off">
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

    <div class="form-group ">
    <select name="examen" class="form-control">
        <option selected>Entrez l'examen</option>
        <option value="Mi-session">Mi-session</option>
        <option value="Session">Sesion ordinaire</option>
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
</div>
<div class="container" style="margin-top:50px">
<h1 class="text-center text-info">Voir le résultat

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
      $echec="echec";
      $manque="manque cote";

        if($examen=="Session")
        {
          $sql = "SELECT *
                      FROM t_cote
                        INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                        INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                        INNER JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
                        INNER JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
                        INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                  WHERE
                    t_student.idstd='$idStd'
                    AND t_promotion.idpromo='$promo'
                    ORDER BY t_cours.idcours asc";
                    /*
                    *Nous récuperons le nombre d'échec
                    */
                       $selectCountEchec="SELECT count(*) countE
                                          FROM t_cote
                                          INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                                          INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                                          INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                                        WHERE
                                        t_student.idstd='$idStd'
                                        AND t_cote.mention='$echec'
                                        ORDER BY t_cote.idcote asc";
                    $resultCoutEchec=$bdd->query($selectCountEchec);
                    $tabCount=$resultCoutEchec->fetch();
                    $nbrEchec=$tabCount['countE'];


                  /*Nous récuperons le nombre manque de cote
              */
                       $selectCountM="SELECT count(*) countCM
                                          FROM t_cote
                                           INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                                           INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                                           INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                                        WHERE
                                        t_student.idstd='$idStd'
                                        AND t_cote.mention='$manque'
                                        ORDER BY t_cote.idcote asc";


        }
        else{
          $sql = "SELECT *
                      FROM t_cote
                        INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                        INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                        INNER JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
                        INNER JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
                        INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                  WHERE
                    t_student.idstd='$idStd'
                    AND t_cote.examen='$examen'
                    AND t_promotion.idpromo='$promo'
                    ORDER BY t_cours.idcours asc";
                    /*
                    *Nous récuperons le nombre d'échec
                    */
                       $selectCountEchec="SELECT count(*) countE
                                          FROM t_cote
                                          INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                                          INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                                          INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                                        WHERE
                                        t_student.idstd='$idStd'
                                        AND t_cote.examen='$examen'
                                        AND t_cote.mention='$echec'
                                        ORDER BY t_cote.idcote asc";



                  /*Nous récuperons le nombre manque de cote
              */
                       $selectCountM="SELECT count(*) countCM
                                          FROM t_cote
                                           INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                                           INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                                           INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                                        WHERE
                                        t_student.idstd='$idStd'
                                        AND t_cote.examen='$examen'
                                        AND t_cote.mention='$manque'
                                        ORDER BY t_cote.idcote asc";

        }


      $resultat = $bdd->query($sql);
      $reqFac =$bdd->query($sql);

      $resultCoutM=$bdd->query($selectCountM);
      $tabCount=$resultCoutM->fetch();
      $nbrM=$tabCount['countCM'];

      $resultCoutEchec=$bdd->query($selectCountEchec);
      $tabCount=$resultCoutEchec->fetch();
      $nbrEchec=$tabCount['countE'];

      $fac = $reqFac->fetch();
      $faculte=$fac['faculte'];
      $option=$fac['_option'];
      $promo=$fac['slug_promo'];
      $annee=$fac['annee'];

      $tot1=0;
      $tot2=0;
      $moyen=0;
      $m=0;
      $pourcentage=0;



?>
<div class="container">
<button class="btn btn-outline-success my-2 my-sm-0" style="margin-left:80%">
<i class="fas fa-print"></i>&nbsp;PDF
</button>
<div class="mt-4"></div>

  <h5 class="p-3 mb-2 bg-dark text-white text-center">RESULTAT POUR L'ANNÉE ACADEMIQUE <?=$annee; ?>  </h5>
  <div class="jumbotron" id="div-id-name">

    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
          <thead>
                    <tr class="bg-dark text-white">
                          <th scope="col">NOM & POSTNOM</th>
                          <th scope="col">PROMOTION</th>
                          <th scope="col">EXAMEN</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td><?=$user?> </td>
                          <td><?=$promo?> <?=$faculte?> <?=$option?></td>
                          <td><?=$examen?></td>
                      </tr>
                  </tbody>
                  </table>
  </div>
  <hr>

      <table class="table table-bordered">
                  <thead class="table-dark">
                      <tr>
                          <th scope="col">MATIÈRES</th>
                          <th scope="col">COTATIONS</th>
                          <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr><?php


                      while($st=$resultat->fetch()){

                                      $tot1= $tot1 + $st['point_obt'] ;
                                      $tot2= $tot2 + $st['max'] ;
                                      $m = $tot1/$tot2;
                                      $moyen =$m*20;
                                      $pourcentage= ($tot1*100)/$tot2;
                                  ?>
                                  <tr>
                                  <td><?php echo $st['cours']?></td>
                                  <td><?php echo $st['point_obt']?>/<?php echo $st['max']?></td>
                                  <td>
                                    <?php
                                    if($st['mention']=="echec")
                                    {?>
                                      <button class="btn btn-danger"><?php echo $st['mention']?></buton>
                                    <?php }
                                    elseif($st['mention']=="manque cote")
                                    {?>
                                      <button class="btn btn-warning" disabled><?php echo $st['mention']?></buton>
                                    <?php }

                                    else{
                                      echo $st['mention'];
                                    }?>

                                  </td>
                                  </tr>
                                  <?php }?>
                      </tr>
                  </tbody>

                  </table>
                  <?php
                    $format_moyen = number_format($moyen, 2);
                    $format = number_format($pourcentage, 2);
                  ?>

                  <h6 class="text-right text-danger">NOMBRE D'ÉCHEC : <?=$nbrEchec;?> </h6>
                  <h6 class="text-right text-info">MANQUE DE COTE : <?=$nbrM;?></h6>
                  <div class="mt-4"></div>
                  <h6 class="text-right">TOTAL DE COURS : <?=$tot1;?> / <?=$tot2;?></h6>
                  <h6 class="text-right" style="background-color:yellow;color:red;font-weight:bold">POURCENTAGE : <?php echo $format ;?> %</h6>
                  <?php
                  if($examen=="Session")
                  {
                    if($nbrEchec == 0  && $nbrM == 0 )
                    {
                      if($format >= 50)
                      {?>
                          <h6 class="text-right">MENTION :SATISFAIT</h6>
                      <?php
                      }
                      elseif($format >= 70)
                      {?>
                          <h6 class="text-right">MENTION :DISTINCTION</h6>
                      <?php
                      }
                      elseif($format >= 80)
                      {?>
                          <h6 class="text-right">MENTION :GRANDE DISTINCTION</h6>
                      <?php
                      }
                    }
                    else
                    {?>
                        <h6 class="text-right">MENTION : ASSIMILÉ AUX AJOURNÉES</h6>
                    <?php
                    }
                  }
                  ?>
  </div>

</div>






<?php
}
?>
