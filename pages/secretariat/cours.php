 <?php
//connexion à la base de donnée
require_once('../../app/cnx.php');

$flash=isset($_GET['d'])?$_GET['d']:0;


$name=isset($_POST['name'])?$_POST['name']:"";

  $size=isset($_GET['size'])?$_GET['size']:10;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;

$query = "SELECT * 
            FROM t_cours
                LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
                LEFT JOIN t_promotion ON t_promotion.idpromo=t_cours.idpromo
            WHERE  cours like '%$name%'
              limit $size offset $offset";

$resultat=$bdd->query($query);

$sql ="SELECT * FROM t_faculte";
$req =$bdd->query($sql);

$spromo ="SELECT * FROM t_promotion"; 
$reqpromo =$bdd->query($spromo);
$requeteCount= "SELECT count(*) FROM t_cours
                LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
                LEFT JOIN t_promotion ON t_promotion.idpromo=t_cours.idpromo
            WHERE  cours like '%$name%'";

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
  <div class="modal fade" id="cours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include ('../formModal/_formModalCours.php');?>
  </div>
<!-----------------------------End of modal Cours--------------------------------------->

<!-----------------------------Start Modal UpdateCours--------------------------------------->
<!-- Button trigger modal -->

<div style="margin-left:20%;width:5000px"> 

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">LA LISTE DES COURS</p>
       </div>
       <div class="col-md-4">
       <button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#cours">
            <span class="fas fa-book"></span>
                  Ajouter
              </button>
       </div>
     </div>
  
    <div class="jumbotron" id="div-id-name">
          <div class="card-title">
            <!--------------------------------Form search------------------------------------------>
            <form action="dashboard.php?p=cours" method="POST">
             <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Tapez  un mot clé">
                </div>
                <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-outline-primary my-2 my-sm-0"> <i class="fas fa-search"></i> Rechercher</button>
                 </div>
              </div>

            </form>
        </div>

    </div>
    <?php 
    if($flash == 1)
    {
      ?>
      <div class="alert alert-success" style="width: 100%; margin-left: 4px;">Modification avec succès</div>
  <?php
    }
?>
    <div class="jumbotron" id="div-id-name">
       
      <table class="table table-striped  table-dark">
        <thead>
          <tr class="text-muted bg-dark">
            <th scope="col">Cours</th>
            <th scope="col">Volume Horaire</th>
            <th scope="col">Promotion</th>
            <th scope="col">Faculté</th>
            <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>

                    <?php
                      foreach($resultat as $cours){

                        ?>
                        <tr>
                        <td>
                          <?php echo $cours['cours']?>
                        </td>
                        <td>
                          <?php echo $cours['volHor']?>
                        </td>
                        <td>
                          <?php echo $cours['slug_promo']?>
                        </td>
                        <td>
                          <?php echo $cours['faculte']?><br>
                          <?php echo $cours['_option']?>
                        </td>
                        <td>
                          <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=edit_cours&id=<?php echo $cours['idcours']?>">
                            <span class="fas fa-edit"></span>
                          </a> &nbsp;
                          <a class="btn btn-sm btn-outline-warning" href="dashboard.php?p=detail_cours&id=<?php echo $cours['idcours']?>">
                            <span class="fas fa-eye"></span>
                          </a> &nbsp;
                          <a class="btn btn-sm btn-outline-danger" href="dashboard.php?p=delete_cours&id=<?php echo $cours['idcours']?>">
                            <span class="fas fa-trash"></span>
                          </a> &nbsp;

                        </td>
                        </tr>
                  <?php
                    }
                    ?>

                  </tbody>
    </table>


    </div>
  
</div>







