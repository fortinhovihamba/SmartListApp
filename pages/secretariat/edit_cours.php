<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$query = "SELECT * FROM t_cours
          LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
          LEFT JOIN t_promotion ON t_promotion.idpromo=t_cours.idpromo
          WHERE  idcours='$id'";
$resultat=$bdd->query($query);

$data = $resultat->fetch();
$cours =$data['cours'];
$volume =$data['volHor'];

?>



<div style="margin-left:15%;width:5000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">METTRE A JOUR LECOURS </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form method="POST" action="../../app/update_cours.php">
        <div class="form-group ">
          <input type="hidden" class="form-control" name="id" value="<?=$id;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
        </div>

          <div class="form-group ">
            <label >COURS</label>
            <input type="text" class="form-control" name="cours" value="<?=$cours;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
          </div>
          <div class="form-group ">
            <label >Volume Horaire</label>
            <input type="text" class="form-control" name="vol" value="<?=$volume;?>" placeholder="Entrez le prénom" autocomplete="off" required >
          </div>
      

        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%"><i class="fa fa-edit"></i> &nbsp;Modifier</button>

      </form>
    </div>
  </div>
