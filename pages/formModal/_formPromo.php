<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">AJOUTER UNE PROMOTION</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../../app/insertpromo.php" method="POST">
        <div class="modal-body">

              <div class="form-group">
                  <label>Slug Promo <span class="text-danger">*</span> </label>
                  <select class="form-control" required name="slug">
                    <option selected>Selectionnez un slug</option>
                    <option value="G1">G1</option>
                    <option value="G2">G2</option>
                    <option value="G3">G3</option>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="Ma1">1er Master</option>
                    <option value="Ma2">2ème Master</option>
                    <option value="Doc">Doctorat</option>
                  </select>
              </div>
              <div class="form-group ">
                  <label>Promotion <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" autocomplete="off" required="required" name="promo" placeholder="Entrez la promotion">
              </div>

              <div class="form-group ">
                  
                  <input type="hidden" class="form-control" autocomplete="off" value="<?=$id?>" required="required" name="id" placeholder="id la promotion">
              </div>

        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok"class="btn btn-success">Create</button>
        </div>
    </form>
  </div>
</div>
