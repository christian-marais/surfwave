<section>
      <div class="container admin">
         <div class="bloc location">
            
            <h2>Equipiers</h2>
            <p>
               <span class="message">
                  <?=(!empty($_POST['message']))?$_POST['message']:"";?>
               </span>
            </p>
            <form method="POST">
               <button class="btn btn-success" type="submit" name="create" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/">
                  <i class="uil uil-plus"></i> Creer
               </button>
            </form>
  
            <table class="table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th class='textarea'>Image</th>
                     <th>Surnom</th>
                     <th>Nom</th>
                     <th>Fonction</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                    <form method="post" id="form_produit" readonly="readonly">
                    <?php foreach($equipiers as $equipier){
                        echo'
                        <tr id="'.$equipier['codeEq'].'" class="text-center">
                            <td><input class="input" type="text" value="'.$equipier['codeEq'].'" readonly="readonly"/></td>
                            <td> <img src='.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/banque/'.strtolower($equipier['surnomEq']).'.jpg alt="'.$equipier['surnomEq'].'" class="img-fluid image"></td>
                            <td><input class="input" type="text" value="'.$equipier['surnomEq'].'"/></td>
                            <td><input class="input" type="text" value="'.$equipier['nomEq'].'"/></td>
                            <td><input class="input" type="text" value="'.$equipier['fonctionEq'].'"/></td>
                            <td><button type="submit" name="edit" value="'.$equipier['codeEq'].'"class="edit_produit"><i class="uil uil-pen"></i></button><button type="submit" name="delete" value="'.$equipier['codeEq'].'" class="delete_produit"><i class="uil uil-trash-alt"></i></button></td>
                        </tr>
                        ';
                    }
                    ?>
                    </form>
               </tbody>
            </table>
         </div>
      </div>
   </section>