<?php

class Questionsdb
{
    private $_pdo;
        
        /**
         *This is a constructor that constructs a
         *PHP Database Object.
         */
        function __construct()
        {
            //Require configuration file
            require_once '/home/mbourque/blogsconfig.php';
            
            
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
}