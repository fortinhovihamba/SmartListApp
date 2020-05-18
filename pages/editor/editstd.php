<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$query = "SELECT * FROM t_student WHERE idstd='$id'";
$resultats=$bdd->query($query);
$data = $resultats->fetch();
$name =$data['name'];
$prenom =$data['prenom'];
$sexe =$data['sexe'];
$adress =$data['adresse'];
$nationalite =$data['nationalite'];


?>



<div style="margin-left:15%;width:5000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">MODIFIER L'ÉTUDIANT(E) <?php echo $name;?> <i class="fa fa-user"></i></h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form method="POST" action="../../app/updatuser_ed.php">
        <div class="form-group ">
          <input type="hidden" class="form-control" name="id" value="<?=$id;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
        </div>

          <div class="form-group ">
            <label >Nom & Postnom</label>
            <input type="text" class="form-control" name="name" value="<?=$name;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
          </div>
          <div class="form-group ">
            <label >Prenom</label>
            <input type="text" class="form-control" name="prenom" value="<?=$prenom;?>" placeholder="Entrez le prénom" autocomplete="off" required >
          </div>


          <div class="form-group">
            <label >Sexe</label>
            <select name="sexe"  class="form-control">
              <option value="<?=$sexe;?>" selected><?=$sexe;?> </option>
              <option value="M">Masculin</option>
              <option value="F">Féminin</option>
            </select>
          </div>
          <div class="form-group ">
            <label >Adresse physique</label>
            <input type="text" class="form-control" name="adresse" value="<?=$adress?>" placeholder="Entrez le prénom" autocomplete="off" required >
          </div>
          <div class="form-group ">
            <label >Nationalite</label>
            <input type="text" class="form-control" name="nation" value="<?=$nationalite;?>" placeholder="Entrez le prénom" autocomplete="off" required >
          </div>
        

        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%"><i class="fa fa-edit"></i> &nbsp;Modifier</button>

      </form>
    </div>
  </div>
