<?php
require_once('cnx.php');
if(isset($_POST['ok'])){

  extract ($_POST);


  $requette ="INSERT INTO t_promotion (slug_promo,promotion,iduser)value(?,?,?)";
  $parms    = array($slug,$promo,$id);
  $resultat = $bdd->prepare($requette);
  $resultat->execute($parms);

  header ('location:../pages/admin/dashboard.php?p=promotion');

}
