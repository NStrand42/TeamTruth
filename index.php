<?php


    //Require the autoload file
    require_once('vendor/autoload.php');
    require_once('view/header.html');

    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    

    
    //Define a default route
    $f3->route('GET /',
            function() {
        
            $view = new View;
            echo $view->render('pages/home.html');         
            });
    
        //Run fat free
    $f3->run();