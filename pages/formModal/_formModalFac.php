<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">AJOUTER UNE FACULTÉ</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../../app/insertfac.php" method="POST">
        <div class="modal-body">

              <div class="form-group ">
                  <label>Faculté <span class="text-danger">*</span> </label>
                  <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="faculte" placeholder="Entrez une faculté">
              </div>
              <div class="form-group ">
                  <label>Option <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" autocomplete="off" required="required" name="opt" placeholder="Entrez une option">
              </div>
              <div class="form-group ">
                  
                  <input type="hidden" class="form-control" autocomplete="off" value="<?=$id?>" required="required" name="id" placeholder="id la promotion">
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok"class="btn btn-success">Create</button>
        </div>
    </form>
  </div>
</div>
