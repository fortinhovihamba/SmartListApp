<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$sql = "SELECT * FROM t_enseignant
LEFT JOIN t_faculte ON t_faculte.idfac=t_enseignant.idfac
WHERE t_enseignant.idEns='$id'";
$result=$bdd->query($sql);
$data = $result->fetch();

$noms = $data['noms'];
$prenom = $data['prenom'];
$categorie = $data['categorie'];
$description = $data['description'];
$adresse = $data['adresse'];
$type = $data['typens'];
$sexe = $data['sexe'];
$date = $data['date_update'];
$nation = $data['nationalite'];
$faculte = $data['faculte'];
$idfac = $data['idfac'];

  $sql = "SELECT * FROM t_faculte";
  $req =$bdd->query($sql);
?>
<div style="margin-left:20%;width:3000px">
  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">MODIFIER ENSEIGNANT  </h5>
  <div class="jumbotron" id="div-id-name">
    <form action="../../app/updatens.php" method="POST">
        <div class="modal-body">
          <p><b><i>Information Personnelle</i></b></p>
          <hr>

            <div class="form-group">
                <input type="hidden" class="form-control" autocomplete="off" value="<?=$id?>" required="required" autofocus name="idEns">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label>Nom & Post-nom <span class="text-danger">*</span> </label>
                  <input type="text" class="form-control" autocomplete="off" value="<?=$noms?>" required="required" autofocus name="name" placeholder="Entrez le nom et postnom">
              </div>
              <div class="form-group col-md-6">
                  <label>Prénom <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" autocomplete="off" value="<?=$prenom?>"  required="required" name="prenom" placeholder="Entrez le prénom">
              </div>
         </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label>Sexe <span class="text-danger">*</span></label>
                  <select name="sexe" class="form-control" >
                      <option selected value="<?=$sexe?>" ><?=$sexe?> </option>
                      <option value="M">Masculin</option>
                      <option value="F">Feminin</option>
                  </select>
            </div>
           
            <div class="form-group col-md-6">
                <label>Nationalité <span class="text-danger">*</span></label>
                <input type="text" class="form-control" autocomplete="off" required="required" name="nation" value="<?=$nation?>" >
            </div>
      </div>
        <div class="form-group">
        <label>Adresse Physique <span class="text-danger">*</span></label>

          <input type="text" class="form-control" autocomplete="off" required="required" value="<?=$adresse?>"  name="adresse">
        </div>

        </div>

        <p><b><i>Information de l'Enseignant</i></b></p>
        <hr>
        <div class="form-row">
             <div class="form-group col-md-6">
               <label>Catégorie <span class="text-danger">*</span></label>
               <select name="categorie" class="form-control">
                   <option selected value="<?=$categorie;?>"><?=$categorie;?></option>
                   <option value="P.O">Prof Ordinaire</option>
                   <option value="Prof">Prof Associé</option>
                   <option value="C.T">Chef de Travaux</option>
                   <option value="Ass.">Assistant</option>
               </select>
             </div>
             <div class="form-group col-md-6">
               <label>Type <span class="text-danger">*</span></label>
               <select name="typEns" class="form-control">
                   <option selected value="<?=$idfac?>"><?=$type;?></option>
                   <option value="Visiteur">Visiteur</option>
                   <option value="LAU">No Visiteur</option>

               </select>
            </div>
        </div>
        <div class="form-group">
        <label>Description de l'Enseignant <span class="text-danger">*</span></label>
        <textarea class="form-control" name="desc"><?=$description?></textarea>
          
        </div>

          <button type="submit" name="ok"class="btn btn-outline-success my-2 my-sm-0">MODIFIER</button>
    </form>


  </div>
</div>
