<?php
require_once('app/cnx.php');

if(isset($_POST['ok'])){
  extract($_POST);

  $password =sha1($password);

  $sql=("SELECT * FROM t_student WHERE Matricule='$matricule'");
  $reqCount="select count(*) countstd from t_student";

  $resultat = $bdd->query($sql);
  $data =$resultat->fetch();
  $resultatCount=$bdd->query($reqCount);


  if ($data['password'] == $password ){
    session_start();
    $_SESSION['name'] = $data['noms'];
    $_SESSION['id'] = $data['idstd'];
    $_SESSION['matricule'] = $data['matricule'];

            header("Location:pages/software/admin_std.php");
  }
    else {
      echo '<script> alert("Login ou Mot de passe incorrect!");</script>';

    }

}

 ?>


<form method="post" action="index.php?p=loginstd" class="form-horizontal" style="margin-left:50px">
    <div class="form-group input-group">
        <input type="text" class="form-control" name="matricule" required="required" placeholder="Entrez matricule">
    </div>

    <div class="form-group input-group">
        <input type="password" class="form-control" name="password" required="required" placeholder="Entrez le mot de passe">
    </div>

    <div class="form-group ">
        <button type="submit" name="ok" class="btn btn-info" style="width:460px"> Se Connecter</button>
    </div>

    <div class="form-group ">
        <a href="index.php?p=login" style="margin-left: 100px"><span class="fa fa-arrow-left"></span> Retour</a>
    </div>

</form>
