<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">VOIR LE PROGRAMME</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../secretariat/dashboard.php?p=detailProgram" method="POST">
        <div class="modal-body">

              <div class="form-group ">
                  <label>Année Académique <span class="text-danger">*</span> </label>
                  <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="annee" placeholder="Entrez une année académique">
              </div>


        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok"class="btn btn-success">Envoi...</button>
        </div>
    </form>
  </div>
</div>
