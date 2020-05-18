<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header bg-dark text-white">
      <h5 class="modal-title" id="exampleModalLabel">FORMULAIRE DE COURS</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../../app/insertcours.php" method="POST">
          <div class="modal-body">
            <div class="form-group ">
            <label>Faculté d'attache<span class="text-danger">*</span></label>
            <select name="fac" class="form-control">
                <option selected>Choisissez une faculté.</option>
                <?php

                foreach($req as $fac)
                {?>
                  <option value="<?php echo $fac['idfac']?>"><?php echo $fac['faculte']?> <?php echo $fac['_option']?>.</option>
             <?php
                 }
                ?>


            </select>
          </div>
          <div class="form-group ">
          <label>Promotion<span class="text-danger">*</span></label>
          <select name="promo" class="form-control">
              <option selected>Choisissez une promotion</option>
              <?php

              foreach($reqpromo as $row)
              {?>
                <option value="<?php echo $row['idpromo']?>"><?php echo $row['slug_promo']?></option>
           <?php
               }
              ?>


          </select>
        </div>
              <div class="form-group ">
                <label for="inputCity">Cours</label>
                <input type="text" class="form-control" autocomplete="off" name="cours" placeholder="Entrez un cours">
              </div>
              <div class="form-group ">
                <label for="inputCity">Volume horraire</label>
                <input type="text" class="form-control" name="volCours" autocomplete="off" placeholder="Entrez le volume cours">
              </div>
              <div class="form-group ">
                <label for="inputCity">Description</label>
                <textarea name="pres" id="" cols="40" placeholder="Présentation du Cours" rows="3"></textarea>
              </div>


              </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Cancel</button>
              <button type="submit" name="ok" class="btn btn-outline-success my-2 my-sm-0">Save</button>
          </div>
    </form>
  </div>
</div>
