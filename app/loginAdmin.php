<?php

session_start();
require_once('cnx.php');
if (isset($_POST['ok']))
{

  extract($_POST);
  $pass = sha1($loginPassword);

  	if(!empty('$loginUser') and !empty('loginPassword'))
  	{
  		$requete ="SELECT * FROM t_users WHERE email='$loginUser' AND password='$pass'";
        $resultat = $bdd->query($requete);
        $req=$resultat->rowCount();

         if ($req > 0 )
            {
              foreach ($resultat as $data)
              {
                $_SESSION['id'] = $data['iduser']; 
                $_SESSION['name'] = $data['name'];

                header("Location:../pages/admin/dashboard.php");
              }

          }
          else
          {   
                    header("Location:../pages/admin/includes/login.php?p=1"); 
              }

    }

}