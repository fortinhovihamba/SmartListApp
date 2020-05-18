<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">AJOUTER COTE</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../../app/note.php" method="POST">
        <div class="modal-body">
        <input type="hidden" name="idstd" id="note_id">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nom & Post-nom</label>
                <input type="text" class="form-control" name="fname" id="nom">
              </div>
              <div class="form-group col-md-6">
                <label>Prénom</label>
                <input type="text" class="form-control"  name="lname" id="prenom">
              </div>
            </div>
            <div class="form-group">
                <label>Examen</label>
                <select name="examen" class="form-control">
                  <option selected>Choississez une section</option>
                  <option value="Mi-session">Mi-Session</option>
                  <option Value="Session">Session</option>
                  <option Value="Deuxième-Session">Deuxième Session</option>
                </select>
             </div>
            <div class="form-group">
                <label>Cours</label>
                <select name="cours" class="form-control">
                  <option selected>Choississez une section</option>
                      <?php  while($row=$cours->fetch()) {?>
                       <option value="<?php echo $row['idcours'];?>"><?php echo $row['cours'];?></option>
                            <?php }?>
                          </select>

              </div>
              <div class="form-group">
                <label>Année Académique</label>
                <input type="text" class="form-control"  name="annee" placeholder="Entrez le prénom">
             </div>
             <div class="form-row">
              <div class="form-group col-md-6">
                <label>Point Obtenu</label>
                <input type="text" class="form-control" name="point_Obt" placeholder="Entrez le nom et postnom">
              </div>
              <div class="form-group col-md-6">
                <label>Point du Cours</label>
                <input type="text" class="form-control"  name="point" placeholder="Entrez le prénom">
              </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok" class="btn btn-success">Coter...</button>
        </div>
    </form>
  </div>
</div>
