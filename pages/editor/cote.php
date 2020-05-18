<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

 $name=isset($_POST['name'])?$_POST['name']:"";

  $requete="SELECT * FROM t_inscription
            LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
            LEFT JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
            LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
            WHERE t_student.name like '%$name%'";
  $resultat=$bdd->query($requete);



  ?>


  <!-----------------------------Start Modal Student--------------------------------------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="Enseignant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include ('../formModal/_formVoirCote.php');?>
  </div>
<!-----------------------------End of modal Cours--------------------------------------->

<!-----------------------------Start Modal UpdateCours--------------------------------------->
<!-- Button trigger modal -->

<div style="margin-left:20%;width:5000px"> 

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">ÉDITER LES COTES DES ÉTUDIANT</p>
       </div>

     </div>
  
    <div class="jumbotron" id="div-id-name">
          <div class="card-title">
            <!--------------------------------Form search------------------------------------------>
            <form action="dashboard.php.php?p=enseignant" method="POST">
             <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Entrez le nom de l'étudiant">
                </div>
                <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-outline-primary my-2 my-sm-0"> <i class="fas fa-search"></i> Rechercher</button>
                 </div>
              </div>

            </form>
        </div>

    </div>
    <div class="jumbotron" id="div-id-name">
       <table class="table bg-light text-center">
      <thead>
        <tr class="text-muted bg-dark table-striped">

          
           <th scope="col">Noms</th>
          <th scope="col">Prénom</th>
          <th scope="col">Sexe</th>
          <th scope="col">Promotion</th>
          <th scope="col">Action</th>


      </tr>
      </thead>
    <tbody>
        <tr>
          <?php

            foreach($resultat as $student)
            {
              ?>

              <td>
                <?php echo $student['name']?>
              </td>
              <td>
                <?php echo $student['prenom']?>
              </td>
              <td>
                <?php echo $student['sexe']?>
              </td>
              <td>
                <?php echo $student['slug_promo']?>
                <?php echo $student['faculte']?>
                <?php echo $student['_option']?>
              </td>

              <td>
                <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=editstd&id=<?php echo $student['idinscrit']?>">
                  <span class="fas fa-file"></span>
                  Coter
                </a> &nbsp;
                 <a class="btn btn-sm btn-outline-warning" href="dashboard.php?p=list_cote&id=<?php echo $student['idinscrit']?>">
                  <span class="fas fa-eye"></span>
                  Voir Coter
                </a> 


              </td>
        <?php
          }

          ?>
        </tr>
      </tbody>
    </table>
    </div>
  
</div>







