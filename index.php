<?php

$p=isset($_GET['p'])?$_GET['p']:0; 



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styles.css">
  <title>SMARTLIST | AUTHENTIFICATION</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="app/login.php" method="POST" class="form">
      <img src="css/img/avatar.png" alt="">
      <h2>SMARTLIST APP</h2>
      <div class="input-group">
        <input type="text" name="loginUser" autocomplete="off" id="loginUser" required>
        <label for="loginUser">Adresse email</label>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" autocomplete="off" id="loginPassword" required>
        <label for="loginPassword">Mot de passe</label>
      </div>
      <div class="input-group">
        <select name="loginRole">
            <option selected>Choisissez l'accès...</option>
            <option value="student">Étudiant</option>
            <option value="teacher">Enseignant </option>
            <option value="editeur">Apparitaire</option>
            <option value="secretariat">Sécretariat</option>
            <option value="superviseur">Superviseur</option>
        </select>
      </div>
     <br><br>
      <?php
      if($p == 1)
        {
          $message = "Information érronée : Veuillez vérifier vos cordonner !";
           echo $message;
        }
      ?>
      
      <input type="submit" value="Se Connecter" name="ok"; class="submit-btn">
      <a href="#forgot-pw" class="forgot-pw"><i class="fa fa-user"></i>ADMIN</a>
    </form>
    <br>
    <div id="forgot-pw">
      <form action="app/loginAdmin.php" method="POST" class="form">
        <a href="#" class="close">&times;</a>
        <h2>CONNEXION</h2>
         <div class="input-group">
          <input type="email" name="loginUser" autocomplete="off" id="email" required>
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="loginPassword" id="password" required>
          <label for="password">Password</label>
        </div>
        <input type="submit" value="Se Connecter" name="ok"; class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html>
