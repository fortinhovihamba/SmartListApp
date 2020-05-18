<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

$id=isset($_GET['id'])?$_GET['id']:0;


$requete="SELECT * FROM t_student WHERE idstd='$id'";
$resultat=$bdd->query($requete);
$result=$bdd->query($requete);
$data = $result->fetch();

$noms = $data['name'];
$prenom = $data['prenom'];
$sexe = $data['sexe'];
$nation = $data['nationalite'];


  $spromo ="SELECT * FROM t_promotion";
  $reqpromo =$bdd->query($spromo);

  $sql ="SELECT * FROM t_faculte";
  $req =$bdd->query($sql);
?>
<div style="margin-left:20%;width:3000px">
  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">FORMULAIRE D'INSCRIPTION  </h5>
  <div class="jumbotron" id="div-id-name">

     <form action="../../app/inscrit.php" method="POST">

             <div class="form-group">
                 <input type="hidden" class="form-control" autocomplete="off" value="<?=$id?>" required="required" autofocus name="idstd" placeholder="Entrez le nom et postnom">
             </div>
             <div class="form-group ">
                   <label>Nom & Post-nom <span class="text-danger">*</span> </label>
                   <input type="text" class="form-control" autocomplete="off"disabled  value="<?=$noms?>" required="required" autofocus name="name" placeholder="Entrez le nom et postnom">
            </div>
            <div class="form-group">
                   <label>Prénom <span class="text-danger">*</span></label>
                   <input type="text" class="form-control" autocomplete="off" disabled value="<?=$prenom?>"  required="required" name="prenom" placeholder="Entrez le prénom">
            </div>
             <div class="form-group">
                   <label>Sexe <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" autocomplete="off" disabled required="required" name="nation" value="<?=$sexe?>" >
             </div>
             <div class="form-group ">
                 <label>Nationalité <span class="text-danger">*</span></label>
                 <input type="text" class="form-control" autocomplete="off" disabled required="required" name="nation" value="<?=$nation?>" >
             </div>
             <div class="form-group ">
                 <label>Année Académique <span class="text-danger">*</span></label>
                 <input type="text" class="form-control" autocomplete="off"  required="required" name="annee" placeholder="Entrez l'année académque" >
             </div>
             <div class="row">
             <div class="form-group col-md-6">
             <label>Faculté d'attache<span class="text-danger">*</span></label>
             <select name="fac" class="form-control">
                 <option selected>Choisissez une faculté.</option>
                 <?php

                 foreach($req as $fac)
                 {?>
                   <option value="<?php echo $fac['idfac']?>"><?php echo $fac['faculte']?> <?php echo $fac['_option']?>.</option>
              <?php
                  }
                 ?>


             </select>
           </div>

               <div class="form-group col-md-6 ">
               <label>Promotion<span class="text-danger">*</span></label>
               <select name="promo" class="form-control">
                   <option selected>Choisissez une promotion</option>
                   <?php

                   foreach($reqpromo as $row)
                   {?>
                     <option value="<?php echo $row['idpromo']?>"><?php echo $row['slug_promo']?></option>
                <?php
                    }
                   ?>


               </select>
             </div>
            </div>
            <div class="form-group ">
                  <button type="submit" name="ok"class="btn btn-outline-success my-2 my-sm-0">INSCRIRE</button>
            </div>


     </form>
   </div>
 </div>
