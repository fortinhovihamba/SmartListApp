<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$sql = " SELECT *
          FROM t_program
            LEFT JOIN t_promotion ON t_promotion.idpromo=t_program.idpromo
                LEFT JOIN t_enseignant ON t_enseignant.idEns=t_program.idEns
                LEFT JOIN t_cours ON t_cours.idcours=t_program.idcours
            WHERE
              t_program.idpgrm='$id'";
$resultat = $bdd->query($sql);

$data = $resultat->fetch();

$duree_debut = $data['debut'];
$duree_fin = $data['fin'];
$vol = $data['volHor'];
$processus = $data['processus'];
$idpromo=$data['idpromo'];
$idEns=$data['idEns'];
$idcours=$data['idcours'];
$cours = $data['cours'];
$annee = $data['annee'];
$categorie = $data['categorie'];
$noms = $data['noms'];
$date_at = $data['date_at'];
$data_up = $data['date_update'];
?>

  <div class="container">
    <hr class="my-4">

    <div class="jumbotron" id="div-id-name">
      <h6 class="p-3 mb-2 bg-dark text-white">LE COURS <b><?=$cours?></b> DISPENSER PAR : <b><?=$categorie?> <?=$noms?></b></h6>
      <hr class="mt-4">
      <form method="POST" action="../../app/upprgrm_t.php">
        <input type="hidden" class="form-control" name="idprg"value="<?=$id?>" autocomplete="off">
          <input type="hidden" class="form-control" name="idEns"value="<?=$idEns?>" autocomplete="off">
          <input type="hidden" class="form-control" name="idcours"value="<?=$idcours?>" autocomplete="off">
          <input type="hidden" class="form-control" name="idpromo"value="<?=$idpromo?>" autocomplete="off">
        <div class="form-group ">
          <label>Annee Académique</label>
          <input type="text" class="form-control" name="annee"value="<?=$annee?>" autocomplete="off">
        </div>
        <div class="form-group ">
          <label>Cours</label>
          <input type="text" class="form-control" value="<?=$cours?>" autocomplete="off">
        </div>
        <div class="form-group ">
          <label>Debut cours</label>
          <input type="text" class="form-control" name="debut"value="<?=$duree_debut?>" autocomplete="off">
        </div>
        <div class="form-group ">
          <label>Fin cours</label>
          <input type="text" class="form-control" name="fin"value="<?=$duree_fin?>" autocomplete="off">
        </div>
        <div class="form-group ">
          <label>Processus</label>
          <select class="form-control" name="processus">
            <option selected value="<?=$processus?>"><?=$processus?></option>
            <option value="Encours ..">Encours ...</option>
            <option value="Terminer">Terminer</option>
          </select>
        </div>
        <div class="form-group ">
          <input type="hidden" class="form-control" name="date_at"value="<?=$date_at?>" autocomplete="off">
          <input type="hidden" class="form-control" name="data_up"value="<?=$data_up?>" autocomplete="off">
        </div>
        <button type="submit" name="ok" class="btn btn-outline-success my-2 my-sm-0">Modifier</button>
      </form>
  </div>
