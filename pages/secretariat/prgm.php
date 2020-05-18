<?php

//connexion à la base de donnée
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;
$sql ="SELECT * FROM t_enseignant 
LEFT JOIN t_faculte ON t_faculte.idfac=t_enseignant.idfac
WHERE idEns=$id";
$resultat= $bdd->query($sql);
$data=$resultat->fetch();

$name=$data['noms'];
$prenom=$data['prenom'];
$categorie=$data['categorie'];
$faculte=$data['faculte'];
$idfac=$data['idfac'];
$option=$data['_option'];



$query = "SELECT * FROM t_cours
          LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
          LEFT JOIN t_promotion ON t_promotion.idpromo=t_cours.idpromo
          WHERE t_cours.idfac='$idfac'";
$result=$bdd->query($query);

$spromo ="SELECT * FROM t_promotion";
$reqpromo =$bdd->query($spromo);

$s ="SELECT * FROM t_faculte";
$fac =$bdd->query($s);

?>

<div style="margin-left:20%;width:3000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">PROGRAMME ACADEMIQUE DE L'ANNÉE </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form action="../../app/insertpgrm.php" method="POST">
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
            <div class="form-group">
                <label>Faculté  <span class="text-danger">*</span></label>
                <input type="text" class="form-control" autocomplete="off" required="required" disabled value="<?=$faculte;?> <?=$option;?>" name="fac" placeholder="Entrez l'année académique'">
            </div>
             <div class="form-group">
                <label>Cours <span class="text-danger">*</span></label>
                <select class="form-control" name="cours">
                  <option selected>Choisissezun cours</option>
                  <?php
                    foreach($result as $cour)
                    {?>
                      <option value="<?php echo $cour['idcours']?>"><?php echo $cour['cours']?></option>
                  <?php

                    }
                  ?>
                </select>
            </div>
            <div class="form-group ">
                <label>Année Académiqaue<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="annee" placeholder="Entrez l'année académique'">
            </div>
           
            
                <div class="form-group">
                <label>Promotion <span class="text-danger">*</span></label>
                <select class="form-control" name="promo">
                  <option selected>Choisissez une Promotion</option>
                  <?php
                    foreach($reqpromo as $promo)
                    {?>
                      <option value="<?php echo $promo['idpromo']?>"><?php echo $promo['slug_promo']?></option>
                  <?php

                    }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label>Début de Cours <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" autocomplete="off" required="required" autofocus name="debut">
            </div>
            <div class="form-group">
                <label>Fin du Cours <span class="text-danger">*</span></label>
                <input type="date" class="form-control" autocomplete="off" required="required" autofocus name="fin">
            </div>

            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%">Enregistrer</button>
      </form>
    </div>
  </div>
</div>
