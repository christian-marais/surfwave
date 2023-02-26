<?php
class Utilisateurs extends Controller{//classe utilisée pour la gestion du login et logout

    
    public function login(){
       
        $this->loadModel("Utilisateur");
        $this->loadModel("Article");
        $this->loadModel("Equipier");
        $this->loadModel('Categorie');
        $categories=$this->Categorie->getAllCategories();
        $categories=$this->Article->generateCatFromTarif($categories);
        $articles=$this->Article->generateTableau($categories);
        $produits=$this->Article->getAllArticles();
        $equipiers=$this->Equipier->getAllEquipiers();
        $url_images=scandir(ROOT.'/images/slider');
        $url_images=array_splice($url_images,3);

        $this->layout='login';//le layout login comprend l'element html, snippet du formulaire de connexion par sa constante LOGIN
        $this->theme='default';
        
        if(!empty($_SESSION['login'])){
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin');
        
        }else{      
            if (isset($_POST['validate'])){ 

                if(!empty($_POST['mail_user']) && !empty($_POST['password'])){
                    $password = htmlspecialchars($_POST['password']);
                    $mail=htmlspecialchars($_POST['mail_user']);
                    
                    $utilisateur=$this->Utilisateur->checkUser($mail,$password);
                    if(!empty($utilisateur)){
                        $_SESSION['login']="logged";
                        $_POST['message']='<p>Félicitations! Vous êtes connecté! </p>'; 
                        header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/admin');
                        
                    }else{
                        $_POST['message']='<p>Le login n\'est pas correcte</br> Essayez de vous reconnecter</p>';  
                    }
                }else{
                    $_POST['message']='<p>Tous les champs doivent être renseignés.</p>';
                    header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/utilisateurs/login');
                }
                
            }
        }
        $this->render('index',compact('categories','articles','equipiers','produits','url_images'),'pages');
    
    }
    
   

    public function logout(){//on détruit les variablse de session et met fin à la session active
        session_start();
        session_destroy();
        header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST']);

    }
} 

?>  