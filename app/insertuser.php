<?php

require_once('cnx.php');

if(isset($_POST['ok'])){
      extract($_POST);

      $mdps =sha1($password);
      $date=date('d-m-Y H:i:s');
      $date_up=date('d-m-Y H:i:s');

      $requette ="INSERT INTO t_users(name,prenom,sexe,tel,adress,email,role,password,date_at,date_update)value(?,?,?,?,?,?,?,?,?,?)";
      $parms= array($name,$prenom,$sexe,$tel,$adresse,$email,$role,$mdps,$date,$date_up);
      $resultat = $bdd->prepare($requette);
      $resultat->execute($parms);
      
}     header ('location:../pages/admin/dashboard.php?p=users');
     


      