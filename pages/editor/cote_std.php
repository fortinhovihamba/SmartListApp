<?php
//connexion à la base de donnée
require_once('../../app/cnx.php') ;

$id=isset($_GET['id'])?$_GET['id']:0;
$fac=isset($_GET['fac'])?$_GET['fac']:0;
$promo=isset($_GET['promo'])?$_GET['promo']:0;

  $requete="SELECT * FROM t_inscription
            LEFT JOIN t_student ON t_student.idstd=t_inscription.idstd
            LEFT JOIN t_faculte ON t_faculte.idfac=t_inscription.idfac
            LEFT JOIN t_promotion ON t_promotion.idpromo=t_inscription.idpromo
            WHERE t_inscription.idinscrit='$id'";
  $resultat=$bdd->query($requete);
  $data=$resultat->fetch();
  $noms = $data['name'];
  $prenom = $data['prenom'];
  $sexe = $data['sexe'];
  $nation = $data['nationalite'];
  $slug_promo = $data['slug_promo'];
  $faculte = $data['faculte'];
  $annee = $data['annee'];
  $option = $data['_option'];


  $sql = "SELECT * FROM t_cours
            LEFT JOIN t_faculte ON t_faculte.idfac=t_cours.idfac
            LEFT JOIN t_promotion ON t_promotion.idpromo=t_cours.idpromo
            WHERE t_cours.idfac='$fac' AND t_cours.idpromo='$promo'";
  $result=$bdd->query($sql);

?>-- Button trigger modal -->

<div style="margin-left:20%;width:5000px"> 

   <hr class="my-4">
    <div class="row p-3 mb-2">
       <div class="col-md-8 ">
        <p class="text-muted">COTE ÉTUDIANT DE L'ÉTUDIANT(E) <?=$noms?></p>
       </div>
       
     </div>
  
    <div class="jumbotron" id="div-id-name">
          
            <!--------------------------------Form search------------------------------------------>
            <form action="../../app/insertcote.php" method="POST">

               <input type="hidden" class="form-control" autocomplete="off" required="required" autofocus name="id" value="<?=$id?>">

                <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Nom :</label>
                        <input type="text" class="form-control" disabled autocomplete="off" required="required" autofocus name="name" value="<?=$noms?>">
                      </div>         
                      <div class="form-group col-md-6">
                         <label>Prenom :</label>
                        <input type="text" class="form-control" disabled autocomplete="off" required="required" autofocus name="prenom" value="<?=$prenom?>">
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6 ">
                        <label>Promotion :</label>
                        <input type="text" class="form-control" disabled autocomplete="off" required="required" autofocus name="slug" value="<?=$slug_promo?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Faculté</label>
                        <input type="text" class="form-control" disabled autocomplete="off" required="required" autofocus name="slug" value="<?=$faculte?> <?=$option?>">
                      </div>
                  </div>

                  <div class="form-group">
                    <label>Examen de la :</label>
                    <select  class="form-control" name="examen">
                            <option selected>Choisissez un exman</option>
                            <option value="Mi-session">Mi-Session</option>
                            <option value="Session">Sessio Ordinaire</option>
                            <option value="2eme Session">Deuxième Session</option>
                          </select>
                  </div>
                  <div class="form-group">
                    <label>Cours</label>
                    <select  class="form-control" name="cours">
                            <option selected>Choisissez un cours</option>
                            <?php
                          foreach ($result  as $datas){

                            ?>
                            <option value="<?php echo $datas['idcours']?>"><?php echo $datas['cours']?></option>
                            <?php
                                }
                            ?>
                          </select>
                  </div>

                   <div class="form-row">
                          <div class="form-group col-md-4">
                            <label>Point Obtenu :</label>
                            <input type="text" class="form-control"  autocomplete="off"  autofocus name="point" placeholder="Entrez le Point obtenu">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Max de point :</label>
                            <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="max" placeholder="Entrez le max de point">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Mention :</label>
                            <select  class="form-control" name="mention">
                                    <option selected>Choisissez une mention</option>
                                    <option value="">Reusite</option>
                                    <option value="echec">Échec</option>
                                    <option value="manque cote">Manque de cote</option>
                                  </select>
                        </div>
                    </div>
                  <div class="mt-4"></div>
                      <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="ok" style="width:20%"><span class="fas fa-save"></span> Enregistrer</button>
                      <div class="mt-4">
                    
                  </div>
            </form>
        

    </div>

    
  
</div>







