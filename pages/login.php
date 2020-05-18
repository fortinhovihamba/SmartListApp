<?php
session_start();
require_once('app/cnx.php');

if (isset($_POST['ok'])) {

  extract($_POST);

  $pass=  sha1($pass);

  $requete = "SELECT  * FROM t_user LEFT JOIN t_role ON t_role.idrole=t_user.idrole
             WHERE t_user.email='$login'AND t_user.mdps='$pass'
             ORDER BY t_user.iduser asc";
  $resultat = $bdd->query($requete);
  $req=$resultat->rowCount();

    if ($req > 0 ) {
      // code...
      foreach ($resultat as $data) {
        // code...
        $_SESSION['id'] = $data['iduser'];
        $_SESSION['name'] = $data['noms'];
        $_SESSION['slug'] = $data['slug'];

        if($data['slug']=="admin"){

         header("Location:pages/admin/admin.php");

       }elseif ($data['slug']=="manager") {
         // code...
          header("Location:pages/users/user.php");
       }

       else{

         header("Location:pages/users/utilisateur.php");
       }
      }
    }
}

 ?>
 <div class="login-box">
   <form action="index.php?p=login" method="POST" class="form-horizontal">
     <div class="textbox">
       <span class="fa fa-user"</span>
       <input type="text" placeholder="Entrez l'adresse email" name="login">
     </div>
     <div class="textbox">
       <span class="fa fa-lock"</span>
       <input type="password" placeholder="Entrez le mot de passe" name="pass">
     </div>
     <div class="btn1">
     <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok">Se connecter</button>
   </div>
   </form>
</div>
 <br><br>
 <p class="text-center"><a href="index.php?p=loginens">Se connecter étant Enseignant</a> | <a href="index.php?p=loginstd">Se connecter étant Étudiant</a></p>
<br><br>
