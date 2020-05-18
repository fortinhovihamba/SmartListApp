<?php
require_once('cnx.php');

if(isset($_POST['ok']))
{
  extract($_POST);
  $ancien_pass = sha1($pass1);
  $new_pass = sha1($pass2);
  $confirm_pass = sha1($pass3);

 	$date=date('d-m-Y H:i:s');


 	$sql = "SELECT * FROM t_users WHERE iduser=$id";
 	$user =$bdd->query($sql);
 	$data = $user->fetch();

 	$password = $data['password'];

 	if($password == $ancien_pass)
 	{
 		if($new_pass == $confirm_pass)
 		{
 			$requete =" UPDATE t_users SET password=?,date_update=? WHERE iduser=?";
  			$params =array($new_pass,$date, $id);
  			$resultat = $bdd->prepare($requete);
  			$resultat->execute($params);

  			header ('location:../pages/admin/dashboard.php?p=users&d=2');
 		}
 		else
 		{
 			header ('location:../pages/admin/dashboard.php?p=users&d=4');
 		}
 	}
 	else
 	{
 		 header ('location:../pages/admin/dashboard.php?p=users&d=3');
 	}
  
}
