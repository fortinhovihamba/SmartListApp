<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');
//o, lance une requette pour selection tout dans la table secion
 $query = "SELECT * FROM t_faculte";
 $resultat=$bdd->query($query);

?>
<!-----------------------------Start Modal Cours--------------------------------------->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php include ('../formModal/_formModalFac.php')?>
</div>

<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
       <h3>Les Facultés</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
                    <span class="fas fa-user-edit"></span>
                    Ajouter
            </button>

  <hr class="my-4">


</div>
</div>
<section>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-12 col-md8 ml-auto">

    <table class="table table-striped  table-dark">
                  <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Faculté</th>
                    <th scope="col">Option</th>
                    <th scope="col">Action</th>

                  </tr>
                  </thead>
                  <tbody>
                            <?php foreach($resultat as $faculte){?>
                                <tr>
                                <td><?php echo $faculte['idfac']?></td>
                                <td><?php echo $faculte['faculte']?></td>
                                <td><?php echo $faculte['_option']?></td>
                                <td>
                                  <a class="btn btn-sm btn-primary" href="dashboard.php?p=edituser&id=<?php echo $faculte['idfac']?>">Edit</a> &nbsp;
                                  <a class="btn btn-sm btn-danger" href="dashboard.php?p=edituser&id=<?php echo $faculte['idfac']?>">Delete</a>
                                </td>
                                </tr>
                                <?php }?>
                            <tbody>
                </table>

                </div>
</div>
</div>
</section>
