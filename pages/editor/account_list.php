<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

 $name=isset($_POST['name'])?$_POST['name']:"";

  $requete="SELECT * FROM t_student
  LEFT JOIN t_comptstd ON t_comptstd.idstd=t_student.idstd
  WHERE t_student.name like '%$name%'";
  $resultat=$bdd->query($requete);

  ?>


<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
     <h3 class="text-muted">LISTE DE COMPTE ÉTUDIANT</h3> &nbsp;&nbsp;

  <hr clastudent

<div class="mt-4"></div>

</div>
</div>

<section>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-12 col-md8 ml-auto">
<div class="card-title">
        <!--------------------------------Form search------------------------------------------>
        <form action="dashboard.php.php?p=enseignant" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Entrez le nom et postnom">
                            </div>

                            <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0"> <i class="fas fa-search"></i> Rechercher</button>
                            </div>
                            </div>

                    </form>

    </div>





    <table class="table bg-light text-center">
      <thead>
        <tr class="text-muted bg-dark">

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

            foreach($resultat as $student)
            {
              ?>

              <td>

                <?php echo $student['name']?><br>
              </td>
              <td>
                <?php echo $student['prenom']?><br>
              </td>
              <td>
                <?php echo $student['email']?>
              </td>
              <td>
                <?php echo $student['role']?>
              </td>
              <td>
                <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=editens&id=<?php echo $student['idstd']?>">
                  <span class="fas fa-edit"></span>
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
</div>
</section>
