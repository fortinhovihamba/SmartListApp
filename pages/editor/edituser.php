<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$query = "SELECT * FROM t_users WHERE iduser='$id'";
$resultats=$bdd->query($query);
$data = $resultats->fetch();
$name =$data['name'];
$prenom =$data['prenom'];
$sexe =$data['sexe'];
$tel =$data['tel'];
$adress =$data['adress'];
$email =$data['email'];
$role =$data['role'];
$date =$data['date_at'];
$date_update =$data['date_update'];

?>



<div style="margin-left:15%;width:5000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">MODIFIER L'UTILISATEUR </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form method="POST" action="../../app/updatuser_ed.php">
        <div class="form-group ">
          <input type="hidden" class="form-control" name="id" value="<?=$id;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label >Nom & Postnom</label>
            <input type="text" class="form-control" name="name" value="<?=$name;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
          </div>
          <div class="form-group col-md-6">
            <label >Prenom</label>
            <input type="text" class="form-control" name="prenom" value="<?=$prenom;?>" placeholder="Entrez le prénom" autocomplete="off" required >
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-4">
            <label >Sexe</label>
            <select name="sexe"  class="form-control">
              <option value="<?=$sexe;?>" selected><?=$sexe;?> </option>
              <option value="M">Masculin</option>
              <option value="F">Féminin</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label >Téléphone</label>
            <input type="text" class="form-control" name="tel"  value="<?=$tel;?>"placeholder="Entrez le numéro téléphone" autocomplete="off" required >
          </div>
          <div class="form-group col-md-4">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?=$email;?>" placeholder="Entrez l'adresse email" autocomplete="off" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label>Adresse</label>
            <input type="text" class="form-control" name="adresse" value="<?=$adress;?>" placeholder="Entrez l'adresse physique'" autocomplete="off" required >
          </div>
          <div class="form-group col-md-4">
            <label >Rôle utilisateur</label>
            <select name="role" class="form-control">
              <option value="<?=$role?>"selected><?=$role?></option>
              <option value="admin">Administration</option>
              <option value="editeur">Éditeur</option>
              <option value="secretariat">Secretariat</option>
              <option value="superviseur">Superviseur</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%"><i class="fa fa-edit"></i> &nbsp;Modifier</button>

      </form>
    </div>
  </div>
