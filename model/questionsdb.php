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
        
        //returnFavorites(truth/dare)
        //-takes truth or dare parameter and returns top “50” questions
        
        //userSubmissions(username)
        //-takes a username and returns an array of rows ‘question => “The question”’,
        //‘truth/dare’ => “”Truth” or “Dare””, ‘category’ => “Relationship etc”
        
        
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