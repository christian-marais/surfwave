
   <section>
      <div class="container">
         <div class="bloc boutique" id="boutique">
            <h2>Surf Wave vous recommande</h2>
            <div class="row">
               <?php 
                  foreach($produits as $produit){
                     if($produit['alaune']==="1"){
                        echo'
                        <div class="produit col-lg-4 col-md-12">
                           <img src="'.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/produits/'.substr("000000",strlen($produit['idProd'])).$produit['idProd'].'.jpg" alt="'.$produit['nomImage'].'" class="img-fluid">
                           <div class="nom_produit">'.$produit['libProd'].'</div>
                           <div class="description_produit d-sm-block d-lg-none">'.$produit['descProd'].'</div>
                           <div class="prix">'.$produit['puProd'].' €</div>
                        </div>
                        ';
                     }
                  }
               ?>
              
            </div>

            <button type="button" class="btn btn-lg">Visiter notre boutique</button>

         </div>
      </div>
   </section>

   <!-- COURS DE SURF -->

   <section>
      <div class="container">
         <div class="bloc" id="coursdesurf">
            <h2>Cours de surf</h2>
            <div class="row">
               <div class="col-lg-6">
                  <img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/coursdesurf.jpg" alt="Cours de surf" class="img-fluid"></div>
               <div class="col-lg-6">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur optio perspiciatis, aperiam eligendi sapiente quo in neque magnam earum quaerat, dolorem aspernatur maiores iusto laboriosam blanditiis fugiat vero obcaecati ab eum! Voluptates optio consequuntur earum mollitia corrupti totam quibusdam quod laboriosam quo soluta dolorum inventore, quas tenetur, ad magnam dolore.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus reiciendis architecto quia, quis repellat vero labore natus doloremque neque consequuntur!</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, natus.</p>
               </div>
            </div>

            <h3>Découvrez nos différentes formules :</h3>

            <div class="row justify-content-md-center">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Enfants</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ipsa natus, fugit nulla illum iure?</p>
                              <p class="prix">à partir de 30 €</p>
                              <button type="button" class="btn btn-lg">Réserver</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Ados</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error officia perspiciatis voluptas porro in. Soluta.</p>
                              <p class="prix">à partir de 50 €</p>
                              <button type="button" class="btn btn-lg">Réserver</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Adultes</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus qui ea, neque quasi suscipit consectetur.</p>
                              <p class="prix">à partir de 90 €</p>
                              <button type="button" class="btn btn-lg">Réserver</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Familles</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eaque, consectetur alias libero laudantium illum.</p>
                              <p class="prix">à partir de 50 €</p>
                              <button class="btn btn-lg">Réserver</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Week-End</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis omnis placeat, quis consequuntur.</p>
                              <p class="prix">à partir de 50 €</p>
                              <button class="btn btn-lg">Réserver</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Vacances</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sint, architecto, numquam unde similique.</p>
                              <p class="prix">à partir de 50 €</p>
                              <button class="btn btn-lg">Réserver</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- LOCATION DE MATERIEL -->

   <section class="d-none d-md-none d-xl-block">
      <div class="container">
         <div class="bloc location" id="location_materiel">
            <h2>Location de materiel</h2>
            <div class="bloc-info row">
               <div class="col-lg-6">
                  <img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/planchesdesurf.jpg" alt="Planches de surf" class="img-fluid">
               </div>
               <div class="col-lg-6">
                  <p>Nous proposons du matériel de location de qualité, avec un grand choix de planches de surf et de bodyboard ainsi que des combinaisons.<br /><br /> Tarifs : à partir de 7 €</p>
               </div>
            </div>
            <h2>Tarifs</h2>
          
            <table class="table">
               <thead>
                  <tr>
                     <th>Tarifs location</th>
                     <?php 
                        foreach($categories as $categorie) { 
                           echo'<th>'.$categorie['libCatego'].'</th>';
                        }
                     ?>
                  </tr>
               </thead>
               <tbody>

                  <?php 
                     foreach($articles as $article){
                       echo '
                        <tr>
                           <td>'.$article['codeTemps'].'</td>'
                  ?><?php
                     foreach($categories as $categorie) { 
                        echo'
                           <td>'.$article[$categorie['codeCat']].' €</td>';
                        }
                  ?><?php
                     echo'
                       </tr>';
                  }
                  ?>
                  
               </tbody>
            </table>
         </div>
      </div>
   </section>

   <!-- NOS PARTENAIRES -->
   
   <section>
      <div class="container">
         <div class="bloc partenaires">

            <!-- SLIDERS -->

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
                        <img class="d-block w-100" src="'.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/slider/'.$url.'" alt="'.$url.' slide">
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

            <h2>Nos partenaires</h2>
            <div class="row bloc-partner">
               <div class="col-lg-6"><img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/hebergements.jpg" alt="Hébergements" class="img-fluid"></div>
               <div class="col-lg-6">
                  <h3>Hébergements</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos temporibus quis accusantium repellat similique id velit vero? Velit placeat aperiam saepe consequatur aliquam fugiat labore alias numquam neque veritatis fugit quas quisquam dolorem?</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde totam, adipisci repudiandae inventore numquam reprehenderit omnis explicabo eos in hic.</p>
                  <button type="button" class="btn btn-lg">En savoir plus</button>
               </div>
            </div>
            <div class="row bloc-partner">
               <div class="col-lg-6 d-block d-lg-none"><img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/restauration.jpg" alt="Restauration" class="img-fluid"></div>
               <div class="col-lg-6">
                  <h3>Restauration</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos temporibus quis accusantium repellat similique id velit vero? Velit placeat</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde totam, adipisci repudiandae inventore numquam reprehenderit omnis explicabo eos in hic.</p>
                  <button type="button" class="btn btn-lg">En savoir plus</button>
               </div>
               <div class="col-lg-6 d-none d-lg-block"><img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/restauration.jpg" alt="Restauration" class="img-fluid"></div>
            </div>
            <div class="row bloc-partner">
               <div class="col-lg-6"><img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/activites.jpg" alt="Activites" class="img-fluid"></div>
               <div class="col-lg-6">
                  <h3>Activités à proximité</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sed ea aspernatur, quos voluptas optio, inventore voluptatibus deleniti perspiciatis a, nam recusandae! Soluta, quod corporis fugit!</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, vitae. Esse vero nulla, earum dolorem voluptatibus incidunt distinctio animi, reiciendis?</p>
                  <button type="button" class="btn btn-lg ">En savoir plus</button>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- HISTOIRE / NOTRE EQUIPE -->

   <section>
      <div class="container">
         <div class="bloc" id="histoire">
            <div class="row">
               <div class="col-lg-4"><img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/logo.jpg" alt="Logo Surf Wave" class="img-fluid mx-auto d-block" width="300px"></div>
               <div class="bloc-info col-lg-8">
                  <h2>Histoire</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident eius quo, aut inventore quos ad a possimus corrupti aliquid soluta.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima numquam dolorum nesciunt, praesentium natus, suscipit minus totam, similique obcaecati debitis accusantium quo, animi unde! Ducimus placeat animi, adipisci assumenda! Possimus.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima numquam dolorum nesciunt, praesentium natus, suscipit minus totam, similique obcaecati debitis.</p>
               </div>
            </div>

            <div id="equipe">
               <h2>Notre équipe</h2>

               <div class="row">

                  <?php foreach($equipiers as $equipier){
                     echo'
                     <div class="col-lg-4 col-md-6 col-sm-6">
                        <img src="'.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/banque/'.strtolower($equipier['surnomEq']).'.jpg" alt="'.$equipier['surnomEq'].'" class="rounded-circle img-fluid"/>
                        <p class="nom">'.$equipier['surnomEq'].'</p>
                        <p class="role">'.$equipier['fonctionEq'].'</p>
                     </div>   
                     ';
                  }
                  ?>
               
               </div>
            </div>

            <div class="row">
               <div class="col-lg-7">
                  <img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/lagon.jpg" alt="Lagon" class="img-fluid">
               </div>
               <div class="col-lg-5">
                  <p>Notre équipe est particulièrement concernée par la prévention et la préservation du littoral de l’île de La Réunion. Nous vous invitons à vous renseigner sur la page suivante :<br /><br /> www.site-web.com
                  </p>
               </div>
            </div>

         </div>
      </div>
   </section>

   <!-- COORDONNEES -->

   <section>
      <div class="container">
         <div class="bloc" id="coordonnes">
            <h2>Coordonnées</h2>
            <div class="bloc-info row justify-content-md-center">
               <div class="col-lg-7">
                  <img src="<?= HTTPS.'://'.$_SERVER['HTTP_HOST']?>/images/banque/carte.jpg" alt="Carte" class="img-fluid"></div>
               <div class="col-lg-3">
                  <p>Adresse<br /><br /> Surf Wave<br /> 19A, lot des Charmilles<br /> 97434 Saint-Gilles-les-Bains<br /><br /> Fixe : 0262 54 58 59<br /> Mobile : 0693 54 78 59</p>
               </div>
            </div>

            <div class="row justify-content-md-center">
               <div class="col-lg-8">
                  <h2>Contact</h2>
                  <form>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <input type="text" class="form-control" id="inputName" placeholder="Votre nom">
                        </div>
                        <div class="form-group col-md-4">
                           <input type="email" class="form-control" id="inputEmail" placeholder="Votre email">
                        </div>
                        <div class="form-group col-md-4">
                           <input type="text" class="form-control" id="inputEmail" placeholder="Sujet">
                        </div>
                     </div>

                     <div class="form-group">
                        <textarea class="form-control" rows="10" id="formMessage"></textarea>
                     </div>

                     <button type="button" class="btn-lg float-right">Envoyer</button>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </section>