<?php
    class AdminDB extends QuestionsDB
    {
        
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
        
        
        
        
        
        
        
    }