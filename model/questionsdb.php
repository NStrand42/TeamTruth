<?php

class QuestionsDB
{
    private $_pdo;
        
        /**
         *This is a constructor that constructs a
         *PHP Database Object.
         */
        function __construct()
        {
            //Require configuration file
            require_once '/home/mbourque/truth_config.php';
            
            
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
        //createQuestion(Question, category,truth/dare, user)
        
        //createUser(userID, password)
        //-creates a user related to a password
        function createUser($username, $password) {

            $usernameExists = $this->usernameExists($username);

           
           if(!$usernameExists) {
                return $this->reallyAddUser($username, $password);
                exit();
            }
            
            return false;
        }
        
        function reallyAddUser($username, $password) {
            $hash = sha1($password);
            $insert = 'INSERT INTO user_table (username, password) VALUES (:username, :password)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':password', $hash, PDO::PARAM_STR);
            
            $statement->execute();
            
            return true;
        }
        
        function usernameExists($username) {
            $select = 'SELECT username FROM `user_table` WHERE username = :username';
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->execute();
           
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            
                if($row['username'] == $username){
                return true;
                exit();
                }
            }
            return false;
        }
        
        function checkPassword($user)
        {
            $select = 'SELECT password FROM `user_table` WHERE username = :user';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':user', $user, PDO::PARAM_INT);
            $statement->execute();
             
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                
                $creds = $row['password'];
            }
            
            return $creds;

        }
        
        function addQuestion($tOrD, $questionContent, $category, $user)
        {
            
            $set = 1;
            if($tOrD == "dareQuestion"){
                
                $insert = 'INSERT INTO questions (username, category, question, dare) VALUES (:user, :category, :question, :set)';
            } else {
               
               $insert = 'INSERT INTO questions (username, category, question, truth) VALUES (:user, :category, :question, :set)';
            }
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':user', $user, PDO::PARAM_STR);
            $statement->bindValue(':category', $category, PDO::PARAM_STR);
            $statement->bindValue(':question', $questionContent, PDO::PARAM_STR);
            $statement->bindValue(':set', $set, PDO::PARAM_INT);
            
            $statement->execute();
            
        }
                
        //userSubmissions(username)
        //-takes a username and returns an array of rows ‘question => “The question”’,
        //‘truth/dare’ => “”Truth” or “Dare””, ‘category’ => “Relationship etc”
        function userSubmissions($user, $torD){
            
            
            $select = 'SELECT category, question FROM `questions` WHERE username = :user AND ' . $torD . ' = 1';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':user', $user, PDO::PARAM_STR);
            $statement->execute();
            
            //echo $select;
            
          
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[] = $row;
            }
            return $results;
        }
        
        function randomQuestion($tOrD, $category)
        {
            $select = 'SELECT question FROM `questions` WHERE category = :category AND ' . $tOrD . ' = 1';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':category', $category, PDO::PARAM_STR);
            $statement->execute();
            
            //echo $select;
            $count = 0;
          
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$count] = $row;
             $count = $count + 1;
             
            }
            
            $arrayLength = count($results);
            
            $chosen = rand(0, $arrayLength-1);
            
            $result = $results[$chosen];
            
            $trueResult = $result['question'];
            
            
            
            
            return $trueResult;
        }
        
            
    function personalRandomQuestion($username, $tOrD)
    {
         $select = 'SELECT question FROM `questions` WHERE username = :username AND ' . $tOrD . ' = 1';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            
            //echo $select;
            $count = 0;
          
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$count] = $row;
             $count = $count + 1;
             
            }
            
            $arrayLength = count($results);
            
            $chosen = rand(0, $arrayLength-1);
            
            $result = $results[$chosen];
            
            $trueResult = $result['question'];
            
            return $trueResult;
    }
    
    function favoriteQuestions($tOrD)
    {
        $select = 'SELECT question FROM `questions` WHERE  ' . $tOrD . ' = 1 ORDER BY likes DESC';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':category', $category, PDO::PARAM_STR);
            $statement->execute();
            
            //echo $select;
            $count = 0;
          
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$count] = $row;
             $count = $count + 1;
             
            }
            
            $arrayLength = count($results);
        
            $chosen = rand(0, intval($arrayLength/10));
    
            $result = $results[$chosen];
            
            $trueResult = $result['question'];
            
            return $trueResult;
    }
    
    function likeOrDislike($question, $likeOrDislike)
    {
        
        if($likeOrDislike == "like"){
            $update = 'UPDATE `questions` SET likes = likes + 1 WHERE  question = :question';
        } else {
            $update = 'UPDATE `questions` SET likes = likes - 1 WHERE  question = :question';
        }
             
        $statement = $this->_pdo->prepare($update);
        $statement->bindValue(':question', $question, PDO::PARAM_STR);
        $statement->execute();
    }
    
    function updateScore($user = "unknown12345123123123", $chicken){
        if ($chicken == "quitter") {
            $update = 'UPDATE `user_table` SET score = score - 10 WHERE  username = :user';
        } else {
            $update = 'UPDATE `user_table` SET score = score + 10 WHERE  username = :user';
        }
             
        $statement = $this->_pdo->prepare($update);
        $statement->bindValue(':user', $user, PDO::PARAM_STR);
        $statement->execute();
    }
    
    function getScore($user = "unknown"){
            
        $select = 'SELECT score FROM `user_table` WHERE username = :user';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':user', $user, PDO::PARAM_STR);
            $statement->execute();
            
            //echo $select;
            $count = 0;
          
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$count] = $row;
             $count = $count + 1;
             
            }
            
            $score = $results[0];
            
            if($user == "" ){
                $score['score'] = 'NA';
            }
            
            return $score['score'];
    }
    
    function countSubmissions($user){
        
        $total = count($this->userSubmissions($user, "truth")) + count($this->userSubmissions($user, "dare"));
        
        return $total;
    }
    
    function viewUsers()
        {
            $select = 'SELECT username, score FROM `user_table` ORDER BY score DESC';
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->execute();
           
            //echo $select;
            $count = 0;
          
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$count] = $row;
             $count = $count + 1;
             
            }
            
            return $results;
        }
    
        
        
        //returnFavorites(truth/dare)
        //-takes truth or dare parameter and returns top “50” questions

        
        
        //allTruth() = all Random button
        //-returns rows of all truth
        
        //tRelationship(allTruth[])
        //-	goes through truth array and returns all truths with relationship category
        
        //tTeen(allTruth[])
        //-	goes through truth array and returns all truths with teen category
        
        //tKids(allTruth[])
        //-	goes through truth array and returns all truths with kids category
        
        //tMyPersonal(allTruth[])
        //-returns all questions array with username = SESSION[username]
        
        //allDare() = Random Dare
        
        //dTeen(dare[])
        //-	goes through dare array and returns all dares with teen category
        
        //dKids()
        //-	goes through dare array and returns all dares with kids category
        
        //dRelationship(dare[])
        //-	goes through dare array and returns all dares with relationship category
        
        //dMyPersonal()
        //-	returns all questions array with username = SESSION[username]

}