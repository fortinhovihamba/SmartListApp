<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');

$d=isset($_GET['d'])?$_GET['d']:0;

$name=isset($_POST['name'])?$_POST['name']:"";

$query = "SELECT * FROM t_users WHERE name like '%$name%'";
$resultats=$bdd->query($query);
?>

  <!-----------------------------Start Modal Cote--------------------------------------->
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php include ('../formModal/_formModalUser.php')?>
</div>
<!-----------------------------End of modal student--------------------------------------->
<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
     <h3>Les Utilisateurs</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
                  <span class="fas fa-user-edit"></span>
                  Ajouter
          </button>


<hr class="my-4">


</div>
</div>
<?php 
    if($d == 1)
    {
      ?>
      <div class="alert alert-danger" style="width: 100%">Suppression avec succès</div>
  <?php
    }elseif ($d == 2) { ?>

      <div class="alert alert-success" style="width: 100%">Modification avec succès</div>

    <?php
    }elseif ($d == 3) { ?>

      <div class="alert alert-danger" style="width: 100%">Echec de modification : L'ancien mot de passe n'est pas trouvé </div>

    <?php
    }
    elseif ($d == 4) { ?>

      <div class="alert alert-danger" style="width: 100%">Echec de modification : Veuillez réessayer le mot de passe les deux mots de passe ne sont pas correct </div>

    <?php
    }
?>


<section>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-12 col-md8 ml-auto">
<div class="card-title">
        <!--------------------------------Form search------------------------------------------>
        <form action="dashboard.php?p=users" method="POST">
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
      $f = sha1("admin");
    echo $f;?>
    <table class="table table-striped  table-dark">
      <thead>
        <tr>
          
          <th scope="col">Noms</th>
          <th scope="col">Prénoms</th>
          <th scope="col">Sexe</th>
          <th scope="col">Phone</th>
          <th scope="col">Rôle utilisateur</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultats as $data){

        ?>
        <tr>
            
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['prenom']?></td>
            <td><?php echo $data['sexe']?></td>
            <td><?php echo $data['tel']?></td>
            <td><?php echo $data['role']?></td>
            <td>
              <a class="btn btn-sm btn-outline-warning" href="dashboard.php?p=detailuser&id=<?php echo $data['iduser']?>"><i class="fa fa-eye"></i></a>
            </td>

        </tr>
        <?php
            }
        ?>
      </tbody>
            </table>
    </div>
</div>
</div>
</section>
