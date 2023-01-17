<?php

class Signup extends Dbh{

    protected function setUser($userId, $password, $email){
        
        $stmt = $this->connect()->prepare('INSERT INTO users (user_id, user_pwd, user_email) values (?, ?, ?)');
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($userId,$hashedPwd, $email))){
            $stmt = null;
            header("location: ../index.php?error=sqlFailed");
            exit();
        }
    }
    
    protected function checkUser($userId, $email){

        $stmt = $this->connect()->prepare('SELECT user_id FROM users WHERE user_id =? OR user_email =?');

        if(!$stmt->execute(array($userId, $email))){
            $stmt = null;
            header("location: ../index.php?error=sqlFailed");
            exit();
        }

        if($stmt->rowCount()>0){
            $resultCheck = false;
        }
        else $resultCheck = true;

        return $resultCheck;
        
    }
}