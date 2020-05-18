<?php 
//connexion à la base de donnée
require_once('../app/cnx.php');

 $name=isset($_POST['name'])?$_POST['name']:"";
     $classe=isset($_POST['classe'])?$_POST['classe']:"all";

     if($classe=="all"){
         $requete="SELECT * FROM t_student,t_classe,t_section
                     WHERE t_classe.idclass=t_student.idclass 
                     AND t_classe.idsect=t_section.idsect AND
                     t_student.nom like '%$name%'";;


     }else{
         $requete="SELECT * FROM  t_student,t_classe,t_section
                  WHERE t_classe.idclass=t_student.idclass 
                  AND t_classe.idsect=t_section.idsect AND
                  t_student.nom like '%$name%'
                  and t_classe.idclass='$classe'";
    
     }
         
         $resultat=$bdd->query($requete);
         header ('location:../pages/index.php?page=note');