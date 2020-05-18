<div class="modal-dialog" role="document" >
  <div class="modal-content">
    <div class="modal-header text-white bg-dark">
      <h5 class="modal-title" id="exampleModalLabel">FORMULAIRE ENSEIGNANT</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="../../app/insertens.php" method="POST">
        <div class="modal-body">
          <p><b><i>Information Personnelle</i></b></p> 
          <hr> 
          <div class="form-row">

              <div class="form-group col-md-6">
                  <label>Nom & Post-nom <span class="text-danger">*</span> </label>
                  <input type="text" class="form-control" autocomplete="off" required="required" autofocus name="name" placeholder="Entrez le nom et postnom">
              </div>
              <div class="form-group col-md-6">
                  <label>Prénom <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" autocomplete="off" required="required" name="prenom" placeholder="Entrez le prénom">
              </div>
         </div>

            <div class="form-group">
                  <label>Sexe <span class="text-danger">*</span></label>
                  <select name="sexe" class="form-control">
                      <option selected>Choisissez le sexe...</option>
                      <option value="M">Masculin</option>
                      <option value="F">Feminin</option>
                  </select>
            </div>


        <div class="form-row">
          
            <div class="form-group col-md-6">
                <label>Nationalité <span class="text-danger">*</span></label>
                <input type="text" class="form-control" autocomplete="off" required="required" name="nation" placeholder="Entrez la nationalite">
            </div>
            <div class="form-group col-md-6">
            <label>Adresse Physique <span class="text-danger">*</span></label>
            <input type="text" class="form-control" autocomplete="off" required="required" name="adresse" placeholder="Entrez l'adresse physique">

        </div>
        </div>

        

        <p><b><i>Information de l'Enseignant</i></b></p>
        <hr>
        <div class="form-row">
             <div class="form-group col-md-6">
               <label>Catégorie <span class="text-danger">*</span></label>
               <select name="categorie" class="form-control">
                   <option selected>Choisissez une catégorie...</option>
                   <option value="P.O">Prof Ordinaire</option>
                   <option value="Prof">Prof Associé</option>
                   <option value="C.T">Chef de Travaux</option>
                   <option value="Ass.">Assistant</option>
               </select>
             </div>
             <div class="form-group col-md-6">
               <label>Type <span class="text-danger">*</span></label>
               <select name="typEns" class="form-control">
                   <option selected>Choisissez un type...</option>
                   <option value="Visiteur">Visiteur</option>
                   <option value="LAU">No Visiteur</option>

               </select>
            </div>
        </div>
        <div class="form-group">
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
        <label>Description de l'Enseignant <span class="text-danger">*</span></label>
          <textarea name="desc" id="" cols="40" rows="3" placeholder="Entrez la description de l'Enseignant"></textarea>

        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger my-2 my-sm-0" data-dismiss="modal">Cancel</button>
          <button type="submit" name="ok"class="btn btn-outline-success my-2 my-sm-0">Create</button>
        </div>
    </form>
  </div>
</div>
