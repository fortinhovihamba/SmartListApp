<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');

$d=isset($_GET['d'])?$_GET['d']:0;

$name=isset($_POST['name'])?$_POST['name']:"";

$query = "SELECT * 
      FROM t_comptens 
        LEFT JOIN t_enseignant ON t_enseignant.idEns=t_comptens.idEns
        WHERE t_enseignant.noms like '%$name%'";
$resultats=$bdd->query($query);
?>




<div style="margin-left:15%;width:6000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">COMPTES ENSEIGNANTS </h5>
  <div class="jumbotron" id="div-id-name">
   <div class="card-title">
        <!--------------------------------Form search------------------------------------------>
        <form action="dashboard.php?p=comptens" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <input type="text" class="form-control"  autocomplete="off" name="name" placeholder="Tapez le mot clé">
                            </div>

                            <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0"> <i class="fas fa-search"></i> Rechercher</button>
                            </div>
                            </div>

                    </form>

    </div>
    <?php 

 if($d == 1)
    {
      ?>
      <div class="alert alert-danger" style="width: 90%;margin-left: 2%">Suppression avec succès</div>
  <?php
    }elseif ($d == 2) { ?>

      <div class="alert alert-success" style="width: 90%;margin-left: 2%">Modification avec succès</div>

    <?php
    }
    ?>
     <table class="table table-striped  table-dark">
      <thead>
        <tr>
          
          <th scope="col">Noms</th>
          <th scope="col">Prénoms</th>
          <th scope="col">Phone</th>
          <th scope="col">email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultats as $data){

        ?>
        <tr>
            
            <td><?php echo $data['noms']?></td>
            <td><?php echo $data['prenom']?></td>
            <td><?php echo $data['tel']?></td>
            <td><?php echo $data['email']?></td>
            <td>
              <a class="btn btn-sm btn-outline-warning" href="dashboard.php?p=detailcomptEns&id=<?php echo $data['idcomptens']?>"><i class="fa fa-eye"></i></a>
            </td>

        </tr>
        <?php
            }
        ?>
      </tbody>
            </table>
    </div>
  </div>
