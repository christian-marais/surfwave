<?php
    // on génère une constante qui contiendra le chemin vers index.php
    define("ROOT",str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));//on définit une constante PHP pour le ROOT du dossier       
    require_once(ROOT.'src/app/Router.php');//on importe le routeur 
    Router::init();//on l'initialise par un appel statique à son "main" qui est un point d'entrée

?>
