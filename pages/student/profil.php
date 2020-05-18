<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;


$sql = " SELECT *
          FROM t_student
            LEFT JOIN t_comptstd ON t_student.idstd=t_comptstd.idstd
              WHERE t_student.idstd='$id'";
$resultat = $bdd->query($sql);
$data = $resultat->fetch();

$name =$data['name'];
$prenom =$data['prenom'];
$sexe =$data['sexe'];
$nationalite =$data['nationalite'];
$tel =$data['tel'];
$email =$data['email'];
$adresse =$data['adresse'];
$role =$data['role'];
$date_at =$data['date_at'];
?>


<div class="container">
  <hr class="my-4">

  <div class="jumbotron" id="div-id-name">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h4>Mon Profil</h4>
        <hr>
      <table class="table table-striped">
        <tr>
          <th>NOM DE L'ÉTUDIANT :</th>
          <td><?=$name;?></td>
        </tr>
        <tr>
          <th>PRÉNOM DE L'ÉTUDIANT </th>
          <td><?=$prenom;?></td>
        </tr>
        <tr>
          <th>SEXE DE L'ÉTUDIANT </th>
          <td><?=$sexe;?></td>
        </tr>
        <tr>
          <th>NATIONALITE DE L'ÉTUDIANT </th>
          <td><?=$nationalite;?></td>
        </tr>
        <tr>
          <th>TÉLÉPHONE DE L'ÉTUDIANT </th>
          <td><?=$tel;?></td>
        </tr>
        <tr>
          <th>EMAIL DE L'ÉTUDIANT </th>
          <td><?=$email;?></td>
        </tr>
        <tr>
          <th>ADRESSE DE L'ÉTUDIANT </th>
          <td><?=$adresse;?></td>
        </tr>
        <tr>
          <th>DATE CREATION </th>
          <td><?=$date_at;?></td>
        </tr>
      </table>

    </div>
  </div>
</div>
