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
$date_at = $data['datecre_at'];
$date = $data['date_update'];
$nation = $data['nationalite'];

?>
<div style="margin-left:20%;width:3000px">


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">FICHE DE L'ENSEIGNANT  </h5>

  <div class="jumbotron" id="div-id-name">

      <a class="btn btn-sm btn-outline-success" href="dashboard.php?p=accountens&id=<?=$id?>">
      <span class="fas fa-lock"></span>
        Créer compte
      </a>

      <a class="btn btn-sm btn-outline-danger" href="dashboard.php?p=enseignant&id=<?=$id?>">
        <span class="fas fa-trash"></span>
        Delete
      </a>

      <a class="btn btn-sm btn-outline-primary" href="dashboard.php?p=editens&id=<?=$id?>">
        <span class="fas fa-edit"></span>
      Modifier
    </a>

    <div class="mt-4">
    <h6 class="p-3 mb-2 bg-dark text-white">Description du l'Enseignant</h6>
    <hr class="mt-4">
    <p>Nom & Postnom : <b><?=$noms;?> </b></p>
    <p>Prénom  : <b><?=$noms;?></b></p>
    <p>Catégorie : <b><?=$categorie;?> </b></p>
    <p>Type : <b><?=$type;?> </b></p>
    <p>Déscription :</p>
    <p><b><?=$noms;?> <?=$description;?>
    <h6 class="p-3 mb-2 bg-dark text-white">information Personnelle</h6>
    <hr class"mt-4">
      <table class="table">
        <tr>
          <th>Nationalite</th>
          <td><?=$nation;?></td>
        </tr>
        <tr>
          <th>Sexe</th>
          <td><?=$sexe;?></td>
        </tr>
        <tr>
          <th>Adresse physique</th>
          <td><?=$adresse;?></td>
        </tr>
        <tr>
          <th>Date de création</th>
          <td><?=$date_at;?></td>
        </tr>
        <tr>
          <th>Date de modification</th>
          <td><?=$date;?></td>
        </tr>
      </table>

    </div>
  </div>
</div>
