<?php

class Router{

    private $_ctrl;
    private $_view;
    private $https;

    public static function init(){

        Router::redirection();
    }
    
    private static function rootReq(){
        try{
            define("ROOT",str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
        
            spl_autoload_register(function ($class){//automatise les require à chaque appel de fonction
                require once ('models/'.$class.'.php');
            });
            
            $url='';

            if(isset($_GET['url'])){

                $url = explode('/', filter_var ($_GET['url'],FILTER_SANATIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = $controller;
                $controllerFile = ROOT.'src/controllers/'.$controllerClass.'.php';

                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
            else{
                throw new Exception('Page Introuvable');
                }
            }else{
                require_once(ROOT.'src/controllers/Pages.php');
                $this->_ctrl = new Pages;
                $this->_ctrl->erreur404($url);
            }

        }catch(Exception $e){
            $errorMsg=$e->getMessage();
            require_once('src/views/pages/404.php');
        }
    }


    private static function redirection(){//on met en place les redirections qui vont faire le require du controleur et l'appel à la méthode demandée
        session_start();//on initialise une seul fois la session en entrée
        (isset($_SERVER['HTTPS']))?define('HTTPS','https'):define('HTTPS','http');
        //on sépare les paramètres
        
        $params=explode('/',$_GET['p']);// on récupère l'url placé en get dans le paramètre p par le htaccess
        require_once(ROOT.'src/app/Model.php');//on importe les classes principales pour rendre leur méthode accessibles aux classes filles. 
        require_once(ROOT.'src/app/Controller.php');//il ne sera jamais fait appel directement à une de leur méthode en dehors d'une classe


        if($params[0]!=""){// on sépare les paramètre pour révéler un schéma d'url suivant: localhost/controleur/méthode ou action/params
            $controller = ucfirst($params[0]);
            $action= isset($params[1]) ? $params[1] : 'index';
            if(!file_exists(ROOT.'src/controllers/'.$controller.'.php')){//si la méthode n'est pas trouvé on redirige vers une page 404
                header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/pages/erreur404');  
            }
        }else{
            $controller="Pages";
            $action="index";
        }
        require_once(ROOT.'src/controllers/'.$controller.'.php');
        $controller = new $controller();

        if(method_exists($controller,$action)){
            unset ($params[0]);
            unset ($params[1]);
            call_user_func_array([$controller,$action],$params);//fonction qui fait appel à la méthode d'une classe en lui envoyant un paramètre
        }else{
            header('Location: '.HTTPS.'://'.$_SERVER['HTTP_HOST'].'/pages/erreur404');  
        }
    }   
}
?>