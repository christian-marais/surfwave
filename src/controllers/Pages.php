<?php
class Pages extends Controller{
    public function index(){//méthode permettant d'afficher les pages complète ou statiques
        $this->theme="default";
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
     
        $this->render('index',compact('categories','articles','equipiers','produits','url_images'));
      
    }
    public function erreur404(){//fait les redirections 404
        $this->layout="blank";//on choisit le layout et les éléments html (heads...)
        $this->theme="default";
        $this->render('404');
    }
} 
?>  