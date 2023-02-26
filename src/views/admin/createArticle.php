<section>
      <div class="container admin">
         <div class="row">

<form class="col-8 edit" method="POST" enctype="multipart/form-data">
  <h2>
    Ajouter un produit
  </h2>
  <p>
    <span class="message">
      <?=(!empty($_POST['message']))?$_POST['message']:"";?>
    </span>
  </p>

  <div class="mb-3">
    <label for="libéllé" class="form-label">
      <h3>
        Libéllé du produit
      </h3>
    </label>
    <textarea name="libProd" class="form-control" id="libéllé" placeholder="Description du produit" required></textarea>
  </div>
  <div class="col-md-3 mb-3">
    <label for="categorie">
      <h3>
        Catégorie
      </h3>
    </label>
    <select name="catProd" class="custom-select" id="categorie" required>
      <?php foreach($categories as $categorie){
        echo'
        <option'?>
        <?php echo'>'.$categorie['categoProd'].'</option>
        '; 
      }
      ?>
    </select>
  </div>
  <div class="col-md-4 mb-3">
    <label for="prix" class="form-label">
      <h3>
        Prix unitaire en €
      </h3>
    </label>
    <input name="puProd" class="form-control input" id="prix" value=""/>
  </div>
  <div class="mb-3">
    <label for="Description" class="form-label">
      <h3>
        Description du produit
      </h3>
    </label>
    <textarea name="descProd" class="form-control" id="Description" rows="10" placeholder="Description du produit" required></textarea>
  </div>

  <div class="form-check mb-3">
    <input  type="checkbox" id="defaultCheck2"/>
    <label class="form-chack-label" for="validationFormCheck1">En promotion</label>
    <div class="invalid-feedback">Example invalid feedback text</div>
  </div>

  <div class="mb-3">
    <h3>
      Importer l'image du produit (.jpg &lt;100ko)
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
    <a class="btn btn-success" type="button" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/produits">retour</a>
  </div>
</form>
</div>
</div>
</section