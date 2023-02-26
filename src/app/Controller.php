<?php

    abstract class Controller{
        protected $theme="default";
        protected $layout='default';
        protected $pathFileTemp=ROOT.'temp/temp.';
        protected $file=[];
        
        /**
         * M permet d'initialiser la classe modele choisie qui devra communiquer avec la bdd
         * O rien
         * I le nom du modèle ex: le model equipier; le nom de classe doit commencer par une majuscule pour respecter le nom de fichier
         */
        protected function loadModel(string $model){//créé une instance de model pour pouvoir faire appel à ses méthodes 
            //sert uniquement à récupérer de la donnée
            require_once(ROOT.'src/models/'.$model.'.php');
            $this->$model = new $model();
        
        }

        protected function render(string $fichier,array $data = [],$class=null){// sert uniquement à l'affichage en faisant les require des vues
            extract($data);//extrait les données d'un tableau associatif sous forme de variables. On accède ainsi aux données unitaires recues de la bdd 
            if(!empty($_SESSION['login'])){
                $this->theme='admin';
            }
            if($class==null){
                $class=get_class($this);
            }
            Controller::loadComponent();//charge les composants ou éléments html headers... dans des constantes pour pouvoir les placer de facon structurer dans des layouts
        
            ob_start();

            require_once(ROOT.'src/views/'.strtolower($class).'/'.$fichier.'.php');
            $content=ob_get_clean();//les echos et require de la vue ont été placé dans une variable qui est dans le layout
            require_once(ROOT.'src/views/layouts/'.$this->layout.'.php');//une fois la variable déclarée on importe le layout
        }

        /**
         * M méthode qui sert à charger les différents html qui correspondent à un set de vue
         * O RIEN
         * I RIEN
         */
        private function loadComponent(){// méthode qui sert à charger les différents html qui correspondent à un set de vue
            $components = str_replace('.php',"",scandir(ROOT.'src/assets/snippets/'.$this->theme));
            array_splice($components,0,2);
            
            $component="";
            $this->components=$components;
        
            foreach($components as $component){
                ob_start();
                require_once(ROOT.'src/assets/snippets/'.$this->theme.'/'.$component.'.php');
            $contenu=ob_get_clean();

            define(strtoupper($component),$contenu);
            }  
        }
        /**
         * M obtenir les infos de fichiers, gère la copie, le déplacement et l'import de fichier avec critères. Pour la fonction de selection le nom de fichier doit être envoyé dans la variable de $_session['pick']
         * O json avec les paramètres de fichier 
         * I un tableau associatif de parametres string concernant l'image
         */
        protected function gestionfichier($data){// Sert pour obtenir les informations de fichiers, à déplacer un fichier ou 
            
            $getType=['jpg' => 6,'jpeg'=> 6,'png' =>6];//on calcule le nombre à soustraire du string du nom de fichier pour obtenir le nom de l'extension

            $this->file['tmp']=$_FILES['file']['tmp_name'];// on définie différentes variables utilitaires
            $this->file['size']=substr($_FILES['file']['size'],0,-3);//on calcule la taille en ko
            $this->file['type']=substr($_FILES['file']['type'],$getType[$data['ext']]);//on calcule le type de fichier
            (empty($_SESSION['pick']))?$_SESSION['pick']=null:"";
            if(isset($_SESSION['pick'])){//si on a selectionné un fichier
                $this->file['type']=substr($_SESSION['pick'],strpos($_SESSION['pick'],'.')+1);//méthode temporaire, utiliser la premiere méthode pour éviter les erreurs du à un point dans le nom de fichier. on calcule le type de fichier 
                $this->pathFileTemp=$this->pathFileTemp.$this->file['type'];
            }else{
                $this->pathFileTemp=$this->pathFileTemp.$data['ext'];
            }
            ($this->file['type']==="jpeg")?$this->file['type']='jpg':"";
            
            if($data['name']===$_FILES['file']['name']){
                $this->file['name']= substr($_FILES['file']['name'],0,-strlen($this->file['type']));          
            }else{
                $this->file['name']=$data['name'].'.';   
            }
            
            (empty($data['old_path']))?$data['old_path']="_":"";
            (file_exists($data['old_path'].$_SESSION['pick']))?$moveFile=copy($data['old_path'].$_SESSION['pick'],$this->pathFileTemp):$moveFile=false;
            if(move_uploaded_file($this->file['tmp'],$this->pathFileTemp) || $moveFile) {//on déplace les fichiers importés ou de galerie dans le dossier temporaire temp
                $imageDimensions=getimagesize($this->pathFileTemp);
                $this->file['width']=$imageDimensions[0];   //on cherche à obtenir les informations de fichiers supplémentaires si l'import ou déplacement réussit
                $this->file['height']=$imageDimensions[1];// on définit notre variable utilitaire $file['height']
                $this->file['size']=substr(filesize($this->pathFileTemp),0,-3);
            }else{
                $this->file['size']="";
                $this->file['height']="";
                $this->file['width']="";
            }

            //on initialise les messages d'erreurs des fichiers
            $ifWgExt=($this->file['type']!=$data['ext'])?"L'extension doit être un jpg. ":""; 
            $ifWgSize=($this->file['size']>=$data['size'])?'Le fichier ne doit pas dépasser '.$data["size"].'ko. ':""; 
            if(!empty($data['check'])){
                $ifWgDim=($this->file['height']!=$data['height']&& $this->file['width'] != $data['width'])?'L\'image doit être égale aux width : "'.$data['width'].'px" et height :  "'.$data['height'].'px". ' :"";
            }else{
                $ifWgDim=($this->file['height']>=$data['height']&& $this->file['width'] >= $data['width'])?'L\'image doit être inférieur aux width : "'.$data['width'].'px" et height :  "'.$data['height'].'px". ' :"";
            }
            
            //si les conditions sont  remplies les fichiers sont déplacés dans le bon dossier 
            if(empty($ifWgExt)&&empty($ifWgDim)&&empty($ifWgSize)){//si message d'erreurs vide donc pas d'erreurs on met un message de succès dans un post 
                $_POST['message']="L'image a été uploadé avec succès! ";
                $this->file['new_path']=ROOT.$data['path'].strtolower($this->file['name']).$data['ext'];
                
                rename($this->pathFileTemp,$this->file['new_path']); //on deplace le fichier vers le nouveau dossier défini            
            }else{
                $_POST['message']=$ifWgExt.$ifWgSize.$ifWgDim;   
            }
           
        }  
    }
?>