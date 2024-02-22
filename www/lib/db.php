<?php
    /*
    * Goober MVC main file
    *
    * A kind of faux MVC as a demo site
    * this section handles url mappings and loads the correct modules
    *
    * author: Jim Barry
    * date: 2024-02-02
    */
    class db {
        //Properties

        //Methods
        function __construct() {
            $this->connect() ;
        }

        public function connect() {
            GLOBAL $DBHOST ;
            GLOBAL $DBNAME ;
            GLOBAL $DBUSER ;
            GLOBAL $DBPASS ;
            try {
                $dsn = "mysql:host=$DBHOST;dbname=$DBNAME" ;

                $pdo = new PDO($dsn, $DBUSER, $DBPASS);


            } catch(Exception $e) {
                echo $e->getMessage() . "\n" ;
                echo "<hr />" ;
            }            
        }
    }
  
/*
      ** Example PDO query
      */

      /*************************************************
      
        $servername = "db";
        $username = "jimbarry";
        $password = "password";
        $database = "jimbarry_db";

        try {
          $dsn = "mysql:host=$servername;dbname=$database" ;

          $pdo = new PDO($dsn, $username, $password);

          $stm = $pdo->query("select * from blog");

          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

          foreach($rows as $row) {
            echo '<h3>' . $row['title'].'</h3>';
            echo '<p>' . $row['content'].'</p>';
            echo 'Posted: ' . $row['date'];
            echo '<hr>';
          }
        } catch(Exception $e) {
          echo $e->getMessage() . "\n" ;
          echo "<hr />" ;
        }
      ***************************************************/ 
?>