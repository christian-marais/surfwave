<?php
class Admin extends Controller{

    public function index(){//pour aller au menu de back-end
        if($_SESSION['login']=='logged'){//si on est loggé on affiche le menu
            $this->layout="admin";
            $this->render('index',[],'admin');
        }else{//sinon réaffiche la page de login
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
    }

    public function produits(){

        if($_SESSION['login']=='logged'){//si on est loggé on peut accéder au backend du produit
              
            if(empty($_POST)){//si aucune opération n'a été faite on charge quand meme l'affichage 
                // on charge les données et définit le layout puis charge l'affichage
                $this->loadModel("Article");
                $articles=$this->Article->getAllArticles();
                $this->layout='admin';
                $this->render('produits',compact('articles'));// on envoie les variables obtenues dans la méthode


            }elseif(!empty($_POST['edit'])){//si on veut accéder à la page d'édition d'un produit
                $this->loadModel("Article");
                $this->loadModel("Categorie");
                $article=$this->Article->getOneArticle('idProd',htmlspecialchars($_POST['edit']));//les données recues sont systématiquement échappées
                $categories=$this->Categorie->getAllCategories();
                $this->layout='admin';
                $this->render('editArticle',compact('article','categories'));


            }elseif(isset($_POST['validating_edit'])){//quand on valide une edition
                
                $this->loadModel("Article");
                $this->loadModel("Categorie");
                $article=$this->Article->getOneArticle('idProd',htmlspecialchars($_POST['validating_edit']));
                
                if($this->Article->updateOneArticle('idProd',htmlspecialchars($_POST['validating_edit']))){
                    //json avec les données de l'image et ses contrainte; la méthode gestion de fichier s'occupe de la sélection et du déplacement de fichier
                    $data=[
                        'name'=> substr("000000",strlen($article['idProd'])).$article['idProd'],// on passe par le php pour donner un nom avec un id à 6 chiffres 
                        'ext'=> 'jpg',//on aurait pu le faire en sql mais on aurait du gérer à chaque fois un id à 6 chiffres
                        'height' => 1000,//on définit une hauteur maximale autorisée
                        'width'=> 1000,//etc
                        'size' => 100,//on définit une taille maximale autorisée
                        'path' => 'images/produits/'//on donne l'adress ou le fichier doit être copié à partir de la racine
                    ];
                 
                    $this->gestionfichier($data);// on utilise la méthode gestion de fichier
                    $_POST['message'].="L'article a été mis à jour";
                    
                }
                $article=$this->Article->getOneArticle('idProd',htmlspecialchars($_POST['validating_edit']));
                $categories=$this->Categorie->getAllCategories();
                $this->layout='admin';
                $this->render('editArticle',compact('article','categories')); 


            }elseif(!empty($_POST['delete'])){//si si on valide le delete
               $this->loadModel("Article");
                
                if($this->Article->deleteOneArticle('idProd',htmlspecialchars($_POST['delete']))){
                    $_POST['message']="L'article a bien été supprimé";
                    unlink(ROOT.'images/produits/'.substr("000000",strlen($_POST['delete'])).'.jpg');
                }
                $articles=$this->Article->getAllArticles();
                $this->layout='admin';
                $this->render('produits',compact('articles'));
               

            }elseif(isset($_POST['create'])){//si on veut aller sur la page de création de produit
                $this->loadModel("Categorie");
                $categories=$this->Categorie->getAllCategories();
                $this->layout='admin';
                $this->render('createArticle',compact('categories'));


            }elseif(isset($_POST['validating_create'])){//si on valide la création
                
                $this->loadModel("Article");//on charge les données nécessaires
                $this->loadModel("Categorie");
                $categories=$this->Categorie->getAllCategories();
                
                if($this->Article->insertOneArticle()){//on insert un article. on execute l'opération à réaliser dans un if pour avoir les succès et echecs

                    $article=$this->Article->getLastId();
                    $data=[
                        'name'=> substr("000000",strlen($article)).$article,
                        'ext'=> 'jpg',
                        'height' => 400,
                        'width'=> 400,
                        'size' => 100,
                        'path' => 'images/produits/'
                    ];
                    $this->gestionfichier($data);
                    $_POST['message'].="L'article a été créé.";
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/produits');  
                }
                $this->layout='admin';
                $this->render('createArticle',compact('categories'));   
            }
        }else{
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
    }
    //idem voir la méthode similaire produits
    public function equipiers(){//methode appellé pour la gestion des équipiers

        if($_SESSION['login']=='logged'){
            
            if(empty($_POST)){
                
                $this->loadModel("Equipier");
                $equipiers=$this->Equipier->getAllEquipiers();
                $this->layout='admin';
                $this->render('equipier',compact('equipiers'));
                
                
            }elseif(!empty($_POST['edit'])){//si on veut aller à la page d'édition
                $this->loadModel("Equipier");
                $equipier=$this->Equipier->getOneEquipier('codeEq',htmlspecialchars($_POST['edit']));
                $this->layout='admin';
                $this->render('editEquipier',compact('equipier'));


            }elseif(isset($_POST['validating_edit'])){//si l'édition a réussie
                $this->loadModel("Equipier");
                $equipier=$this->Equipier->getOneEquipier('codeEq',htmlspecialchars($_POST['validating_edit']));
               
                if($this->Equipier->updateOneEquipier('codeEq',htmlspecialchars($_POST['validating_edit']))){
                   
                    $data=[
                        'name'=> $equipier['surnomEq'],
                        'ext'=> 'jpg',
                        'height' => 2000,
                        'width'=> 2000,
                        'size' => 500,
                        'path' => 'images/banque/'
                    ];
                    $this->gestionfichier($data);
                    $_POST['message'].="L'équipier a été mis à jour. ";
                }
                
                $this->layout='admin';
                $this->render('editEquipier',compact('equipier')); 


            }elseif(!empty($_POST['delete'])){//si le delete a réussi
                $this->loadModel("Equipier");
                if($this->Equipier->deleteOneEquipier('codeEq',htmlspecialchars($_POST['delete']))){
                    $_POST['message']="L'equipier a bien été supprimé";
                    unlink(ROOT.'images/banque/'.$_POST['surnomEq'].'.jpg');
                }
                $equipiers=$this->Equipier->getAllEquipiers();
                $this->layout='admin';
                $this->render('equipier',compact('equipiers'));
            

            }elseif(isset($_POST['create'])){//si on veut aller à la page de création
                $this->layout='admin';
                $this->render('createEquipier');


            }elseif(isset($_POST['validating_create'])){//si l'équipier a bien été créé
                
                $this->loadModel("Equipier");
                $this->layout='admin';
               
                if($this->Equipier->insertOneEquipier()){//en cas d'insert réussi
                    $data=[
                        'name'=> $_POST['surnomEq'],
                        'ext'=> 'jpg',
                        'height' => 1000,
                        'width'=> 1000,
                        'size' => 500,
                        'path' => 'images/banque/'
                    ];
                    $this->gestionfichier($data);
                    $_POST['message'].="L'équipier a été créé.";
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/equipiers'); //si on reussit l'insert on est redirigé        
                }
                $_POST['message'].="L'équipier n'a pas été créé.";//message en cas d'érreur
                $this->render('createEquipier');//si l'insert n'est pas réussie on affiche la page pour le résultat
            }   
        }else{
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
         
    }
    //idem voir méthode produits
    public function galerie(){//methode qui gère la galerie
        if($_SESSION['login']=='logged'){
            
           if(isset($_POST['validating_create'])){
            
                $data=[
                    'name'=> $_FILES['file']['name'],//nom de fichier de l'upload
                    'ext'=> 'jpg',//extension désirée
                    'height' => 2000,//taille désirée
                    'width'=> 2000,
                    'size' => 500,//poids désirée
                    'path' => 'images/banque/'//chemin à partir de la racine pour le déplacement
                ];
                $this->gestionfichier($data); 
            }
            $this->layout='admin';
            $this->render('galerie');
        }else{
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
         
    }
    public function slider(){//méthode qui gère la sélection et l'upload des photo du slider
        
        if($_SESSION['login']=='logged'){//si on est logué ou on est redirigé
            
            for($i=1; $i<9; $i++){
                $filename= ROOT.'images/slider/slider_'.$i.'.jpg';
                if(file_exists($filename)){
                    $num_image[$i]=$i;
                }else{
                    $num_image[$i]=0;
                } 
            }
            $url_images=scandir(ROOT.'/images/banque');// on liste les fichiers dans banque pour l'affichage dans le slider
            $url_images=array_splice($url_images,2);
            if(isset($_POST['pick'])){// quand on sélectionne un fichier son nom est mis en $_post avec un $_post[edit]
                $_SESSION['pick']=$_POST['pick'];
            }
            if(isset($_POST['edit'])){
                (isset($_SESSION['pick']))?$path=ROOT.'images/banque/':$path='';
                $data=[
                    'name'=> 'slider_'.$_POST['edit'],
                    'ext'=> 'jpg',
                    'height' => 700,
                    'width'=> 1200,
                    'size' => 500,
                    'path' => 'images/slider/',
                    'old_path'=> $path,
                    //'check'=>'='
                ];
                $this->gestionfichier($data);
                header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/slider');
                 
            }elseif(!empty($_POST['delete'])){
                unlink(ROOT.'images/slider/slider_'.$_POST['delete'].'.jpg');
                header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/slider');
            }
            
            $this->layout='admin';
            $this->render('slider',compact('num_image','url_images'));
            
        }else{
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
    }

    public function categories(){//méthode qui gère les catégories

        if($_SESSION['login']=='logged'){
            $this->layout='admin';
            $this->loadModel("Categorie");
            $categories=$this->Categorie->getAllCategories();
            
            if(!empty($_POST['delete'])){//si on valide le delete
                
                if($this->Categorie->deleteOneCategorie('categoProd',htmlspecialchars($_POST['delete']))){
                    $_POST['message']="La categorie a bien été supprimé";
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/categories');
                }    
            }elseif(isset($_POST['create'])&&!empty(($_POST['categoProd']))&& !empty(($_POST['libCatego']))){//si on valide la création d'une catégorie non vide
                if($this->Categorie->insertOneCategorie()){
                    $_POST['message']="La catégorie a été créée";
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/categories');
                }
                
            }elseif(!empty($_POST['validating_edit'])){//si on valide l'édition
                $this->loadModel("Categorie");
                $categories=$this->Categorie->getAllCategories();
                $data=[
                    'categoProd' => htmlspecialchars($_POST['categoProd'.$_POST['validating_edit']]),
                    'libCatego' => htmlspecialchars($_POST['libCatego'.$_POST['validating_edit']])    
                ];
                if($this->Categorie->updateOneCategorie('categoProd',htmlspecialchars($_POST['validating_edit']),$data)){
                    $_POST['message']="La Categorie a été mise à jour";
                    
                }
                $this->loadModel("Categorie");
                $categories=$this->Categorie->getAllCategories();
            }   
        }else{//si on n'est pas loggé
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
        $this->layout='admin';
        $this->render('categories',compact('categories'));    
    }
    public function locations(){//méthode qui gère les catégories

        if($_SESSION['login']=='logged'){
            $this->loadModel("Article");
            $this->loadModel('Categorie');
            $categories=$this->Categorie->getAllCategories();
            $allCategories=$categories;
            $categories=$this->Article->generateCatFromTarif($categories);
            $articles=$this->Article->generateTableau($categories);
            $produits=$this->Article->getAllArticles();
            $ifAllfieldIsFilled=true;
           
            if(!empty($_POST['create_edit'])){
                foreach($categories as $categorie) {
                   
                    if(empty($_POST['prix_'.$article['codeTemps'].$categorie['codeCat']])){
                        $ifAllfieldIsFilled=false;
                    }
                 }
            }
   
            if(!empty($_POST['delete'])){//si on valide le delete
                
                if($this->Article->deleteOneLocation('codeTemps',htmlspecialchars($_POST['delete']))){
                    $_POST['message']="La location a bien été supprimée";
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/locations');
                }    
            }elseif(isset($_POST['create_edit'])&& $ifAllfieldIsFilled==true){//si on valide la création d'une catégorie non vide
                if($this->Article->insertOneLocation($categories)){
                $_POST['message']="La location a été créée";
                   header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/locations');
                }
                
            }elseif(!empty($_POST['validating_edit']) && $ifAllfieldIsFilled==true){//si on valide l'édition
              
                if($this->Article->updateOneLocation('codeTemps',htmlspecialchars($_POST['validating_edit']),$categories)){
                    $_POST['message']="La Location a été mise à jour";
                    
                }
               header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/locations');
               
            }elseif(isset($_POST['addCatLocation'])){//si on valide la création d'une catégorie non vide
                if($this->Article->insertCatLocation($articles)){
                $_POST['message']="La catégorie a été ajoutée aux locations";
                   header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/locations');
                }
                
            }elseif(!empty($_POST['deleteCatLocation'])){//si on valide le delete
                
                if($this->Article->deleteCatLocation('codeCat',htmlspecialchars($_POST['deleteCatLocation']))){
                    $_POST['message']="La catégorie a bien été supprimée des locations";
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin/locations');
                }
            } 
        }else{//si on n'est pas loggé
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
        }
        $this->layout='admin';
        $this->render('locations',compact('categories','articles','allCategories'));
      
    }
    public function getThis(){
        return $this->this;
    }
}

?>