<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$query = "SELECT * 
      FROM t_comptstd  WHERE t_comptstd.idcmptstd='$id'";
$resultats=$bdd->query($query);
$data = $resultats->fetch();

$tel =$data['tel'];

$email =$data['email'];


?>



<div style="margin-left:15%;width:5000px"> 


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">MODIFIER COMPTE ÉTUDIANT </h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <form method="POST" action="../../app/updatcmptstd_ad.php">
        <div class="form-group ">
          <input type="hidden" class="form-control" name="id" value="<?=$id;?>" placeholder="Entrez le nom complet" autocomplete="off" required >
        </div>


          <div class="form-group">
            <label >Téléphone</label>
            <input type="text" class="form-control" name="tel"  value="<?=$tel;?>"placeholder="Entrez le numéro téléphone" autocomplete="off" required >
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?=$email;?>" placeholder="Entrez l'adresse email" autocomplete="off" required>
          </div>


        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%"><i class="fa fa-edit"></i> &nbsp;Modifier</button>

      </form>
    </div>
  </div>
