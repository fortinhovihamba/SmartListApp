<?php
require_once('cnx.php');

if(isset($_POST['ok'])){

      extract($_POST);


      $account_exist = "SELECT * FROM t_comptens WHERE idEns='$idEns'";
      $req_account = $bdd->query($account_exist);
      $nbrAccount = $req_account->rowCount();
      if($nbrAccount !==1)
      {
        $date=date('Y-m-d H:i:s');
        $date_up=date('Y-m-d H:i:s');
        $password = sha1($pass);
        $requette ="INSERT INTO t_comptens (idEns,role,tel,email,password,date_at,date_update)value(?,?,?,?,?,?,?)";
        $parms    = array($idEns,$role,$tel,$email,$password,$date,$date_up);
        $resultat = $bdd->prepare($requette);
        $resultat->execute($parms);

        header ('location:../pages/secretariat/dashboard.php?p=account_list');
      }
      else{

        header ('location:../pages/secretariat/dashboard.php?p=alertacount');
      }




}
