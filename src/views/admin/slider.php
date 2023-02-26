<section>
  <div class="container admin">
    <div class="row">
      <form class="col-8 edit" method="POST" enctype="multipart/form-data">
        <h2>
          <?= strtoupper(substr($_SERVER['REQUEST_URI'],7)); ?>: Gestion des photos 
        </h2>
        <p>
          Choississez une photo puis cliquer sur éditer sur le slide correspondant pour selectionner la photo par rapport au slide.<br/>
          Vous pouvez également uploader une photo et cliquer sur le slide correspondant pour directement ajouter une photo à la galerie.
        </p>
        <p>
          <span class="message">
            <?=(!empty($_POST['message']))?$_POST['message']:"";?>
          </span>
        </p>

        <div class="mb-3">
          <div id="carouselExampleIndicators" class="carousel slide slide_slider" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              <?php 
                  $i=0;
                  foreach($url_images as $url){
                    echo'
                    <div class="carousel-item';?>
                      <?=($i==0)?'active':'';?>
                      <?php echo'">
                      <img class="d-block w-100" src="'.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/banque/'.$url.'" alt="'.$url.' slide">
                      <div class="edit_image">
                        <button type="submit" name="pick" value="'.$url.'" id="slider_button"><i class="uil uil-image-download"></i></button>
                      </div> 
                    </div>
                    ';
                    $i++;
                  }
              ?>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            
          </div>
          <h3>
              Uploader un Jpg <?=(substr($_SERVER['REQUEST_URI'],7)==="slider")?"(&lt;700ko)":"";?> en <?=substr($_SERVER['REQUEST_URI'],7)?>
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
          <div class="row"> 
            <?php 
              for($i=1; $i<9; $i++){
                echo'
                <div class="col-12 col-sm-5 col-md-4  text-center">
                  <h3> Slide n° '.$i.'</h3>
                  <img class="d-block w-100 text-center" src="'.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/slider/slider_'.$num_image[$i].'.jpg" alt="slider_'.$num_image[$i].'">
                    <div class="edit_image">
                      <button type="submit" name="edit" value="'.$i.'" id="edit_button"><i class="uil uil-pen"></i></button>
                      <button type="submit" name="delete" value="'.$i.'"  id="delete_button"><i class="uil uil-trash-alt"></i></button>
                    </div>    
                </div>';
              }
            ?>
          </div>

        <div class="mb-3">
          <a class="btn btn-success" type="button" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin">retour</a>
        </div>
      </form>
    </div>
  </div>
</section>