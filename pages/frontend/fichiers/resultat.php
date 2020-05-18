<?php
//connexion à la base de donnée
require_once('../../../app/cnx.php');



  ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-dark">
        <h5 class="modal-title" id="exampleModalLabel">LANCER LA RECHERCHE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="dashboard.php?p=program" method="POST">
      <div class="modal-body">
        <div class="form-group ">
          <input type="text" class="form-control" name="annee" placeholder="Entrez l'année académique" autocomplete="off">
        </div>
      <div class="form-group ">
        <select name="promo" class="form-control">
            <option selected>Entrez la promotion</option>
        </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Cancel</button>
        <button type="submit" name="ok" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-search"></i>&nbsp;Reseach</button>
      </div>
  </form>
</div>
    </div>
  </div>

<div class="container" style="margin-top:50px">
<h1 class="text-center text-info">Programme Académique<br>

  <button type="button" class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
    Afficher
  </button>
</h1>
<br><b
