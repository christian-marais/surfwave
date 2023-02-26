<section>
      <div class="container admin">
         <div class="bloc location">
            
            <h2>Gérer les catégories</h2>
            <table class="table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Libellé</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
               
                    <form method="post" id="form_produit">
                        <td><input name="categoProd" class="input2" type="text"/></td>
                        <td><input  name="libCatego" class="input2" type="text"/></td>
                        <td><button type="submit" name="create" value="" class="edit_produit"><a href=""><i class="uil uil-plus"></i></a></button>
                    <?php foreach($categories as $categorie){
                        echo'
                        <tr id="'.$categorie['categoProd'].'">
                            <td><input name="categoProd'.$categorie['categoProd'].'"class="input2" type="text" value="'.$categorie['categoProd'].'"/></td>
                            <td><input name="libCatego'.$categorie['categoProd'].'" class="input2" type="text" value="'.$categorie['libCatego'].'"/></td>
                            <td><button type="submit" name="validating_edit" value="'.$categorie['categoProd'].'"class="edit_produit"><i class="uil uil-pen"></i></button><button type="submit" name="delete" value="'.$categorie['categoProd'].'" class="delete_produit"><i class="uil uil-trash-alt"></i></button></td>
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