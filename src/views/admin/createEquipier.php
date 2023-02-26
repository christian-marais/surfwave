<section>
      <div class="container admin">
         <div class="row">

<form class="col-8 edit" method="POST" enctype="multipart/form-data">
  <h2>
    Ajouter un equipier
  </h2>
  <p>
    <span class="message">
      <?=(!empty($_POST['message']))?$_POST['message']:"";?>
    </span>
  </p>
  <div class="col-md-4 mb-3">
    <label for="id" class="form-label">
      <h3>
        Identifiant de l'équipier
      </h3>
    </label>
    <input name="codeEq" class="form-control input" id="id" value=""/>
  </div>
  <div class="col-md-4 mb-3">
    <label for="surnom" class="form-label">
      <h3>
        Surnom : 
      </h3>
    </label>
    <input name="surnomEq" class="form-control input" id="surnom" value=""/>
  </div>

  <div class="col-md-4 mb-3">
    <label for="nomEq" class="form-label">
      <h3>
        nom : 
      </h3>
    </label>
    <input name="nomEq" class="form-control input" id="nomEq" value=""/>
  </div>
  <div class="col-md-4 mb-3">
    <label for="fonctionEq" class="form-label">
      <h3>
        fonction : 
      </h3>
    </label>
    <input name="fonctionEq" class="form-control input" id="fonctionEq" value=""/>
  </div>



  <div class="mb-3">
    <h3>
      Importer la photo de l'équipier (.jpg &lt;500ko)
    </h3>
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
    <button class="btn btn-primary" name="validating_create" type="submit">Valider</button>
    <a class="btn btn-success" type="button" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/equipiers">retour</a>
  </div>
</form>
</div>
</div>
</section