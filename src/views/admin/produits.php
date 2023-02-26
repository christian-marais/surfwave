<section>
      <div class="container admin">
         <div class="bloc location">
            
            <h2>
               Produits
            </h2>
            <p>
               <span class="message">
                  <?=(!empty($_POST['message']))?$_POST['message']:"";?>
               </span>
            </p>
            <form method="POST">
               <button class="btn btn-success" type="submit" name="create" href="'.HTTPS.'://<?=$_SERVER['HTTP_HOST']?>/admin/">
                  <i class="uil uil-plus"></i> Creer
               </button>
            </form>
  
            <table class="table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Image</th>
                     <th>Libellé</th>
                     <th class="textarea">Description</th>
                     <th>Catégorie</th>
                     <th>P.U.</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                    <form method="post" id="form_produit" readonly="readonly">
                    <?php foreach($articles as $article){
                        echo'
                        <tr id="'.$article['idProd'].'">
                            <td><input class="input" type="text" value="'.$article['idProd'].'" readonly="readonly"/></td>
                            <td><img src="'.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/images/produits/'.substr("000000",strlen($article['idProd'])).$article['idProd'].'.jpg" alt="'.$article['nomImage'].'" class="img-fluid image"></td>
                            <td><input class="input" type="text" value="'.$article['libProd'].'"/></td>
                            <td><textarea class="input" class="" readonly="readonly">'.$article['descProd'].'</textarea></td>
                            <td><input class="input" type="text" value="'.$article['catProd'].'"/></td>
                            <td><input class="input" type="text" value="'.$article['puProd'].'"/></td>
                            <td><button type="submit" name="edit" value="'.$article['idProd'].'"class="edit_produit"><i class="uil uil-pen"></i></button><button type="submit" name="delete" value="'.$article['idProd'].'" class="delete_produit"><i class="uil uil-trash-alt"></i></button></td>
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