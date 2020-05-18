
<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

$id=isset($_GET['id'])?$_GET['id']:0;
  
      $echec="echec";
      $manque="manque cote";

    $requete="SELECT * FROM t_cote
    LEFT JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
    LEFT JOIN t_cours ON t_cours.idcours=t_cote.idcours
    LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
    INNER JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
    LEFT JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
    WHERE t_inscription.idinscrit='$id'
    ORDER BY t_cote.idcote asc
   ";
      $selectCountEchec="SELECT count(*) countE
                                          FROM t_cote
                                          INNER JOIN t_inscription ON t_inscription.idinscrit=t_cote.idinscrit
                                          INNER JOIN t_cours ON t_cours.idcours=t_cote.idcours
                                          INNER JOIN t_student ON t_student.idstd=t_inscription.idstd
                                        WHERE
                                        t_inscription.idinscrit='$id'
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
                                        t_inscription.idinscrit='$id'
                                        AND t_cote.mention='$manque'
                                       
                                        ORDER BY t_cote.idcote asc";


  $resultat=$bdd->query($requete);
  
  $resultCoutM=$bdd->query($selectCountM);
  $tabCount=$resultCoutM->fetch();
  $nbrM=$tabCount['countCM'];

  $resultCoutEchec=$bdd->query($selectCountEchec);
  $tabCount=$resultCoutEchec->fetch();
  $nbrEchec=$tabCount['countE'];

  $req = $bdd->query($requete);
  $data = $req->fetch();


  $promotion = $data['promotion'];
  $faculte = $data['faculte'];
  $option = $data['_option'];
  $name = $data['name'];
    $tot1=0;
    $tot2=0;
    $moyen=0;
    $m=0;
    $pourcentage=0;

?>
 

  <!-----------------------------Start Modal Student--------------------------------------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="Enseignant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include ('../formModal/_formRapportInscrit.php');?>
  </div>
<!-----------------------------End of modal Cours--------------------------------------->

<!-----------------------------Start Modal UpdateCours--------------------------------------->
<!-- Button trigger modal -->

<div style="margin-left:20%;width:5000px"> 

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">COTE DE L'ÉTUDIANT(E) <span class="text-warning" style="text-transform: uppercase;"> <?php echo $name;?> </span> </p>
       </div>

     </div>
    <div class="jumbotron" id="div-id-name">
      <div>
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">NOM & POSTNOM</th>
              <th scope="col">PROMOTION</th>
             </tr>
             </thead>
            <tbody>
            <tr>
              <td><?=$name?> </td>
              <td><?=$promotion?> <?=$faculte?> <?=$option?></td>
                          
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  <div class="jumbotron" id="div-id-name">
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">MATIÈRES</th>
          <th scope="col">EXAMEN</th>
          <th scope="col"></th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php 

           while($st=$resultat->fetch())
           {
            $tot1= $tot1 + $st['point_obt'] ;
            $tot2= $tot2 + $st['max'] ;
            $m = $tot1/$tot2;
            $moyen =$m*20;
            $pourcentage= ($tot1*100)/$tot2;
            ?>
            <tr>
              <td><?php echo $st['cours']?></td>
              <td class="text-center"><?php echo $st['point_obt']?>/<?php echo $st['max']?></td>
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
              <td class="text-center"><a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=editstd&id=<?php echo $st['idcote']?>?>">
                  <span class="fas fa-edit"></span>
                </a></td>
            </tr>
           <?php 
           }
        ?>
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
                  
                  ?>
  </div>
</div>







