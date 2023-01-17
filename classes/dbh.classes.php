<?php

class Dbh{

    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=loginsystem', $username, $password);
            return $dbh;

        } catch (PDOException $e) {
            echo "Connection Error!: ". $e->getMessage(). "<br/>";
            die();
        }
    }
  
}