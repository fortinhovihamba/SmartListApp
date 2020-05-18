<?php

try{
    $bdd = new PDO ('mysql:host=localhost;dbname=db_kelasi002','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));    

}

catch (PDOException $e){
    echo "Impossible de se connecter avec la base de donnée ";
}
