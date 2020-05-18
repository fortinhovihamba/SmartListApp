<?php

$p=isset($_GET['p'])?$_GET['p']:""; 



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>SMARTLIST | AUTHENTIFICATION</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="../../../app/loginAdmin.php" method="POST" class="form">
      <img src="img/avatar.png" alt="">
      <h2>SMARTLIST APP</h2>
      <div class="input-group">
        <input type="text" name="loginUser" autocomplete="off" id="loginUser" required>
        <label for="loginUser">Adresse email</label>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" autocomplete="off" id="loginPassword" required>
        <label for="loginPassword">Mot de passe</label>
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
 
    </div>
  </div>
</body>
</html>
 