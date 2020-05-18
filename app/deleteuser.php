<?php 

require_once('cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;


			$requete ="DELETE FROM t_users WHERE iduser=?";
			$params=array($id);
			$resultat=$bdd->prepare($requete);
			$resultat->execute($params);

			header ('location:../pages/admin/dashboard.php?p=comptens&d=1');
