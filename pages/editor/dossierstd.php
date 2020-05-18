
<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

 $name=isset($_POST['name'])?$_POST['name']:"";

  $requete="SELECT * FROM t_student WHERE name like '%$name%'";
  $resultat=$bdd->query($requete);

  ?>
 

  <!-----------------------------Start Modal Student--------------------------------------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="Enseignant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include ('../formModal/_formStudent.php');?>
  </div>
<!-----------------------------End of modal Cours--------------------------------------->

<!-----------------------------Start Modal UpdateCours--------------------------------------->
<!-- Button trigger modal -->

<div style="margin-left:20%;width:5000px">  

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">DÉPÔT DE DOSSIER</p>
       </div>
       <div class="col-md-4">
       <button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#Enseignant">
            <span class="fas fa-user-edit"></span>
                  DOSSIER DÉPÔSÉS
              </button>
       </div>
     </div>
  
    <div class="jumbotron" id="div-id-name">
          <div class="card-title">
            <!--------------------------------Form search------------------------------------------>
            <form action="dashboard.php.php?p=student" method="POST">
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

          <th scope="col">#</th>
           <th scope="col">Noms</th>
          <th scope="col">Prénom</th>
          <th scope="col">Sexe</th>
          <th scope="col">Nationalité</th>
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
                <?php echo $student['idstd']?>
              </td>
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
                <?php echo $student['nationalite']?>
              </td>
  
              <td>
                <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=editstd&id=<?php echo $student['idstd']?>">
                  <span class="fas fa-edit"></span>
                </a> &nbsp;
                </a> &nbsp;
                <a class="btn btn-sm btn-outline-danger" href="dashboard.php?p=deletens&id=<?php echo $student['idstd']?>">
                  <span class="fas fa-trash"></span>
                </a> &nbsp;

              </td>
        <?php
          }

          ?>
        </tr>
      </tbody>
    </table>
    </div>
  
</div>







