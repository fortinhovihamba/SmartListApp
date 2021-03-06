<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">FORMULAIRE UTILISATEUR</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../../app/insertuser.php" method="POST">
        <div class="modal-body">
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label>Nom & Post-nom <span class="text-danger">*</span> </label>
                  <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="name" placeholder="Entrez le nom et postnom">
              </div>
              <div class="form-group col-md-6">
                  <label>Prénom <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" autocomplete="off" 
                  required="required" name="prenom" placeholder="Entrez le prénom">
              </div>
         </div>
            <div class="form-group">
                  <label>Sexe <span class="text-danger">*</span></label>
                  <select name="sexe" class="form-control">
                      <option selected>Choose...</option>
                      <option value="M">Masculin</option>
                      <option value="F">Feminin</option>
                  </select>
            </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Téléphone <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="tel" placeholder="+243 000000000">
                </div>
            <div class="form-group col-md-6">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" autocomplete="off" required="required" 
                name="email" placeholder="Entrez l'adresse email">
            </div>
      </div>
      <div class="form-group ">
      <label>Adresse Physique <span class="text-danger">*</span></label>
        <input type="text" class="form-control" autocomplete="off" required="required" 
        autofocus name="adresse" placeholder="Entrez l'adresse Physique">
       </div>
       <div class="form-group">
          <label>Rôle utilisateur <span class="text-danger">*</span></label>
          <select name="role" class="form-control">
            <option selected>Choose...</option>
            <option value="editeur">ÉDITEUR</option>
            <option value="secretariat">SECRETARIAT</option>
          </select>
       </div>
       <div class="form-group">
                <label>Mot de passe <span class="text-danger">*</span></label>
                <input type="password" class="form-control" autocomplete="off" required="required"
                 name="password" placeholder="Entrez le mot de passe">
            </div>
        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok"class="btn btn-success">Create</button>
        </div>
    </form>
  </div>
</div>
