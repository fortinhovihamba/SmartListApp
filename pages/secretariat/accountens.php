<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$sql ="SELECT * FROM t_enseignant WHERE idEns=$id";
$resultat= $bdd->query($sql);
$data=$resultat->fetch();

$name=$data['noms'];
$prenom=$data['prenom'];
$categorie=$data['categorie'];
$email=$data['email'];

?> 

<div style="margin-left:20%;width:3000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">PROGRAMME ACADEMIQUE DE L'ANNÉE </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form action="../../app/comptens.php" method="POST">
            <div class="form-group ">

                <input type="hidden" class="form-control" autocomplete="off" value="<?=$id;?>" required="required"  name="idEns" >
            </div>
            <div class="form-group">
                <label>Noms & Postnom </label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$name;?>" name="annee" placeholder="Entrez l'année académique'">
            </div>
            <div class="form-group">
                <label>Prénom </label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$prenom;?>" name="annee" placeholder="Entrez l'année académique'">
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$categorie;?>" name="annee" placeholder="Entrez l'année académique'">
            </div>
            <div class="form-group ">
                <label>Rôle </label>
                <select class="form-control" name="role">
                  <option value="enseignant" selected>Enseignant</option>
                </select>
            </div>
            <div class="form-group ">
                <label>Téléphone </label>
                <input type="text" class="form-control" autocomplete="off"  required="required" autofocus name="tel" placeholder="+243 000000000">
            </div>
            <div class="form-group ">
                <label>Email </label>
                <input type="email" class="form-control" autocomplete="off"  required="required" autofocus name="email" placeholder="contact@exemple.com">
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
