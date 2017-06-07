<?php


    //Require the autoload file
    require_once('vendor/autoload.php');


    session_start();
    
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    $questionsdb = new QuestionsDB();
	
	$f3->set('DEBUG',3);
    

    
    //Define a default route
    $f3->route('GET|POST /',function($f3) {
        $controller = new Controller();
		$controller->renderHome($f3);  
    });
    
	//Define a default route
    $f3->route('GET|POST /logout',function($f3) {
        $controller = new Controller();
		session_unset();
		session_destroy();
		session_start();
		$controller->renderHome($f3);  
    });
	
    //route for the submissions page
    $f3->route('GET|POST /submissions', function($f3) {
		$captureTorD = $_POST;
        $controller = new Controller();
		$controller->renderSubmissions($f3, $captureTorD); 
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