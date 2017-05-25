<?php


    //Require the autoload file
    require_once('vendor/autoload.php');


    session_start();
    
    require_once('view/header.html');
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    $questionsdb = new QuestionsDB();
	
	$f3->set('DEBUG',3);
    

    
    //Define a default route
    $f3->route('GET /',function($f3) {
        $controller = new Controller();
		$controller->renderHome($f3);  
    });
    
    //route for the submissions page
    $f3->route('GET /submissions', function($f3) {
        $controller = new Controller();
		$controller->renderSubmissions($f3); 
    });
    
    //route for the how to page
    $f3->route('GET /howtopage', function($f3) {
        $controller = new Controller();
		$controller->renderHowToPage($f3); 
    });
    
    //route for the create user
    $f3->route('GET /createuser', function($f3) {
        $controller = new Controller();
		$controller->renderCreateUser($f3); 
    });
          
        
    
        //Run fat free
    $f3->run();