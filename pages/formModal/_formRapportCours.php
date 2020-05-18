<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">AFFICHER LES INSCRITS</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="dashboard.php?p=list_cours method="POST">
        <div class="modal-body">

                <div class="form-group ">
                 
                 <select name="promo" class="form-control">
                    <option selected>Choisissez une promotion</option>
                    <?php

                    foreach($reqpromo as $row)
                    {?>
                      <option value="<?php echo $row['idpromo']?>"><?php echo $row['promotion']?></option>
                 <?php
                     }
                    ?>
                </select>
              </div>

              <div class="form-group">
                  <select name="fac" class="form-control">
                      <option selected>Entrez une faculté.</option>
                      <?php

                      foreach($req as $fac)
                      {?>
                        <option value="<?php echo $fac['idfac']?>"><?php echo $fac['faculte']?> <?php echo $fac['_option']?>.</option>
                   <?php
                       }
                      ?>


                </select>
              </div>            

        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok"class="btn btn-outline-success my-2 my-sm-0">Envoi...</button>
        </div>
    </form>
  </div>
</div>
