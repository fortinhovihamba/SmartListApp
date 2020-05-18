<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

?>



<div style="margin-left:15%;width:5000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">CHANGER LE MOT DE PASSE </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form method="POST" action="../../app/updatpassUser.php">
        <div class="form-group ">
          <input type="hidden" class="form-control" name="id" value="<?=$id;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
        </div>
 		<div class="form-group">
            <label >Mot de passe actuel </label>
            <input type="password" class="form-control" name="pass1"  placeholder="Entrez l'ancien mot de passe" autocomplete="off" required >
          </div>
          <div class="form-group">
            <label >Mot de passe </label>
            <input type="password" class="form-control" name="pass2" placeholder="Entrez le nouveau mot de passe" autocomplete="off" required >
          </div>
          <div class="form-group ">
            <label >Confirmer mot de passe</label>
            <input type="password" class="form-control" name="pass3"  placeholder="Confirmer le mot de passe" autocomplete="off" required >
          </div>
  


        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%"><i class="fa fa-edit"></i> &nbsp;Modifier</button>

      </form>
    </div>
  </div>
