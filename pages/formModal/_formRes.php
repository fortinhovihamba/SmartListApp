<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">RECHERCHER RÉSULTAT</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../student/dashboard.php?p=resultat" method="POST">
        <div class="modal-body">

          <div class="form-group">
              <input type="text" name="annee" class="form-control" required autocomplete="off" placeholder="Entrez une année Académique">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok" class="btn btn-success"><i class="fas fa-search"></i>Reseach</button>
        </div>
    </form>
  </div>
</div>
