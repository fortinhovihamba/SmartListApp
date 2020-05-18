<?php
session_start();
require_once('cnx.php');

if (isset($_POST['ok'])){

  extract($_POST);
  $pass = sha1($loginPassword);

          if($loginRole == "student")
          {

            $requete ="SELECT * FROM t_comptstd
            LEFT JOIN t_student ON t_student.idstd=t_comptstd.idstd
            WHERE t_comptstd.email='$loginUser' AND t_comptstd.password='$pass'";
            $resultat = $bdd->query($requete);
            $req=$resultat->rowCount();

            if ($req > 0 )
            {
              foreach ($resultat as $data)
              {
                $_SESSION['id'] = $data['idstd'];
                $_SESSION['name'] = $data['name'];

                header("Location:../pages/student/dashboard.php");
              }

          }
          else
              {
              
                    header("Location:../index.php?p=1");
              }
          }
          elseif ($loginRole == "teacher")
          {

            $requete ="SELECT *
                          FROM t_comptens
                            LEFT JOIN t_enseignant ON t_enseignant.idEns=t_comptens.idEns

                            WHERE t_comptens.email='$loginUser' AND t_comptens.password='$pass'";
            $resultat = $bdd->query($requete);
            $req=$resultat->rowCount();

            if ($req > 0 )
            {
              foreach ($resultat as $data)
              {
                $_SESSION['id'] = $data['idEns'];
                $_SESSION['name'] = $data['noms'];

                header("Location:../pages/teacher/dashboard.php");
              }

          }
          else
          {    
                    header("Location:../index.php?p=1");
              }
          }
          elseif ($loginRole == "superviseur")
          {

            $requete ="SELECT * FROM t_compte WHERE email='$loginUser' AND password='$pass'";
            $resultat = $bdd->query($requete);
            $req=$resultat->rowCount();

            if ($req > 0 )
            {
              foreach ($resultat as $data)
              {
                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['noms'];

                header("Location:../pages/supusers/dashboard.php");
              }

          }
          else
          {    
                    header("Location:../index.php?p=1");
              }
          }
          elseif ($loginRole == "secretariat")
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

                header("Location:../pages/secretariat/dashboard.php");
              }

          }
          else
          {    
                    header("Location:../index.php?p=1");
              }
          }
          elseif ($loginRole == "editeur")
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

                header("Location:../pages/editor/dashboard.php");
              }

          }
          else
          {    echo '<script>
                      alert("les informations sont incorect!: Veuillez vérifier soit l\'adresse email ou le mot de passe");

                    </script>';
                    header("Location:../index.html");
              }
          }


}
