<section>
  <div class="container admin">
    <div class="row">
      <form class="col-8 edit" method="POST" enctype="multipart/form-data">
      <h2>
        <?= strtoupper(substr($_SERVER['REQUEST_URI'],7)); ?>: Gestion des photos 
      </h2>
      <p>
        <span class="message">
          <?=(!empty($_POST['message']))?$_POST['message']:"";?>
        </span>
      </p>   
        <div class="mb-3">
          <h3>
            Uploader un Jpg <?=(substr($_SERVER['REQUEST_URI'],7)==="slider")?"(&lt;500ko)":"";?> en <?=substr($_SERVER['REQUEST_URI'],7)?>
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
          <a class="btn btn-success" type="button" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin">retour</a>
        </div>
      </form>
    </div>
  </div>
</section