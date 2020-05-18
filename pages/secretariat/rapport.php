<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');


    $requete="SELECT * FROM t_enseignant";
    $requeteCount="select count(*) countE from t_enseignant";

    $resultat=$bdd->query($requete);
    $resultatCount=$bdd->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrEns=$tabCount['countE'];


    /**
     * On lance une requette pour récuperer le nombre d'nregistrement
     * dans la table Inscription
     */
    $reqCount="select count(*) countCours from t_cours";
    $resCount=$bdd->query($reqCount);
    $tabCountCours=$resCount->fetch();
    $nbrCours=$tabCountCours['countCours'];


      /**
     * On lance une requette pour récuperer le nombre d'nregistrement
     * dans la table utilisateur
     */
    $reqCount="select count(*) countU from t_program";
    $CountUser=$bdd->query($reqCount);
    $tabCountUser=$CountUser->fetch();
    $nbrUser=$tabCountUser['countU'];


    /**
   * On lance une requette pour récuperer le nombre d'enregistrement
   * dans la table faculté
   */
  $reqCount="select count(*) countF from t_comptens";
  $CountFac=$bdd->query($reqCount);
  $tabCountFac=$CountFac->fetch();
  $nbrFac=$tabCountFac['countF'];
  ?>



<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
       <h3>RAPPORT</h3>
</div>
</div>

<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
              <div class="row pt-md-5 mt-md-3 mb-5">
                  <div class="col-xl-3 col-sm-6 p-2">
                        <div class="card card-common">
                        <a href="dashboard.php?p=list_cours">
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <i class="fas fa-book fa-3x text-warning"></i>
                                <div class="text-right text-secondary">
                                <h5>Liste de cours</h5>
                                <h3 class="text-muted"><?php  echo $nbrCours?></h3>
                                </div>
                            </div>
                            </div>
                            </a>
                        </div>

                  </div>
                  <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <a href="dashboard.php?p=listens">
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <i class="fas fa-user-tie fa-3x text-success"></i>
                                <div class="text-right text-secondary">
                                <h5>Liste enseignant</h5>
                                <h3 class="text-muted"><?php echo $nbrEns?></h3>
                                </div>
                            </div>
                            </div>
                        </a>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                    <a href="dashboard.php?p=listprogram">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                          <i class="far fa-calendar-alt fa-3x text-info"></i>
                            <div class="text-right text-secondary">
                            <h5>Programme Acad</h5>
                              <h3 class="text-muted"><?php  echo $nbrFac?></h3>
                            </div>
                          </div>
                        </div>
                    </a>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                    <a href="dashboard.php?p=listcomptense">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <i class="fas fa-chart-line fa-3x text-danger"></i>
                            <div class="text-right text-secondary">
                              <h5>Les Utilisateurs</h5>
                              <h3 class="text-muted"><?php  echo $nbrUser?></h3>
                            </div>
                          </div>
                        </div>
                    </a>
                    </div>
                  </div>
              </div>
</div
