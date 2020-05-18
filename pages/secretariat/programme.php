
<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

 $name=isset($_POST['name'])?$_POST['name']:"";

    $size=isset($_GET['size'])?$_GET['size']:10;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

 $requete="SELECT * FROM t_enseignant WHERE noms like '%$name%'limit $size offset $offset";
    $requeteCount="select count(*) countE from t_enseignant
    where noms like '%$name%'";

    $resultat=$bdd->query($requete);
    $resultatCount=$bdd->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrEns=$tabCount['countE'];

    $reste=$nbrEns % $size; //opérateur modulo : le reste de la division includiene de $nbrFiliere par $size
    if($reste===0)
        $nbrpage=$nbrEns/$size;
    else
        $nbrpage=floor($nbrEns/$size)+1; //floor :  c'est la partie entière d'un nombre décimal

  ?>


  <!-----------------------------Start Modal Student--------------------------------------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="Enseignant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include ('../formModal/_formprogram.php');?>
  </div>
<!-----------------------------End of modal Cours--------------------------------------->

<!-----------------------------Start Modal UpdateCours--------------------------------------->
<!-- Button trigger modal -->

<div style="margin-left:20%;width:5000px"> 

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">LA LISTE DES ENSEIGNANTS</p>
       </div>
       <div class="col-md-4">
         <i class=" text-danger">(<?php echo $nbrEns?> Enseignants Trouvés)</i>&nbsp;&nbsp;
       <button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#Enseignant">
            <span class="fas fa-user-edit"></span>
                  Voir programme
              </button>
       </div>
     </div>
  
    <div class="jumbotron" id="div-id-name">
          <div class="card-title">
            <!--------------------------------Form search------------------------------------------>
            <form action="dashboard.php.php?p=enseignant" method="POST">
             <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Entrez le nom de l'enseignant">
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

          <th scope="col">Enseignant</th>
          <th scope="col">Sexe</th>
          <th scope="col">Nationalité</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>

 
      </tr>
      </thead>
     <tbody>
        <tr>
          <?php

            foreach($resultat as $enseignant)
            {
              ?>

              <tr>
                
                <td>
                <?php echo $enseignant['prenom']?><br>
                <?php echo $enseignant['noms']?><br>
                (<?php echo $enseignant['categorie']?>)
              </td>
              <td>
                <?php echo $enseignant['sexe']?>
              </td>
              <td>
                <?php echo $enseignant['nationalite']?>
              </td>
              <td>
                <?php echo $enseignant['typens']?>
              </td>
  
              <td>
                <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=prgm&id=<?php echo $enseignant['idEns']?>">
                  <span class="fas fa-edit"></span>
                  Programmer
                </a> &nbsp;
                
              </td>

              </tr>
        <?php
          }

          ?>
        </tr>
      </tbody>
    </table>
     <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>

                            <?php for($i=1;$i<=$nbrpage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active'?> page-item">
                               <a class="page-link" href="enseignant.php?page=<?php echo $i;?>&nom=<?php echo $enseignant['noms']?> ?>">
                                <?php echo $i;?>
                               </a>
                            </li>
                              <?php }?>
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
    </div>
  
</div>







