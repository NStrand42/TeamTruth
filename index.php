<?php


    //Require the autoload file
    require_once('vendor/autoload.php');
    require_once('view/header.html');

    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    $questionsdb = new QuestionsDB();
	
	$f3->set('DEBUG',3);
    

    
    //Define a default route
    $f3->route('GET /',function($f3) {
        $controller = new Controller($f3);
		$controller->homepage();  
    });
          
        
    
        //Run fat free
    $f3->run();