<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

$id=isset($_GET['id'])?$_GET['id']:0;

  $requete="SELECT * FROM t_inscription
            LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
            LEFT JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
            LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
            WHERE t_inscription.idinscrit='$id'";
  $resultat=$bdd->query($requete);
  $data=$resultat->fetch();
  $noms = $data['name'];
  $prenom = $data['prenom'];
  $sexe = $data['sexe'];
  $nation = $data['nationalite'];
  $slug_promo = $data['slug_promo'];
  $faculte = $data['faculte'];
  $annee = $data['annee'];
  $option = $data['_option'];

  ?>

  <!doctype html>
  <html lang="fr">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>SMARTLIST | RELEVE</title>
    </head>
    <body>
  <div class="mt-4"></di>
  <div class="container">
    <div class="text-center">
    <h3><b>REPUBLIQUE DÉMOCRATIQUE DU CONGO</b></h3>
    <h4><b>MINISTERE DE L'ENSEIGNEMENT SUPERIEUR ET UNIVERSITAIRE</b></h4>
    <h5><b>LEADERSHIP ACADEMIA</b></h5>
    <h6><b><u>KINSHASA/BARUMBU</u></b></h6>
  </di>
    <hr class="mt-4">
    <div class="alert alert-dark" role="alert">
      <h6><b>FICHE D'INSCRIPTION DE L'ANNÉE ACADÉMIQUE <?= $annee;?></b></h6>
    </div>
    <div>
      <table class="table text-justify">
        <tr>
          <th>Nom & Postnom :</th>
          <td><?=$noms?></td>
        </tr>
        <tr>
          <th>Prénom :</th>
          <td><?=$prenom?></td>
        </tr>
        <tr>
          <th>Sexe :</th>
          <td><?=$sexe?></td>
        </tr>
        <tr>
          <th>Nationalité :</th>
          <td><?=$nation?></td>
        </tr>
        <tr>
          <th>Promotion :</th>
          <td><?=$slug_promo?></td>
        </tr>
        <tr>
          <th>Faculté :</th>
          <td>
            <?=$faculte?>
            <?=$option?>
          </td>
        </tr>
      </table>
    </div>

  <div class="line" style="text-align:right;">
  <button type="submit" id="imp" class="btn btn-success" onclick='window.print();return false;'><i class="fa fa-print"></i>&nbsp;Imprimer</button>

  </div>
  <br><br>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
  </html>

  <?php

  include('../includes/footer.php');


  ?>
