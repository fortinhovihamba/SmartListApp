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
$noms = $data['noms'];
$prenom = $data['prenom'];
$categorie = $data['categorie'];
$description = $data['description_cours'];
$cours = $data['cours'];
$annee = $data['annee'];
$type = $data['typens'];

?>

<div class="container">
  
  <hr class="my-4">
    <h5 class="p-3 mb-2 bg-dark text-white text-center">DETAIL SUR LE COUS <span class="text-warning" style="text-transform: uppercase;"><?=$cours?> </span> </h5>
    <div class="jumbotron" id="div-id-name">
      <h6 class="p-3 mb-2 bg-dark text-white">Description du cours</h6>
      <hr class="mt-4">
    <p>Dispenser par: <b><?=$noms;?> </b></p>
    <p>Catégorie : <b><?=$categorie;?> </b></p>
    <p>Type : <b><?=$type;?> </b></p>
    <p>Déscription :</p>
    <p><b> <?=$description;?>
    
    <hr class"mt-4">

    <p>Début de cours : <b> <?=$duree_debut;?>
    <p>Fin du cours : <b> <?=$duree_fin;?>
    <p>Processus du cours : <b> <?=$processus;?>
</div>
