<?php
require_once('cnx.php');

if(isset($_POST['ok'])){

  extract($_POST);

  $date=date('Y-m-d H:i:s');
  $date_up=date('Y-m-d H:i:s');

  $requette ="INSERT INTO t_faculte (faculte,_option,iduser)value(?,?,?)";
  $parms    = array($faculte,$opt,$id);
  $resultat = $bdd->prepare($requette);
  $resultat->execute($parms);


  header ('location:../pages/admin/dashboard.php?p=faculte');

}
