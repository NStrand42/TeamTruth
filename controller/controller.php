<?php

class Controller
{
    private $questionsdb;
    
    function __construct() {
       $this->questionsdb = new QuestionsDB();
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
     *This method logs the user out
     *
     *@param $f3 variables
     */
    function logout($f3) {
        session_unset();
         echo Template::instance()->render('view/homepage.html');  
    }
    
    /**
     *This method renders the home page
     *
     *@param $f3 variables
     */
    function renderHome($f3) {
        
        if(isset($_SESSION['turn']) == TRUE){
            if($_SESSION['turn'] == 1){
                $_SESSION['turn'] = 2;
            } else {
                $_SESSION['turn'] = 1;
            }
        } else {
            $_SESSION['turn'] = 1;
        }
        
        
        if (isset($_POST['like'])) {
            $this->questionsdb->likeOrDislike($_POST['like'], "like");
             $this->questionsdb->updateScore($_SESSION['username'], "That a champ");
        } elseif (isset($_POST['dislike'])) {
            $this->questionsdb->likeOrDislike($_POST['dislike'], "dislike");
             $this->questionsdb->updateScore($_SESSION['username'], "That a champ");
        } else {
             $this->questionsdb->updateScore($_SESSION['username'], "quitter");
        }
        
        if(isset($_POST['username'])){
              $username = $_POST['username'];
              $password = $_POST['password'];
              
              if($this->questionsdb->usernameExists($username)){
                
                if(sha1($password) == $this->questionsdb->checkPassword($username)){
                    $_SESSION['username'] = $username;
                } else {
                    $errors['passwordsDontMatch'] = "Your password didn't match please try again";

                    
                }
                
              }
        }

        
        if(isset($_POST['createUsername'])){
              $username = $_POST['createUsername'];
              $password = $_POST['createPassword'];
              $passwordVerify = $_POST['verifyPassword'];
              
              if($passwordVerify != $password){
                $f3->set('passwordsDontMatch', "Your passwords did not match please try again");
                $passwordMatch = FALSE;
              } else{
                $didTheyLogIn = $this->questionsdb->createUser($username, $password);
                $passwordMatch = TRUE;
              }
              
              if($didTheyLogIn){
                $_SESSION['username'] = $username;
              } else if($passwordMatch){
                $errors['usernameExists'] = "I'm sorry that username already exists. Try again";
              }
              
              if(isset($errors['usernameExists'])){
                 $f3->set('usernameError', $errors['usernameExists']);
              }
              
              
        }
        
        if (isset($errors['passwordsDontMatch'])){
             $f3->set('passwordError', $errors['passwordsDontMatch']);
        }
          
        $this->checkLoggedIn($f3);
        $f3->set('tRelationship', $this->questionsdb->randomQuestion("truth", "Relationships"));
        $f3->set('tFavorites', $this->questionsdb->favoriteQuestions("truth"));
        $f3->set('tTeens', $this->questionsdb->randomQuestion("truth", "Teen"));
        $f3->set('tKids', $this->questionsdb->randomQuestion("truth", "Kids"));
        $f3->set('tRandom', $this->questionsdb->randomQuestion("truth", "Miscellaneous"));
        $f3->set('tMyPersonal', $this->questionsdb->personalRandomQuestion($_SESSION['username'], "truth"));
        
        $f3->set('dRelationship', $this->questionsdb->randomQuestion("dare", "Relationships"));
        $f3->set('dFavorites', $this->questionsdb->favoriteQuestions("dare"));
        $f3->set('dTeens', $this->questionsdb->randomQuestion("dare", "Teen"));
        $f3->set('dKids', $this->questionsdb->randomQuestion("dare", "Kids"));
        $f3->set('dRandom', $this->questionsdb->randomQuestion("truth", "Miscellaneous"));
        $f3->set('dMyPersonal', $this->questionsdb->personalRandomQuestion($_SESSION['username'], "dare"));
      
        $f3->set('score', $this->questionsdb->getScore($_SESSION['username']));
        
        $f3->set('username', $_SESSION['username']);
        
        $f3->set('submissions', $this->questionsdb->countSubmissions($_SESSION['username']));
        
        if($_SESSION['turn'] == 2){
            $f3->set('turn', "Player 2's Turn!");
        } else {
            $f3->set('turn', "Player 1's Turn!");
        }
      
        echo Template::instance()->render('view/homepage.html');  
    }

    
    /**
     *This method renders the submissions page
     *
     *@param $f3 variables
     */
    function renderSubmissions($f3) {
        $tOrD = key($_POST);
        $question = $_POST[$tOrD];
        $category = $_POST['category'];
        
        if(isset($_POST['category'])){
            $this->questionsdb->addQuestion($tOrD, $question, $category, $_SESSION['username']);
        }
        
        $user = $_SESSION['username'];
        
        $realValuesT = $this->questionsdb->userSubmissions($user, "truth");
        $realValuesD = $this->questionsdb->userSubmissions($user, "dare");
        
        $categoryArray = array('Relationships', 'Teen', 'Kids', 'Miscellaneous');
        
        $truthArrayMaster = array($truthArray1, $truthArray2);
        $dareArrayMaster = array($dareArray1, $dareArray2);
        
        $f3->set('truthArray', $realValuesT);
        $f3->set('dareArray', $realValuesD);

        $f3->set('categoryArray', $categoryArray);
        
        if($user == "admin"){
            //$admin = new AdminDB();
            
            $f3->set('usertable', $this->questionsdb->viewUsers());
        }
        
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