<section>
  <div class="container admin">
    <div class="row">
      <form class="col-8 edit" method="POST" enctype="multipart/form-data">
        <h2>
          Mettre à jour l'équipier
        </h2>
        <p>
          <span class="message">
            <?=(!empty($_POST['message']))?$_POST['message']:"";?>
          </span>
        </p>
        <div class="mb-3">
          <label for="id" >
            <h3>
              Personnel id :
            </h3>
          </label>
          <input id="id" name="codeEq" class="edit_input" type="text" value="<?= (empty($equipier['codeEq']))? $equipier['codeEq'] ="":$equipier['codeEq']; ?>" readonly="readonly"/>
        </div>
        <div class="mb-3">
          <label for="libéllé" class="form-label">
            <h3>
              Surnom : 
            </h3>
          </label>
          <textarea name="surnomEq" class="form-control" id="libéllé" placeholder="Description du produit" required><?= (empty($equipier['surnomEq']))? $equipier['surnomEq'] ="":$equipier['surnomEq']; ?></textarea>
        </div>

        <div class="mb-3">
          <label for="Description" class="form-label">
            <h3>
              Nom : 
            </h3>
          </label>
          <textarea name="nomEq" class="form-control" id="Description" rows="10" placeholder="Nom de l'équipier" required><?= (empty($equipier['nomEq']))? $equipier['nomEq'] ="":$equipier['nomEq']; ?></textarea>
        </div>

        <div class="mb-3">
          <label for="FONCTION" class="form-label">
            <h3>
              fonction :  
            </h3>
          </label>
          <textarea name="fonctionEq" class="form-control" id="FONCTION" rows="10" placeholder="Nom de l'équipier" required><?= (empty($equipier['fonctionEq']))? $equipier['fonctionEq'] ="":$equipier['fonctionEq'] ; ?></textarea>
        </div>

        <div class="mb-3">
          <h3>
            Changer la photo de l'équipier (.jpg &lt;500ko)
          </h3>
          <img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/<?= strtolower($equipier['surnomEq'])?>.jpg" alt="<?= $equipier['surnomEq']?>" class="img-fluid image">
          <?php
            if(!empty($_FILES)){
              echo'<p>Nom de fichier: '.$_FILES['file']['name'].'</p>
                <p>Taille: '.substr($_FILES['file']['size'],0,-3).' ko</p>
                <p>Type de fichier : '.$_FILES['file']['type'].'</p>
              ';
            }
          ?>
          <input type="file" name="file" class="form-control" aria-label="file example">
        </div>

        <div class="mb-3">
          <button class="btn btn-primary" name="validating_edit" value="<?=$equipier['codeEq']?>"type="submit">Valider</button>
          <a class="btn btn-success" type="button" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/equipiers">retour</a>
        </div>
      </form>
    </div>
  </div>
</section