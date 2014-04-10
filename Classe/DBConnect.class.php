<?php

class DbConnect {
    
    static function connect(){
      $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USERNAME,DB_PWD);
      return $db;
   }
    
    
}
?>
