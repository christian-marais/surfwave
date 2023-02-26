<section>
      <div class="container admin">
         <div class="bloc location">
            
            <h2>Gérer les prix des locations (prix en €)</h2>
            <table class="table text-center">
               <form method="post" id="form_produit">
                  <thead>
                     <tr>
                        <th>Tarifs location</th>
                        <?php 
                           foreach($categories as $categorie) { 
                              echo'<th>'.$categorie['libCatego'].'<div><button type="submit" name="deleteCatLocation" value="'.$categorie['codeCat'].'" class="delete_produit"><i class="uil uil-trash-alt"></i></button></div>          
                              </th>';
                           }
                        ?>
                        <th>
                           <div class="form-row align-items-center">
                              <div class="col-auto">
                                 <label class=" sr-only" for="inlineFormCustomSelect">Preference</label>
                                 <select name="catLocation"class="custom-select" id="inlineFormCustomSelect">
                                    <?php
                                    $i=0; 
                                       foreach($allCategories as $categorie) {
                                          if($i<1){
                                             echo'<option selected value="'.$categorie['categoProd'].'">'.$categorie['categoProd'].'</option>';
                                          }else{
                                             echo'<option value="'.$categorie['categoProd'].'">'.$categorie['categoProd'].'</option>'; 
                                          }
                                       }
                                    ?>
                                 </select>
                              </div>
                              <div>
                                 <button type="submit" name="addCatLocation" value="" class="edit_produit"><i class="uil uil-plus"></i></button>
                              </div>
                           </div>
                        </th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     <td>
                        <input type="text" class="input2" name="codeTemps" value=""/>
                     </td>'
                     <?php
                        foreach($categories as $categorie) { 
                           echo'
                              <td>
                                 <input class="input2" type="text" name="'.$categorie['codeCat'].'" />
                              </td>';
                        }
                     ?>
                     
                     <td><button type="submit" name="create_edit" value="" class="edit_produit"><i class="uil uil-plus"></i></button></td>
                     
                     <?php 
                        foreach($articles as $article){
                        echo '
                           <tr>
                              <td>
                                 <input type="text" class="input2" name="codeTemps'.str_replace(" ","_",$article['codeTemps']).'" value="'.$article['codeTemps'].'"/>
                              </td>'
                              ?>
                              <?php
                                 foreach($categories as $categorie) { 
                                    echo'
                                       <td>
                                          <input class="input2" type="text" name="'.str_replace(" ","_",$article['codeTemps']).$categorie['codeCat'].'" value="'.$article[$categorie['codeCat']].'" />
                                       </td>';
                                 }
                              ?>
                              <?php
                              echo'
                              <td><button type="submit" name="validating_edit" value="'.$article['codeTemps'].'"class="edit_produit"><i class="uil uil-pen"></i></button><button type="submit" name="delete" value="'.$article['codeTemps'].'" class="delete_produit"><i class="uil uil-trash-alt"></i></button></td>
                           </tr>';
                        }
                     ?>
                  </tbody>
               </form>
            </table>
         </div>
      </div>
   </section>