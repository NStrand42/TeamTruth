<?php

class Controller
{
    private $sess;
    
    function __construct() {
       $this->sess = new Questionsdb;
    }
    
    /**
     *This method checks is the user is logged in
     *
     *@param $f3 variables
     */
    function checkLoggedIn($f3) {
        if(isset($_SESSION['username']))
           {
               $f3->set('usernameCheck', $_SESSION['username']);
           }
    }
    
    /**
     *This method renders the home page
     *
     *@param $f3 variables
     */
    function renderHome($f3) {
        echo Template::instance()->render('view/homepage.html');  
    }
    
    /**
     *This method renders the submissions page
     *
     *@param $f3 variables
     */
    function renderSubmissions($f3, $captureTorD) {
        //echo var_dump($captureTorD);
        $categoryArray = array('Relationships', 'Teen', 'Kids', 'Miscellaneous');
        
    
        
        $truthArray1 = array('question' => 'how old are you',
                            'category' => 'relationships');
        
        $truthArray2 = array('question' => 'how are you',
                            'category' => 'kids');
        
        $dareArray1 = array('question' => 'do a handstand',
                            'category' => 'relationships');
        
        $dareArray2 = array('question' => 'show me what you got',
                            'category' => 'kids');
        
        $truthArrayMaster = array($truthArray1, $truthArray2);
        $dareArrayMaster = array($dareArray1, $dareArray2);
        
        $f3->set('truthArray', $truthArrayMaster);
        $f3->set('dareArray', $dareArrayMaster);

        $f3->set('categoryArray', $categoryArray);
        echo Template::instance()->render('view/submissions.html');
    }
    
    /**
     *This method renders the how to page
     *
     *@param $f3 variables
     */    
    function renderHowToPage($f3) {
        echo Template::instance()->render('view/howtopage.html');
    }
    
    /**
     *This method renders the create user page
     *
     *@param $f3 variables
     */    
    function renderCreateUser($f3) {
        echo Template::instance()->render('view/createuser.html');
    }
    
}