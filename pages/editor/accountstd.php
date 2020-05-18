<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$requete="SELECT * FROM t_student WHERE idstd='$id'";
$resultat=$bdd->query($requete);
$result=$bdd->query($requete);
$data = $result->fetch();

$noms = $data['name'];
$prenom = $data['prenom'];
$sexe = $data['sexe'];
$nation = $data['nationalite'];
$email = $data['email'];

?>

<div style="margin-left:20%;width:3000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-info text-white text-center">CRÉATION DE COMPTE ÉTUDIANT </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form action="../../app/comptstd.php" method="POST">
            <div class="form-group ">

                <input type="hidden" class="form-control" autocomplete="off" value="<?=$id;?>" required="required"  name="idstd" >
            </div>
            <div class="form-group">
                <label>Noms & Postnom </label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$noms;?>">
            </div>
            <div class="form-group">
                <label>Prénom </label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$prenom;?>">
            </div>

            <div class="form-group">
                <label>Sexe</label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$sexe;?>" >
            </div>
            <div class="form-group">
                <label>Nationalité</label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$nation;?>" >
            </div>
            <div class="form-group ">
                <label>Rôle </label>
                <select class="form-control" name="role">
                  <option value="etudiant" selected>Étudiant</option>
                </select>
            </div>
            <div class="form-group ">
                <label>Téléphone </label>
                <input type="text" class="form-control" autocomplete="off"  required="required" autofocus name="email" placeholder="+243 000000000">
            </div>
            <div class="form-group ">
                <label>Email </label>
                <input type="email" class="form-control" autocomplete="off"  required="required" autofocus name="email" placeholder="Entrez l'adresse email">
            </div>

            <div class="form-group ">
                <label>Mot de passe </label>
                <input type="password" class="form-control" autocomplete="off"  required="required" autofocus name="pass"placeholder="Entrez le mot de passe">
            </div>

            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%">Enregistrer</button>
      </form>
    </div>
  </div>
</div>
