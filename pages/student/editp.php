<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;


$sql = " SELECT *
          FROM t_student
            WHERE idstd='$id'";
$resultat = $bdd->query($sql);
$data = $resultat->fetch();

$name =$data['name'];
$prenom =$data['prenom'];
$sexe =$data['sexe'];
$nationalite =$data['nationalite'];
$tel =$data['tel'];
$email =$data['email'];
$adresse =$data['adresse'];
$datecrea =$data['datecrea'];
?>


<div class="container">
  <hr class="my-4">

</div>
