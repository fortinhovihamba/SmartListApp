<?php
//connexion à la base de donnée
require_once('../../app/cnx.php');
//o, lance une requette pour selection tout dans la table secion
 $spromo ="SELECT * FROM t_promotion";
$reqpromo =$bdd->query($spromo);

?>
<!-----------------------------Start Modal Cours--------------------------------------->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php include ('../formModal/_formPromo.php')?>
</div>

<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
   <div class="row pt-md-5 mt-md-3 mb-5">
       <h3>Les promotions</h3> &nbsp;&nbsp;<button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
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
                    <th scope="col">Slug Promotion</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Action</th>

                  </tr>
                  </thead>
                  <tbody>
                            <?php foreach ($reqpromo as $promotion){?>
                                <tr>
                                <td><?php echo $promotion['idpromo']?></td>
                                <td><?php echo $promotion['slug_promo']?></td>
                                <td><?php echo $promotion['promotion']?></td>
                                <td>
                                  <a class="btn btn-sm btn-primary" href="dashboard.php?p=edituser&id=<?php echo $promotion['idpromo']?>">Edit</a> &nbsp;
                                  <a class="btn btn-sm btn-danger" href="dashboard.php?p=edituser&id=<?php echo $promotion['idpromo']?>">Delete</a>
                                </td>
                                </tr>
                                <?php }?>
                            <tbody>
                </table>

                </div>
</div>
</div>
</section>
